@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-gray-900 via-gray-800 to-gray-900 py-16">
    <div class="container mx-auto px-4">
        <!-- Page Title -->
        <div class="mb-8 text-center">
            <h1 class="text-4xl font-bold text-white">My Tickets</h1>
            <p class="text-gray-300">View and manage your tickets</p>
        </div>

        <!-- Search and Filters -->
        <div class="mb-8 flex justify-between items-center">
            <!-- Search Bar -->
            <div class="relative w-full max-w-md">
                <input type="text" placeholder="Search tickets..." class="w-full bg-gray-800 text-gray-300 border border-gray-700 rounded-lg py-2 px-4 pl-10 focus:outline-none focus:border-gray-600">
                <i class="fas fa-search absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-500"></i>
            </div>

            <!-- Filters -->
            <div class="flex space-x-4">
                <select class="bg-gray-800 text-gray-300 border border-gray-700 rounded-lg py-2 px-4 focus:outline-none focus:border-gray-600">
                    <option value="">Priority</option>
                    <option value="high">High</option>
                    <option value="medium">Medium</option>
                    <option value="low">Low</option>
                </select>
                <select class="bg-gray-800 text-gray-300 border border-gray-700 rounded-lg py-2 px-4 focus:outline-none focus:border-gray-600">
                    <option value="">Software</option>
                    <!-- Populate with software options -->
                </select>
                <select class="bg-gray-800 text-gray-300 border border-gray-700 rounded-lg py-2 px-4 focus:outline-none focus:border-gray-600">
                    <option value="">Status</option>
                    <option value="open">Open</option>
                    <option value="in_progress">In Progress</option>
                    <option value="resolved">Resolved</option>
                    <option value="closed">Closed</option>
                </select>
            </div>
        </div>

        <!-- Tickets List -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($tickets as $ticket)
            <div class="bg-gray-800/50 backdrop-blur-sm rounded-xl border border-gray-700/50 p-6">
                <div class="flex justify-between items-center mb-4">
                    <h3 class="text-xl font-semibold text-white">{{ $ticket->title }}</h3>
                    <span class="text-sm @if($ticket->priority === 'high') text-red-400 @elseif($ticket->priority === 'medium') text-yellow-400 @else text-green-400 @endif">{{ ucfirst($ticket->priority) }}</span>
                </div>
                <p class="text-gray-400 mb-4">{{ Str::limit($ticket->description, 100) }}</p>
                <div class="flex justify-between items-center text-sm text-gray-400">
                    <span>{{ $ticket->created_at->format('Y-m-d') }}</span>
                    <span class="px-3 py-1 rounded-full @if($ticket->status === 'en cours') bg-blue-400/10 text-blue-400 @elseif($ticket->status === 'Résolu') bg-yellow-400/10 text-yellow-400 @else bg-green-400/10 text-green-400 @endif">{{ ucfirst($ticket->status) }}</span>
                </div>
            </div>
            @endforeach
        </div>

        <!-- Pagination -->
        <div class="mt-8">
            {{ $tickets->links() }}
        </div>
    </div>
</div>
@endsection