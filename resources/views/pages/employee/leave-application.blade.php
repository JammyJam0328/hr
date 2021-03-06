@extends('layouts.employee')

@section('content')
    <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
        <div class="px-4 py-6 sm:px-0">
            @livewire('employee.leave-application')
        </div>
    </div>
@endsection
