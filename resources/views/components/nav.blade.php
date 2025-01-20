<nav class="mt-6">
    <ul>
        <li class="mb-2">
            <a href="{{ route('dashboard') }}"
               class="flex items-center px-6 py-3 text-gray-600 hover:bg-gray-200 rounded-lg">
                <span class="material-icons-outlined mr-3">dashboard</span>
                Dashboard
            </a>
        </li>
        <li>
            <a href="{{ route('suppliers.index') }}"
               class="flex items-center px-6 py-3 text-gray-600 hover:bg-gray-200 rounded-lg">
                <span class="material-icons-outlined mr-3">library_books</span>
                Suppliers
            </a>
        </li>
        <li>
            <a href="{{ route('vehicle-types.index') }}"
               class="flex items-center px-6 py-3 text-gray-600 hover:bg-gray-200 rounded-lg">
                <span class="material-icons-outlined mr-3">library_books</span>
                Vehicle Types
            </a>
        </li>
        <li>
            <a href="{{ route('records.index') }}"
               class="flex items-center px-6 py-3 text-gray-600 hover:bg-gray-200 rounded-lg">
                <span class="material-icons-outlined mr-3">library_books</span>
                Records
            </a>
        </li>
    </ul>
</nav>

