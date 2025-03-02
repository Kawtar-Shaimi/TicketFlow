@extends('layouts.app')

@section('content')
<div class="w-full flex justify-center items-center min-h-screen bg-gradient-to-br from-gray-900 via-gray-800 to-gray-900 py-16 overflow-hidden">
    <form class="w-1/3 my-10 bg-gray-800 rounded-lg p-6 border border-gray-700 hover:border-gray-600 transition-colors duration-200" method="POST" action="{{ route('asignements.store', $ticket) }}">
        @csrf
        <h2 class="text-3xl font-extrabold text-white text-center">Create Assignement</h2>

        <div class="my-5">
            <label for="ticket" class="block text-sm font-semibold text-white">Ticket</label>
            <input type="text" id="ticket" name="ticket" placeholder="Enter your ticket ticket" value="{{ $ticket->id ." - ". $ticket->title }}"
                    class="w-full mt-2 text-white p-4 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500 focus:outline-none transition-all duration-300" readonly>
        </div>

        <div class="my-5">
            <label for="developer_id" class="block text-sm font-semibold text-white">Developer</label>
            <select id="developer_id" name="developer_id" class="w-full mt-2 text-white p-4 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500 focus:outline-none transition-all duration-300">
                <option class="text-black" value="">Select Developer</option>
                @foreach ($developers as $developer)
                    <option class="text-black" value="{{ $developer->id }}">{{ $developer->id }} - {{ $developer->name }}</option>
                @endforeach
            </select>
        </div>

        @error('developer_id')
            <p class="mt-2 text-sm text-red-400">{{ $message }}</p>
        @enderror

        <button type="submit" class="w-full my-5 bg-blue-500 text-white font-semibold py-4 rounded-lg shadow-lg ">
            Submit Assignement
        </button>
    </form>
</div>
@endsection
