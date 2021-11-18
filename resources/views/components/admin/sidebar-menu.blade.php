<nav class="flex-1 px-2 py-4 space-y-1">
    <a href="{{ route('admin.home') }}"
        class=" group flex items-center px-2 py-2 text-sm font-medium rounded-md {{ Request::routeIs('admin.home') ? 'bg-white text-gray-600' : 'text-white' }}">

        <svg class=" mr-3 flex-shrink-0 h-6 w-6"
            xmlns="http://www.w3.org/2000/svg"
            fill="none"
            viewBox="0 0 24 24"
            stroke="currentColor"
            aria-hidden="true">
            <path stroke-linecap="round"
                stroke-linejoin="round"
                stroke-width="2"
                d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
        </svg>
        Home
    </a>


    <a href="{{ route('admin.leave-application') }}"
        class=" group flex items-center px-2 py-2 text-sm font-medium rounded-md {{ Request::routeIs('admin.leave-application') ? 'bg-white text-gray-600' : 'text-white' }}">
        <svg xmlns="http://www.w3.org/2000/svg"
            class=" mr-3 flex-shrink-0 h-6 w-6"
            fill="none"
            viewBox="0 0 24 24"
            stroke="currentColor">
            <path stroke-linecap="round"
                stroke-linejoin="round"
                stroke-width="2"
                d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.414-6.586a4 4 0 00-5.656-5.656l-6.415 6.585a6 6 0 108.486 8.486L20.5 13" />
        </svg>
        Leave Application
    </a>
    <a href="{{ route('admin.leave-type') }}"
        class=" group flex items-center px-2 py-2 text-sm font-medium rounded-md {{ Request::routeIs('admin.leave-type') ? 'bg-white text-gray-600' : 'text-white' }}">

        <svg xmlns="http://www.w3.org/2000/svg"
            class=" mr-3 flex-shrink-0 h-6 w-6"
            fill="none"
            viewBox="0 0 24 24"
            stroke="currentColor">
            <path stroke-linecap="round"
                stroke-linejoin="round"
                stroke-width="2"
                d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4" />
        </svg>
        Leave Type
    </a>

    <a href="{{ route('admin.users') }}"
        class="  group flex items-center px-2 py-2 text-sm font-medium rounded-md {{ Request::routeIs('admin.users') ? 'bg-white text-gray-600' : 'text-white' }}">
        <!-- Heroicon name: outline/users -->
        <svg class=" mr-3 flex-shrink-0 h-6 w-6"
            xmlns="http://www.w3.org/2000/svg"
            fill="none"
            viewBox="0 0 24 24"
            stroke="currentColor"
            aria-hidden="true">
            <path stroke-linecap="round"
                stroke-linejoin="round"
                stroke-width="2"
                d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
        </svg>
        Users
    </a>

    <a href="{{ route('admin.employees') }}"
        class=" group flex items-center px-2 py-2 text-sm font-medium rounded-md {{ Request::routeIs('admin.employees') ? 'bg-white text-gray-600' : 'text-white' }}">
        <svg xmlns="http://www.w3.org/2000/svg"
            class=" mr-3 flex-shrink-0 h-6 w-6"
            fill="none"
            viewBox="0 0 24 24"
            stroke="currentColor">
            <path stroke-linecap="round"
                stroke-linejoin="round"
                stroke-width="2"
                d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
        </svg>
        Employees
    </a>

    <a href="{{ route('admin.departments') }}"
        class=" group flex items-center px-2 py-2 text-sm font-medium rounded-md {{ Request::routeIs('admin.departments') ? 'bg-white text-gray-600' : 'text-white' }}">
        <svg xmlns="http://www.w3.org/2000/svg"
            class=" mr-3 flex-shrink-0 h-6 w-6"
            fill="none"
            viewBox="0 0 24 24"
            stroke="currentColor">
            <path stroke-linecap="round"
                stroke-linejoin="round"
                stroke-width="2"
                d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
        </svg>
        Departments
    </a>

    <a href="{{ route('admin.positions') }}"
        class=" group flex items-center px-2 py-2 text-sm font-medium rounded-md {{ Request::routeIs('admin.positions') ? 'bg-white text-gray-600' : 'text-white' }}">
        <svg xmlns="http://www.w3.org/2000/svg"
            class=" mr-3 flex-shrink-0 h-6 w-6"
            fill="none"
            viewBox="0 0 24 24"
            stroke="currentColor">
            <path stroke-linecap="round"
                stroke-linejoin="round"
                stroke-width="2"
                d="M16 4v12l-4-2-4 2V4M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
        </svg>
        Positions
    </a>
</nav>
