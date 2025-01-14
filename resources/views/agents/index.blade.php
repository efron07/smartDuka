<x-layout>
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="ms-auto">
            <div class="btn-group">
                <a href="{{ route('agents.create') }}" class="btn btn-primary">Add New Agent</a>
            </div>
        </div>
    </div>

    {{-- Alert for notification --}}
    @if(session('success'))
    <div class="toast-container position-fixed top-0 end-0 p-3" style="margin-top: 60px;">
        <div class="toast align-items-center text-bg-success border-0" role="alert" aria-live="assertive" aria-atomic="true" data-bs-delay="5000">
            <div class="d-flex">
                <div class="toast-body">
                    {{ session('success') }}
                </div>
                <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
        </div>
    </div>
    @endif

    <h6 class="mb-0 text-uppercase">AGENT LIST</h6>
    <hr/>
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table id="example" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Phone Number</th>
                            <th>District</th>
                            <th>Region</th>
                            <th>Pastor Name</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($agents as $agent)
                        <tr>
                            <td>{{ $agent->first_name }}</td>
                            <td>{{ $agent->last_name }}</td>
                            <td>{{ $agent->phone_number }}</td>
                            <td>{{ $agent->district }}</td>
                            <td>{{ $agent->region }}</td>
                            <td>{{ $agent->pastor_name }}</td>
                            <td>
                                <a href="{{ route('agents.edit', $agent) }}" class="btn btn-warning btn-sm">Edit</a>
                                <form action="{{ route('agents.destroy', $agent) }}" method="POST" style="display: inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var toastElList = [].slice.call(document.querySelectorAll('.toast'))
            var toastList = toastElList.map(function (toastEl) {
                return new bootstrap.Toast(toastEl)
            })
            toastList.forEach(toast => toast.show())
        });
    </script>
</x-layout>
