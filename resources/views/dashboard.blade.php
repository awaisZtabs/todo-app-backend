@extends('layouts.app_with_sidebar')
@section('content')
    <div class="p-6">
        <div class="mb-6">
            <h1 class="text-2xl font-bold text-gray-800">Welcome to the Dashboard</h1>
            <p class="text-gray-600 mt-2">
                Manage your records and other functionalities here.
            </p>
        </div>
        <div class="bg-white p-6 rounded-lg shadow">
            <h3 class="text-lg font-semibold text-gray-800">Overview</h3>
            <div class="mt-4 grid grid-cols-1 md:grid-cols-3 gap-6">
                <!-- Card 1 -->
                <div class="bg-blue-500 text-white rounded-lg p-4 shadow-md">
                    <h4 class="text-lg font-medium">Users</h4>
                    <p class="mt-2 text-xl font-bold">120</p>
                </div>
                <!-- Card 2 -->
                <div class="bg-green-500 text-white rounded-lg p-4 shadow-md">
                    <h4 class="text-lg font-medium">Sales</h4>
                    <p class="mt-2 text-xl font-bold">$24,500</p>
                </div>
                <!-- Card 3 -->
                <div class="bg-red-500 text-white rounded-lg p-4 shadow-md">
                    <h4 class="text-lg font-medium">Tasks</h4>
                    <p class="mt-2 text-xl font-bold">15 Pending</p>
                </div>
            </div>
        </div>
    </div>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet">

@endsection
