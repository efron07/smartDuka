<x-layout>
    <div class="row">
        <div class="col">
            <div class="card radius-10 mb-0">
                <div class="card-body">
                    <!-- Success Alert -->
                    @if (session('success'))
                        <div id="success-alert" class="alert alert-success alert-dismissible fade show position-absolute top-0 end-0 m-3" role="alert" style="z-index: 1050; background-color: #28a745; color: white;">
                            <strong>Success!</strong> {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    <div class="d-flex align-items-center">
                        <div>
                            <h5 class="mb-1">Users</h5>
                        </div>
                        <div class="ms-auto">
                            <a href="{{ route('users.create') }}" class="btn btn-primary btn-sm radius-30">Create New User</a>
                        </div>
                    </div>

                    <div class="table-responsive mt-3">
                        <table class="table align-middle mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th>SN</th>
                                    <th>Name</th>
                                    <th>Phone</th>
                                    <th>Role</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($users as $index => $user)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->phone }}</td>
                                        <td>{{ ucfirst($user->role ?? 'N/A') }}</td>
                                        <td>
                                            <div class="d-flex order-actions">
                                                <form action="{{ route('users.destroy', $user->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this user?');">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm text-danger bg-light-danger border-0">
                                                        <i class='bx bxs-trash'></i>
                                                    </button>
                                                </form>
                                                <a href="{{ route('users.edit', $user->id) }}" class="ms-4 btn btn-sm text-primary bg-light-primary border-0">
                                                    <i class='bx bxs-edit'></i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="text-center">No users found.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div><!--end row-->

    <!-- Auto Dismiss Alert Script -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const alert = document.getElementById('success-alert');
            if (alert) {
                setTimeout(() => {
                    alert.classList.remove('show');
                }, 1000); // 1 seconds
            }
        });
    </script>
</x-layout>
