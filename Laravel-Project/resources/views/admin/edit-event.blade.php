@extends('admin.layouts.layout')
@section('content')
<div class="container-fluid">
    <div class="card">
        <h4 class="card-header">Edit Event</h4>
        <div class="body m-4">
            <form action="{{ route('events.update', $event->name) }}" method="POST">
                @csrf
                @method('PUT') 

                
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ $event->name }}" required>
                </div>

                
                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea class="form-control" id="description" name="description" rows="3" required>{{ $event->description }}</textarea>
                </div>

                
                <div class="row mb-3">
                   
                    <div class="col-3">
                        <label for="currency" class="form-label">Currency</label>
                        <select id="currency" name="currency" class="form-select" required>
                            @foreach ($currencies as $currency)
                                <option value="{{ $currency->id }}" {{ $currency->id == $event->currency_id ? 'selected' : '' }}>
                                    {{ $currency->currency }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                   
                    <div class="col-9">
                        <label for="price" class="form-label">Price</label>
                        <input type="text" class="form-control" id="price" name="price" value="{{ $event->price }}" required>
                    </div>
                </div>

              
                <div class="mb-3">
                    <label for="visibility" class="form-label">Visibility</label>
                    <div class="d-flex">
                        <div class="form-check me-3">
                            <input class="form-check-input" type="radio" name="visibility" id="visibilityAdmin" value="admin" 
                                {{ $event->role == 'admin' ? 'checked' : '' }}>
                            <label class="form-check-label" for="visibilityAdmin">Admin</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="visibility" id="visibilityUser" value="user" 
                                {{ $event->role == 'user' ? 'checked' : '' }}>
                            <label class="form-check-label" for="visibilityUser">User</label>
                        </div>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">Update Event</button>
            </form>
        </div>
    </div>
</div>
@endsection
