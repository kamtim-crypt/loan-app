<div class="h-full flex flex-col justify-between">
    <div class="px-4 py-6">
        <ul class="mt-6">
            @if(Auth::user()->role === 'admin')
                <li>
                    <a href="{{ route('admin.dashboard') }}" class="block py-2 px-4 text-sm text-gray-700 rounded hover:bg-gray-200">Admin Dashboard</a>
                </li>
                <li>
                    <a href="{{ route('admin.loans.index') }}" class="block py-2 px-4 text-sm text-gray-700 rounded hover:bg-gray-200">Manage Loans</a>
                </li>
            @else
                <li>
                    <a href="{{ route('dashboard') }}" class="block py-2 px-4 text-sm text-gray-700 rounded hover:bg-gray-200">Dashboard</a>
                </li>
                <li>
                    <a href="{{ route('loans.index') }}" class="block py-2 px-4 text-sm text-gray-700 rounded hover:bg-gray-200">My Loans</a>
                </li>
                <li>
                    <a href="{{ route('loans.create') }}" class="block py-2 px-4 text-sm text-gray-700 rounded hover:bg-gray-200">Apply for Loan</a>
                </li>
            @endif
        </ul>
    </div>
</div>
