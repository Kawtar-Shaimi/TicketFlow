@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-gray-900 via-gray-800 to-gray-900 py-16">
    <!-- Hero Section -->
    <div class="container mx-auto px-4 py-16 text-center">
        <h1 class="text-5xl font-bold text-white mb-4">Welcome to TicketFlow</h1>
        <p class="text-gray-300 text-xl mb-8">Efficiently manage and track your software issues and requests.</p>
    </div>

    @if (session()->has('success'))
        <x-alert type="success" :message="session('success')" />
    @elseif (session()->has('error'))
        <x-alert type="error" :message="session('error')" />
    @endif

    <!-- My Tickets Section -->
    <div class="container mx-auto px-4 py-12">
        <h2 class="text-3xl font-bold text-white mb-6 text-center">My Assignements</h2>

        <form action="{{ route('developers.filter') }}" method="post">
            @csrf
            <!-- Search and Filters -->
            <div class="mb-8 flex justify-between items-center">
                <!-- Search Bar -->
                <div class="relative w-full max-w-md">
                    <input name="search" type="text" placeholder="Search tickets..." class="w-full bg-gray-800 text-gray-300 border border-gray-700 rounded-lg py-2 px-4 pl-10 focus:outline-none focus:border-gray-600">
                    <i class="fas fa-search absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-500"></i>
                </div>

                <!-- Filters -->
                <div class="flex space-x-4">
                    <select name="priority" class="bg-gray-800 text-gray-300 border border-gray-700 rounded-lg py-2 px-4 focus:outline-none focus:border-gray-600">
                        <option value="">Priority</option>
                        <option value="high">High</option>
                        <option value="medium">Medium</option>
                        <option value="low">Low</option>
                    </select>
                    <select name="status" class="bg-gray-800 text-gray-300 border border-gray-700 rounded-lg py-2 px-4 focus:outline-none focus:border-gray-600">
                        <option value="">Status</option>
                        <option value="en cours">En Cours</option>
                        <option value="résolu">Résolu</option>
                        <option value="fermé">Fermé</option>
                    </select>
                </div>

                <button class="bg-gray-800 text-gray-300 border border-gray-700 rounded-lg py-2 px-4 focus:outline-none focus:border-gray-600" type="submit">Search</button>
            </div>
        </form>

        <!-- Tickets List -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @if ($tickets->count())
                @foreach ($tickets as $ticket)
                    <div class="bg-gray-800 rounded-lg shadow-xl p-6 transition duration-300 hover:shadow-2xl hover:bg-gray-700">
                        <h3 class="text-2xl font-semibold text-white mb-2">{{ $ticket->title }}</h3>
                        <p class="text-gray-300 text-sm leading-relaxed">{{ $ticket->description }}</p>
                        <div class="flex gap-3 flex-wrap mt-4 text-gray-400 text-sm">
                            <span class="bg-gray-700 px-3 py-1 rounded-md">{{ $ticket->software }}</span>
                            <span class="bg-gray-700 px-3 py-1 rounded-md">{{ $ticket->os }}</span>
                            <span class="bg-gray-700 px-3 py-1 rounded-md font-medium text-{{ $ticket->priority === 'high' ? 'red-400' : ($ticket->priority === 'medium' ? 'yellow-400' : 'green-400') }}">
                                {{ ucfirst($ticket->priority) }}
                            </span>
                            <span class="bg-gray-700 px-3 py-1 rounded-md">{{ ucfirst($ticket->status) }}</span>
                        </div>

                        <div class="flex flex-wrap justify-between items-center mt-4 text-gray-400 text-sm">
                            <span class="italic">{{ $ticket->created_at->diffForHumans() }}</span>
                            <a href="{{ route('tickets.changeStatusView', $ticket) }}"
                            class="bg-blue-600 hover:bg-blue-700 transition duration-300 text-white px-4 py-2 rounded-md text-sm font-medium">
                                Change Status
                            </a>
                        </div>
                    </div>
                @endforeach
            @else
                <div class="col-span-1 md:col-span-2 lg:col-span-3 p-6 flex justify-center items-center">
                    <h3 class="text-3xl my-10 font-extrabold text-red-500">No Tickets Found</h3>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
