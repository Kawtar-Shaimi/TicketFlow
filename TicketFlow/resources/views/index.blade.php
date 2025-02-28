@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-gray-900 via-gray-800 to-gray-900">
    <!-- Hero Section -->
    <div class="container mx-auto px-4 py-16 text-center">
        <h1 class="text-5xl font-bold text-white mb-4">Welcome to TicketFlow</h1>
        <p class="text-gray-300 text-xl mb-8">Efficiently manage and track your software issues and requests.</p>
        <a href="" 
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

    <!-- Testimonials Section -->
    <div class="container mx-auto px-4 py-12 text-center">
        <h2 class="text-3xl font-bold text-white mb-6">What Our Users Say</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <!-- Testimonial 1 -->
            <div class="bg-gray-800/50 backdrop-blur-sm rounded-xl border border-gray-700/50 p-6">
                <p class="text-gray-400 mb-4">"TicketFlow has revolutionized the way we handle support requests. It's intuitive and efficient!"</p>
                <div class="flex items-center justify-center space-x-3">
                    <img src="https://ui-avatars.com/api/?name=John+Doe&background=6B7280&color=fff" 
                         alt="John Doe" class="w-10 h-10 rounded-full">
                    <div>
                        <h4 class="text-gray-200 font-medium">John Doe</h4>
                        <p class="text-gray-400 text-sm">Software Engineer</p>
                    </div>
                </div>
            </div>

            <!-- Testimonial 2 -->
            <div class="bg-gray-800/50 backdrop-blur-sm rounded-xl border border-gray-700/50 p-6">
                <p class="text-gray-400 mb-4">"As an admin, I love the ability to assign tickets and track their progress in real-time."</p>
                <div class="flex items-center justify-center space-x-3">
                    <img src="https://ui-avatars.com/api/?name=Jane+Smith&background=6B7280&color=fff" 
                         alt="Jane Smith" class="w-10 h-10 rounded-full">
                    <div>
                        <h4 class="text-gray-200 font-medium">Jane Smith</h4>
                        <p class="text-gray-400 text-sm">Project Manager</p>
                    </div>
                </div>
            </div>

            <!-- Testimonial 3 -->
            <div class="bg-gray-800/50 backdrop-blur-sm rounded-xl border border-gray-700/50 p-6">
                <p class="text-gray-400 mb-4">"The detailed statistics help us identify bottlenecks and improve our response time."</p>
                <div class="flex items-center justify-center space-x-3">
                    <img src="https://ui-avatars.com/api/?name=Michael+Johnson&background=6B7280&color=fff" 
                         alt="Michael Johnson" class="w-10 h-10 rounded-full">
                    <div>
                        <h4 class="text-gray-200 font-medium">Michael Johnson</h4>
                        <p class="text-gray-400 text-sm">Team Lead</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Call to Action Section -->
    <div class="container mx-auto px-4 py-12 text-center">
        <h2 class="text-3xl font-bold text-white mb-6">Ready to Get Started?</h2>
        <p class="text-gray-400 text-xl mb-8">Sign up now and streamline your ticket management process with TicketFlow.</p>
        <a href="{{ route('registerView') }}" 
           class="bg-purple-500 text-white px-6 py-3 rounded-lg shadow-lg hover:bg-purple-600 transition-colors">
            Get Started
        </a>
    </div>
</div>
@endsection