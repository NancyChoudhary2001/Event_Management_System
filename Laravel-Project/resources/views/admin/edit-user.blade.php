@extends('admin.index')

@section('content')
<div class="container mt-4">
    <h2>Edit User</h2>
    <form action="{{ route('updateUser') }}" method="POST">
        @csrf
        <input type="hidden" name="email" value="{{ $user->email }}">
        
        <div class="form-group">
            <label for="first_name">First Name</label>
            <input type="text" name="first_name" class="form-control" value="{{ $user->first_name }}" required>
        </div>
        
        <div class="form-group">
            <label for="last_name">Last Name</label>
            <input type="text" name="last_name" class="form-control" value="{{ $user->last_name }}" required>
        </div>
        
        <div class="form-group">
            <label for="role">Role</label>
            <div class="d-flex">
                <div class="form-check me-3">
                    <input class="form-check-input" type="radio" name="role" id="roleAdmin" value="admin" {{ $user->role == 'admin' ? 'checked' : '' }}>
                    <label class="form-check-label" for="roleAdmin">
                        Admin
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="role" id="roleUser" value="user" {{ $user->role == 'user' ? 'checked' : '' }}>
                    <label class="form-check-label" for="roleUser">
                        User
                    </label>
                </div>
            </div>
        </div>
        
        <div class="form-group">
            <label for="phone_number">Phone Number</label>
            <input type="tel" name="phone_number" class="form-control" value="{{ $user->phone_number }}" required>
        </div>
        
        <div class="form-group">
            <label for="address">Address</label>
            <textarea name="address" class="form-control" rows="3" required>{{ $user->address }}</textarea>
        </div>
        
        <div class="form-group">
            <label for="country">Country</label>
            <select name="country" class="form-select" required>
                <option value="" disabled>Select Country</option>
                @foreach ($countries as $country)
                    <option value="{{ $country->id }}" {{ $user->country == $country->id ? 'selected' : '' }}>{{ $country->name }}</option>
                @endforeach
            </select>
        </div>
        
        <div class="form-group">
            <label for="state">State</label>
            <select name="state" class="form-select" required>
                <option value="" disabled>Select State</option>
                @foreach ($states as $state)
                    <option value="{{ $state->id }}" {{ $user->state == $state->id ? 'selected' : '' }}>{{ $state->name }}</option>
                @endforeach
            </select>
        </div>
        
        <div class="form-group">
            <label for="city">City</label>
            <select name="city" class="form-select" required>
                <option value="" disabled>Select City</option>
                @foreach ($cities as $city)
                    <option value="{{ $city->id }}" {{ $user->city == $city->id ? 'selected' : '' }}>{{ $city->name }}</option>
                @endforeach
            </select>
        </div>
        
        <div class="form-group">
            <label for="pin">Pincode</label>
            <input type="text" name="pin" class="form-control" value="{{ $user->pin }}" required>
        </div>
        
        <div class="form-group">
            <label for="branch">Branch</label>
            <select name="branch" class="form-select" required>
                <option value="" disabled>Select Branch</option>
                @foreach ($branches as $branch)
                    <option value="{{ $branch->id }}" {{ $user->branch == $branch->id ? 'selected' : '' }}>{{ $branch->name }}</option>
                @endforeach
            </select>
        </div>
        
        <button type="submit" class="btn btn-primary">Update User</button>
    </form>
</div>
@endsection
@section('scripts')
<script>
$(document).ready(function () {
    
    $('#country').on('change', function () {
        let countryId = $(this).val();
        
       
        $.get('/states/' + countryId, function (states) {
            $('#state').html('<option value="">Select State</option>'); 
            $('#city').html('<option value="">Select City</option>');
            
            
            states.forEach(function (state) {
                $('#state').append(`<option value="${state.id}">${state.name}</option>`);
            });
        });
    });


    $('#state').on('change', function () {
        let stateId = $(this).val();

        
        $.get('/cities/' + stateId, function (cities) {
            $('#city').html('<option value="">Select City</option>'); 
            
            
            cities.forEach(function (city) {
                $('#city').append(`<option value="${city.id}">${city.name}</option>`);
            });
        });
    });
});
</script>
@endsection
