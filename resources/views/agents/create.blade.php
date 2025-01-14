<x-layout>
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="{{ route('agents.index') }}"><i class="bx bx-home-alt"></i></a></li>
                    <li class="breadcrumb-item active" aria-current="page">Add New Agent</li>
                </ol>
            </nav>
        </div>
    </div>
    <h6 class="mb-0 text-uppercase">Add New Agent</h6>
    <hr/>
    <div class="card">
        <div class="card-body">
            <form action="{{ route('agents.store') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="first_name" class="form-label">First Name</label>
                            <input type="text" class="form-control" id="first_name" name="first_name" placeholder="Enter first name" required>
                        </div>
                        <div class="mb-3">
                            <label for="last_name" class="form-label">Last Name</label>
                            <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Enter last name" required>
                        </div>
                        <div class="mb-3">
                            <label for="phone_number" class="form-label">Phone Number</label>
                            <input type="text" class="form-control" id="phone_number" name="phone_number" placeholder="Enter phone number" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="district" class="form-label">District</label>
                            <input type="text" class="form-control" id="district" name="district" placeholder="Enter district" required>
                        </div>
                        <div class="mb-3">
                            <label for="region" class="form-label">Region</label>
                            <input type="text" class="form-control" id="region" name="region" placeholder="Enter region" required>
                        </div>
                        <div class="mb-3">
                            <label for="pastor_name" class="form-label">Pastor Name</label>
                            <input type="text" class="form-control" id="pastor_name" name="pastor_name" placeholder="Enter pastor name" required>
                        </div>
                    </div>
                </div>
                <div class="d-flex justify-content-end">
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</x-layout>
