@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-gray-900 via-gray-800 to-gray-900 py-16">
    <!-- Hero Section -->
    <div class="container mx-auto px-4 py-16 text-center">
        <h1 class="text-5xl font-bold text-white mb-4">Welcome to TicketFlow</h1>
        <p class="text-gray-300 text-xl mb-8">Efficiently manage and track your software issues and requests.</p>
        <a  
           class="bg-purple-500 text-white px-6 py-3 rounded-lg shadow-lg hover:bg-purple-600 transition-colors">
            Create a Ticket
        </a>
    </div>

    <!-- Features Section -->
    <div class="container mx-auto px-4 py-12">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <!-- Feature 1 -->
            <div class="bg-gray-800/50 backdrop-blur-sm rounded-xl border border-gray-700/50 p-6 text-center">
                <div class="text-purple-400 text-4xl mb-4">
                    <i class="fas fa-ticket-alt"></i>
                </div>
                <h3 class="text-xl font-semibold text-white mb-2">Create & Manage Tickets</h3>
                <p class="text-gray-400">Easily create tickets to report issues or request assistance. Manage tickets by priority, software, and status.</p>
            </div>

            <!-- Feature 2 -->
            <div class="bg-gray-800/50 backdrop-blur-sm rounded-xl border border-gray-700/50 p-6 text-center">
                <div class="text-purple-400 text-4xl mb-4">
                    <i class="fas fa-users-cog"></i>
                </div>
                <h3 class="text-xl font-semibold text-white mb-2">Assign & Track Progress</h3>
                <p class="text-gray-400">Administrators can assign tickets to developers. Track the progress of each ticket in real-time.</p>
            </div>

            <!-- Feature 3 -->
            <div class="bg-gray-800/50 backdrop-blur-sm rounded-xl border border-gray-700/50 p-6 text-center">
                <div class="text-purple-400 text-4xl mb-4">
                    <i class="fas fa-chart-line"></i>
                </div>
                <h3 class="text-xl font-semibold text-white mb-2">Statistics & Analysis</h3>
                <p class="text-gray-400">View detailed statistics on tickets created, assigned, and resolved. Identify top-performing developers and software with the most issues.</p>
            </div>
        </div>
    </div>

    <!-- My Tickets Section -->
    <div class="container mx-auto px-4 py-12">
        <h2 class="text-3xl font-bold text-white mb-6 text-center">My Tickets</h2>

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
                    <span class="px-3 py-1 rounded-full @if($ticket->status === 'open') bg-blue-400/10 text-blue-400 @elseif($ticket->status === 'in_progress') bg-yellow-400/10 text-yellow-400 @elseif($ticket->status === 'resolved') bg-green-400/10 text-green-400 @elseif($ticket->status === 'closed') bg-red-400/10 text-red-400 @endif">{{ ucfirst($ticket->status) }}</span>
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