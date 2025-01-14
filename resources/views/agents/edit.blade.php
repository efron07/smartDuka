<x-layout>
    <h6 class="mb-0 text-uppercase">Edit Agent</h6>
    <hr/>
    <form action="{{ route('agents.update', $agent) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="first_name">First Name</label>
            <input type="text" name="first_name" class="form-control" value="{{ $agent->first_name }}" required>
        </div>
        <div class="form-group">
            <label for="last_name">Last Name</label>
            <input type="text" name="last_name" class="form-control" value="{{ $agent->last_name }}" required>
        </div>
        <div class="form-group">
            <label for="phone_number">Phone Number</label>
            <input type="text" name="phone_number" class="form-control" value="{{ $agent->phone_number }}" required>
        </div>
        <div class="form-group">
            <label for="district">District</label>
            <input type="text" name="district" class="form-control" value="{{ $agent->district }}" required>
        </div>
        <div class="form-group">
            <label for="region">Region</label>
            <input type="text" name="region" class="form-control" value="{{ $agent->region }}" required>
        </div>
        <div class="form-group">
            <label for="pastor_name">Pastor Name</label>
            <input type="text" name="pastor_name" class="form-control" value="{{ $agent->pastor
