<?php

namespace App\Http\Controllers;

use App\Models\Loan;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class LoanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        // Get loans for the currently authenticated user
        $loans = Auth::user()->loans()->latest()->get();

        return view('loans.index', ['loans' => $loans]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('loans.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        /** @var \App\Models\User $user */
        $user = auth()->user();

        // --- Eligibility Checks based on Zambian regulations ---

        // 1. Minimum Age Check (21 years)
        if ($user->date_of_birth?->age < 21) {
            return back()->withErrors(['date_of_birth' => 'You must be at least 21 years old to apply for a loan.'])->withInput();
        }

        // 2. Employment Check for Personal Loans
        if ($request->input('loan_type') === 'personal' && $user->employment_status !== 'employed') {
            return back()->withErrors(['employment_status' => 'You must be permanently employed to apply for a personal loan.'])->withInput();
        }

        $validated = $request->validate([
            'loan_type' => 'required|in:personal,business',
            // Consider making the amount more flexible to allow for cents.
            // e.g., 'amount' => 'required|numeric|min:1|max:1000000.00',
            // You would adjust the max based on your business requirements.
            'amount' => 'required|numeric|min:1',
            // Personal Loan Tenure: 12 to 72 months
            'term' => 'required|integer|between:12,72',
            'purpose' => 'required|string|min:10',
        ]);

        // Create a new loan associated with the current user
        $loan = new Loan($validated);
        // Interest is typically calculated on the daily outstanding balance.
        $loan->interest_rate = 10.00; // Example fixed interest rate
        $loan->status = 'pending';

        Auth::user()->loans()->save($loan);

        return redirect()->route('loans.index')->with('status', 'Loan application submitted successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Loan $loan): View
    {
        // Ensure the user can only see their own loans
        if ($loan->user_id !== Auth::id()) {
            abort(403);
        }

        return view('loans.show', ['loan' => $loan]);
    }
}