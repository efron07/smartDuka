<x-layout>
    <div class="row">
        <div class="col">
            <div class="card radius-10">
                <div class="card-body">
                    <!-- Success Alert -->
                    @if (session('success'))
                        <div id="success-alert" class="alert alert-success alert-dismissible fade show position-absolute top-0 end-0 m-3" role="alert" style="z-index: 1050; background-color: #28a745; color: white;">
                            <strong>Success!</strong> {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    <h5 class="mb-4">Businesses</h5>
                    <div class="text-end mb-3">
                        <a href="{{ route('businesses.create') }}" class="btn btn-primary">Create New Business</a>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Business Name</th>
                                    <th>Email</th>
                                    <th>Telephone</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($businesses as $index => $business)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $business->business_name }}</td>
                                        <td>{{ $business->email }}</td>
                                        <td>{{ $business->telephone_number }}</td>
                                        <td>
                                            <div class="d-flex order-actions">
                                                <form action="{{ route('businesses.destroy', $business->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this business?');">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm text-danger bg-light-danger border-0">
                                                        <i class='bx bxs-trash'></i>
                                                    </button>
                                                </form>
                                                <a href="{{ route('businesses.edit', $business->id) }}" class="ms-4 btn btn-sm text-primary bg-light-primary border-0">
                                                    <i class='bx bxs-edit'></i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="text-center">No businesses found.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const alert = document.getElementById('success-alert');
            if (alert) {
                setTimeout(() => {
                    alert.classList.remove('show');
                }, 3000); // 3 seconds
            }
        });
    </script>
</x-layout>
