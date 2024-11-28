@extends('admin.layouts.layout')

@section('content')
<div class="container-fluid">
<div class="card">
    <h2 class="card-header">Edit Branch</h2>
    <div class="body m-4">
        <table id="branch-table" class="table table-striped table-bordered">
    <form action="{{ route('branches.update', $branch->name) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="name" class="form-label">Branch Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $branch->name }}" required>
        </div>
        <div class="mb-3">
            <label for="address" class="form-label">Address</label>
            <input type="text" class="form-control" id="address" name="address" value="{{ $branch->address }}" required>
        </div>
        <div class="mb-3">
            <label for="country" class="form-label">Country</label>
            <select id="country" name="country" class="form-select">
                @foreach ($countries as $country)
                    <option value="{{ $country->id }}" {{ $branch->country_id == $country->id ? 'selected' : '' }}>{{ $country->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="state" class="form-label">State</label>
            <select id="state" name="state" class="form-select">
                @foreach ($states as $state)
                    <option value="{{ $state->id }}" {{ $branch->state_id == $state->id ? 'selected' : '' }}>{{ $state->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="city" class="form-label">City</label>
            <select id="city" name="city" class="form-select">
                @foreach ($cities as $city)
                    <option value="{{ $city->id }}" {{ $branch->city_id == $city->id ? 'selected' : '' }}>{{ $city->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="pincode" class="form-label">Pin Code</label>
            <input type="text" class="form-control" id="pincode" name="pincode" value="{{ $branch->pincode }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Update Branch</button>
    </form>
</table>
</div>
</div>
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
