<x-layout>
    <div class="row">
        <div class="col">
            <div class="card radius-10">
                <div class="card-body">
                    <h5 class="mb-4">Create New Business</h5>
                    <form action="{{ route('businesses.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row g-3">
                            <!-- Business Name -->
                            <div class="col-md-6">
                                <label for="business_name" class="form-label">Business Name</label>
                                <input type="text" id="business_name" name="business_name" class="form-control @error('business_name') is-invalid @enderror" value="{{ old('business_name') }}" required>
                                @error('business_name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <!-- Physical Location -->
                            <div class="col-md-6">
                                <label for="physical_location" class="form-label">Physical Location</label>
                                <input type="text" id="physical_location" name="physical_location" class="form-control @error('physical_location') is-invalid @enderror" value="{{ old('physical_location') }}" required>
                                @error('physical_location')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <!-- Email -->
                            <div class="col-md-6">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" id="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" required>
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <!-- Telephone Number -->
                            <div class="col-md-6">
                                <label for="telephone_number" class="form-label">Telephone Number</label>
                                <input type="text" id="telephone_number" name="telephone_number" class="form-control @error('telephone_number') is-invalid @enderror" value="{{ old('telephone_number') }}" required>
                                @error('telephone_number')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <!-- TIN -->
                            <div class="col-md-6">
                                <label for="tin" class="form-label">TIN</label>
                                <input type="text" id="tin" name="tin" class="form-control @error('tin') is-invalid @enderror" value="{{ old('tin') }}">
                                @error('tin')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <!-- VRN -->
                            <div class="col-md-6">
                                <label for="vrn" class="form-label">VRN</label>
                                <input type="text" id="vrn" name="vrn" class="form-control @error('vrn') is-invalid @enderror" value="{{ old('vrn') }}">
                                @error('vrn')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <!-- PO Box -->
                            <div class="col-md-6">
                                <label for="po_box" class="form-label">P.O. Box</label>
                                <input type="text" id="po_box" name="po_box" class="form-control @error('po_box') is-invalid @enderror" value="{{ old('po_box') }}">
                                @error('po_box')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <!-- Footer Description -->
                            <div class="col-md-6">
                                <label for="footer_description" class="form-label">Footer Description</label>
                                <textarea id="footer_description" name="footer_description" class="form-control @error('footer_description') is-invalid @enderror">{{ old('footer_description') }}</textarea>
                                @error('footer_description')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <!-- Period -->
                            <div class="col-md-6">
                                <label for="period" class="form-label">Period</label>
                                <input type="text" id="period" name="period" class="form-control @error('period') is-invalid @enderror" value="{{ old('period') }}">
                                @error('period')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <!-- Logo -->
                            <div class="col-md-6">
                                <label for="logo" class="form-label">Logo</label>
                                <input type="file" id="logo" name="logo" class="form-control @error('logo') is-invalid @enderror">
                                @error('logo')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="mt-4">
                            <button type="submit" class="btn btn-primary">Create</button>
                            <a href="{{ route('businesses.index') }}" class="btn btn-secondary">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-layout>
