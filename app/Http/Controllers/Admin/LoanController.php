<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Loan;
use Illuminate\Http\Request;

class LoanController extends Controller
{
    public function index()
    {
        $loans = Loan::with('user')->latest()->get();
        return view('admin.loans.index', ['loans' => $loans]);
    }

    public function update(Request $request, Loan $loan)
    {
        $validated = $request->validate([
            'status' => 'required|in:approved,rejected',
        ]);

        $loan->status = $validated['status'];
        $loan->save();

        return redirect()->route('admin.loans.index')->with('status', 'Loan status updated successfully!');
    }
}
