@extends('layouts.app')

@section('content')
<div class="bg-gray-900 min-h-screen p-8">
    <h2 class="text-3xl font-bold text-white mb-6">Ticket Statistics</h2>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <!-- Total Tickets Created -->
        <div class="bg-gray-800 p-6 rounded-lg shadow-md">
            <h3 class="text-lg font-semibold text-white">Total Tickets Created</h3>
            <p class="text-blue-400 text-3xl font-bold mt-2">{{ $createdTicketsCount }}</p>
        </div>

        <!-- Assigned Tickets -->
        <div class="bg-gray-800 p-6 rounded-lg shadow-md">
            <h3 class="text-lg font-semibold text-white">Assigned Tickets</h3>
            <p class="text-yellow-400 text-3xl font-bold mt-2">{{ $assignedTicketsCount }}</p>
        </div>

        <!-- Finished Tickets -->
        <div class="bg-gray-800 p-6 rounded-lg shadow-md">
            <h3 class="text-lg font-semibold text-white">Resolved Tickets</h3>
            <p class="text-green-400 text-3xl font-bold mt-2">{{ $finishedTicketsCount }}</p>
        </div>
    </div>

    <!-- Tickets by Software -->
    <div class="mt-8">
        <h3 class="text-xl font-semibold text-white mb-4">Tickets by Software</h3>
        <div class="bg-gray-800 p-6 rounded-lg shadow-md">
            <table class="w-full">
                <thead>
                    <tr>
                        <th class="text-left text-gray-300 py-5">Software</th>
                        <th class="text-center text-gray-300 py-5">Total</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($ticketsBySoftwareCount as $ticket)
                        <tr class="border-t border-gray-700">
                            <td class="text-gray-300 py-5">{{ $ticket->software }}</td>
                            <td class="text-center py-5 text-blue-400 font-bold">{{ $ticket->total }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Developers with Most Resolved Tickets -->
    <div class="mt-8">
        <h3 class="text-xl font-semibold text-white mb-4">Developers by Finished Tickets</h3>
        <div class="bg-gray-800 p-6 rounded-lg shadow-md">
            <table class="w-full">
                <thead>
                    <tr>
                        <th class="text-left text-gray-300 py-5">Developer</th>
                        <th class="text-center text-gray-300 py-5">Total</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($developersByFinishedTicketsCount as $developer)
                        <tr class="border-t border-gray-700">
                            <td class="text-gray-300 py-5">{{ $developer->name }}</td>
                            <td class="text-center py-5 text-green-400 font-bold">{{ $developer->total }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
