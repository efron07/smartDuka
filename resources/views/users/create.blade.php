<x-layout>
    <div class="row">
        <div class="col">
            <div class="card radius-10">
                <div class="card-body">
                    <h5 class="mb-4">Create New User</h5>
                    <form action="{{ route('users.store') }}" method="POST">
                        @csrf
                        <div class="row g-3">
                            <!-- Name -->
                            <div class="col-md-6">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" id="name" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" required>
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <!-- Phone -->
                            <div class="col-md-6">
                                <label for="phone" class="form-label">Phone</label>
                                <input type="text" id="phone" name="phone" class="form-control @error('phone') is-invalid @enderror" value="{{ old('phone') }}" required>
                                @error('phone')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <!-- Password -->
                            <div class="col-md-6">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" id="password" name="password" class="form-control @error('password') is-invalid @enderror" required>
                                @error('password')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <!-- Business -->
                            <div class="col-md-6">
                                <label for="business" class="form-label">Business</label>
                                <input type="text" id="business" name="business" class="form-control @error('business') is-invalid @enderror" value="{{ old('business') }}" required>
                                @error('business')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <!-- Role -->
                            <div class="col-md-6">
                                <label for="role" class="form-label">Role</label>
                                <select  class="form-select @error('role') is-invalid @enderror select " id="role" name="role" required>
                                    <option>--Select Role--</option>
                                    <option value="1">Super Admin </option>
                                    <option value="2">Admin</option>
                                    <option value="3">Sales</option>
                                    <option value="3">Stock Person</option>

                                </select>
                                @error('role')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="mt-4">
                            <button type="submit" class="btn btn-primary">Create</button>
                            <a href="{{ route('users.index') }}" class="btn btn-secondary">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-layout>
