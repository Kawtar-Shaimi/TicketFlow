<header class="bg-gray-900 text-gray-200 shadow-lg">
    <div class="container mx-auto px-4 py-4 flex justify-between items-center">
        <!-- Logo -->
        <a href="{{ route('home') }}" class="text-2xl font-bold text-purple-400">TicketFlow</a>

        <!-- Navigation -->
        <nav class="hidden md:flex space-x-4">
            @if (Auth::user()->role === 'admin')
                <a href="{{ route('admins.index') }}" class="hover:text-white transition-colors">Home</a>
                <a href="{{ route('admins.statistics') }}" class="hover:text-white transition-colors">Statistics</a>
            @elseif (Auth::user()->role === 'developer')
                <a href="{{ route('developers.index') }}" class="hover:text-white transition-colors">Home</a>
            @else
                <a href="{{ route('clients.index') }}" class="hover:text-white transition-colors">Home</a>
                <a href="{{ route('tickets.create') }}" class="hover:text-white transition-colors">Create Ticket</a>
            @endif
        </nav>

        <!-- User Menu -->
        <div class="flex items-center space-x-4">
            <span class="hidden md:block">{{ Auth::user()->name }}</span>
            <button class="flex items-center space-x-2">
                <img src="https://ui-avatars.com/api/?name={{ Auth::user()->name }}&background=6B7280&color=fff" alt="{{ Auth::user()->name }}" class="w-8 h-8 rounded-full">
            </button>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="block w-full text-left px-4 py-2 hover:bg-gray-700">Logout</button>
            </form>
        </div>

        <!-- Mobile Menu Button -->
        <button class="md:hidden text-gray-200" @click="mobileMenu = !mobileMenu">
            <i class="fas fa-bars"></i>
        </button>
    </div>

    <!-- Mobile Navigation -->
    <nav x-show="mobileMenu" class="md:hidden bg-gray-800">
        @if (Auth::user()->role === 'admin')
            <a href="{{ route('admins.index') }}" class="block py-2 px-4 hover:bg-gray-700 transition-colors">Home</a>
            <a href="{{ route('admins.statistics') }}" class="block py-2 px-4 hover:bg-gray-700 transition-colors">Statistics</a>
        @elseif (Auth::user()->role === 'developer')
            <a href="{{ route('developers.index') }}" class="block py-2 px-4 hover:bg-gray-700 transition-colors">Home</a>
        @else
            <a href="{{ route('clients.index') }}" class="block py-2 px-4 hover:bg-gray-700 transition-colors">Home</a>
            <a href="{{ route('tickets.create') }}" class="block py-2 px-4 hover:bg-gray-700 transition-colors">Create Ticket</a>
        @endif
    </nav>
</header>
<script>
    document.addEventListener('alpine:init', () => {
        Alpine.data('header', () => ({
            mobileMenu: false,
        }))
    })
</script>
