<x-layout>
    <div class="d-flex justify-content-center align-items-center" style="height: 100vh; background-color: #f8f9fa;">
        <div class="text-center">
            <h1 class="display-1 text-danger">403</h1>
            <h2 class="text-dark">Unauthorized Access</h2>
            <p class="text-muted">
                Sorry, you do not have the required permissions to access this page.
            </p>
            <div class="mt-4">
                <a href="{{ url('/dashboard') }}" class="btn btn-primary btn-lg">Go to Homepage</a>
                @if (auth()->check())
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                @else
                    <a href="{{ route('login') }}" class="btn btn-outline-secondary btn-lg">Log In</a>
                @endif
            </div>
        </div>
    </div>
</x-layout>
