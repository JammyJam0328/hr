<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport"
        content="width=device-width, initial-scale=1">
    <meta name="csrf-token"
        content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Styles -->
    <link rel="stylesheet"
        href="{{ mix('css/app.css') }}">

    @livewireStyles

    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}"
        defer></script>
</head>

<body x-data="alerts"
    class="font-sans antialiased">
    <div class="min-h-full">
        <nav class="bg-gray-800">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex items-center justify-between h-16">
                    <div class="flex items-center">

                        <div class="hidden md:block">
                            <div class="flex items-baseline space-x-4">

                                <a href="{{ route('employee.home') }}"
                                    class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Home</a>

                                @if (auth()->user()->employee->designation)
                                    @if (auth()->user()->employee->designation->position->name == 'Head')
                                        <a href="{{ route('employee.leave-application') }}"
                                            class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Leave
                                            Applications</a>
                                    @endif
                                @endif

                                @if (auth()->user()->is_hr)
                                    <a href="{{ route('employee.to-approve') }}"
                                        class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">To
                                        Approve</a>
                                @endif

                            </div>
                        </div>
                    </div>
                    <div class="hidden md:block">
                        <div class="ml-4 flex items-center md:ml-6">
                            <x-admin.profile-dropdown />
                        </div>
                    </div>
                </div>
            </div>
        </nav>
        <main>
            @yield('content')
        </main>
    </div>

    <x-shared.alerts />
    <x-shared.confirm />
    @livewireScripts


</body>

</html>
