@extends('layouts.app')

@section('content')
<div class="w-full flex justify-center items-center min-h-screen bg-gradient-to-br from-gray-900 via-gray-800 to-gray-900 py-16 overflow-hidden">
    <form class="w-1/3 my-10 bg-gray-800 rounded-lg p-6 border border-gray-700 hover:border-gray-600 transition-colors duration-200" method="POST" action="{{ route('tickets.store') }}">
        @csrf
        <h2 class="text-3xl font-extrabold text-white text-center">Create Ticket</h2>

        <div class="my-5">
            <label for="title" class="block text-sm font-semibold text-white">Title</label>
            <input type="text" id="title" name="title" placeholder="Enter your ticket title" value="{{ old('title') }}"
                    class="w-full mt-2 text-white p-4 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500 focus:outline-none transition-all duration-300">
        </div>

        @error('title')
            <p class="mt-2 text-sm text-red-400">{{ $message }}</p>
        @enderror

        <div class="my-5">
            <label for="description" class="block text-sm font-semibold text-white">Description</label>
            <textarea id="description" name="description" rows="4" placeholder="Enter your ticket description"
                    class="w-full mt-2 text-white p-4 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500 focus:outline-none resize-none transition-all duration-300">{{ old('description') }}</textarea>
        </div>

        @error('description')
            <p class="mt-2 text-sm text-red-400">{{ $message }}</p>
        @enderror

        <div class="my-5">
            <label for="software" class="block text-sm font-semibold text-white">Software</label>
            <input type="text" id="software" name="software" placeholder="Enter your ticket software" value="{{ old('software') }}"
                    class="w-full mt-2 text-white p-4 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500 focus:outline-none transition-all duration-300">
        </div>

        @error('software')
            <p class="mt-2 text-sm text-red-400">{{ $message }}</p>
        @enderror

        <div class="my-5">
            <label for="os" class="block text-sm font-semibold text-white">OS</label>
            <input type="text" id="os" name="os" placeholder="Enter your ticket os" value="{{ old('os') }}"
                    class="w-full mt-2 text-white p-4 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500 focus:outline-none transition-all duration-300">
        </div>

        @error('os')
            <p class="mt-2 text-sm text-red-400">{{ $message }}</p>
        @enderror

        <div class="my-5">
            <label for="priority" class="block text-sm font-semibold text-white">Priority</label>
            <select id="priority" name="priority" class="w-full mt-2 text-white p-4 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500 focus:outline-none transition-all duration-300">
                <option class="text-black" value="">Select Priority</option>
                <option class="text-black" value="high">High</option>
                <option class="text-black" value="medium">Medium</option>
                <option class="text-black" value="low">Low</option>
            </select>
        </div>

        @error('priority')
            <p class="mt-2 text-sm text-red-400">{{ $message }}</p>
        @enderror

        <button type="submit" class="w-full my-5 bg-blue-500 text-white font-semibold py-4 rounded-lg shadow-lg ">
            Submit Ticket
        </button>
    </form>
</div>
@endsection
