<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Apply for a Loan') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    <!-- Validation Errors -->
                    @if ($errors->any())
                        <div class="mb-4">
                            <div class="font-medium text-red-600">
                                {{ __('Whoops! Something went wrong.') }}
                            </div>

                            <ul class="mt-3 list-disc list-inside text-sm text-red-600">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form method="POST" action="{{ route('loans.store') }}">
                        @csrf

                        <!-- Loan Type -->
                        <div class="mt-4">
                            <label for="loan_type" class="block font-medium text-sm text-gray-700">{{ __('Loan Type') }}</label>
                            <select id="loan_type" name="loan_type" class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                <option value="personal" {{ old('loan_type') == 'personal' ? 'selected' : '' }}>Personal Loan</option>
                                <option value="business" {{ old('loan_type') == 'business' ? 'selected' : '' }}>Business Loan</option>
                            </select>
                        </div>

                        <!-- Amount -->
                        <div class="mt-4">
                            <label for="amount" class="block font-medium text-sm text-gray-700">{{ __('Amount (K)') }}</label>
                            <input id="amount" class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" type="number" name="amount" value="{{ old('amount') }}" required autofocus />
                        </div>

                        <!-- Term -->
                        <div class="mt-4">
                            <label for="term" class="block font-medium text-sm text-gray-700">{{ __('Term (in months)') }}</label>
                            <input id="term" class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" type="number" name="term" value="{{ old('term') }}" required />
                            <p class="text-sm text-gray-500 mt-1">Personal loans: 12 to 72 months.</p>
                        </div>

                        <!-- Purpose -->
                        <div class="mt-4">
                            <label for="purpose" class="block font-medium text-sm text-gray-700">{{ __('Purpose of Loan') }}</label>
                            <textarea id="purpose" name="purpose" class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" rows="4" required>{{ old('purpose') }}</textarea>
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <button type="submit" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150">
                                {{ __('Submit Application') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>