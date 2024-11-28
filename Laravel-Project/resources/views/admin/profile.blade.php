@extends('admin.layouts.layout')
@section('content')

<div class="container mt-4">
    <div class="row">
       
        <div class="col-md-6">
            <div class="card shadow">
                <div class="card-header">
                    <h5>Edit Profile</h5>
                </div>
                <div class="card-body">
                       
                          
                            <form id="editprofile" method="POST"  enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                              
                                <div class="text-center mb-4">
                                    <div class="position-relative d-inline-block">
                                        
                                        <i class="fa-solid fa-user position-absolute top-50 start-50 translate-middle text-muted" style="font-size: 50px; display: none;" id="profile-icon"></i>

                                        
                                        <img src="{{ $user->profile_picture ? asset('storage/' . $user->profile_picture) : 'https://via.placeholder.com/120' }}" alt="Profile" id="profile-pic"
                                            class="rounded-circle img-thumbnail border-secondary" style="width: 120px; height: 120px; object-fit: cover;">

                                        <input type="file" id="upload-profile-pic" name="profile_picture" class="form-control position-absolute top-0 start-0 w-100 h-100 opacity-0" accept="image/*">
                                    </div>
                                </div>
                                
                                <div class="mb-3">
                                    <label for="first-name" class="form-label">First Name</label>
                                    <input type="text" class="form-control" id="first-name" name="first_name" placeholder="Enter first name" value="{{ old('first_name', $user->first_name) }}">
                                    <small id="firstNameError" class="error-message"></small>
                                </div>

                                
                                <div class="mb-3">
                                    <label for="last-name" class="form-label">Last Name</label>
                                    <input type="text" class="form-control" id="last-name" name="last_name" placeholder="Enter last name" value="{{ old('last_name', $user->last_name) }}">
                                    <small id="lastNameError" class="error-message"></small>
                                </div>

                               
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" class="form-control" id="email" name="email" placeholder="Enter email" value="{{ old('email', $user->email) }}">
                                    <small id="emailError" class="error-message"></small>
                                </div>

                                <div class="mb-3">
                                    <label for="phone" class="form-label">Phone Number</label>
                                    <input type="tel" class="form-control" id="phone" name="phone" placeholder="Enter phone number" value="{{ old('phone', $user->phone) }}">
                                    <small id="phoneError" class="error-message"></small>
                                </div>

                                <button type="submit" class="btn btn-primary">Save Changes</button>
                            </form>
                        </div>
            </div>
        </div>

        
        <div class="col-md-6">
            <div class="card shadow">
                <div class="card-header">
                    <h5>Change Password</h5>
                </div>
                <div class="card-body">
                    <form>
                        <div class="mb-3">
                            <label for="current-password" class="form-label">Current Password</label>
                            <div class="input-group">
                                <input type="password" class="form-control" id="current-password" placeholder="Enter current password">
                                <button class="btn btn-outline-secondary toggle-password" type="button" data-target="current-password">
                                    <i class="fa fa-eye-slash"></i>
                                </button>   
                            </div>
                            <small id="currentpasswordError" class="error-message"></small>
                        </div>
                        <div class="mb-3">
                            <label for="new-password" class="form-label">New Password</label>
                            <div class="input-group">
                                <input type="password" class="form-control" id="new-password" placeholder="Enter new password">
                                <button class="btn btn-outline-secondary toggle-password" type="button" data-target="new-password">
                                    <i class="fa fa-eye-slash"></i>
                                </button>
                            </div>
                            <small id="newpasswordError" class="error-message"></small>
                        </div>
                        <div class="mb-3">
                            <label for="confirm-password" class="form-label">Confirm New Password</label>
                            <div class="input-group">
                                <input type="password" class="form-control" id="confirm-password" placeholder="Confirm new password">
                                <button class="btn btn-outline-secondary toggle-password" type="button" data-target="confirm-password">
                                    <i class="fa fa-eye-slash"></i>
                                </button>
                            </div>
                            <small id="confirmpasswordError" class="error-message"></small>
                        </div>
                        <button type="submit" class="btn btn-primary">Update Password</button>
                    </form>
                </div>
            </div>
        </div>

    </div> <!-- End of row -->
</div>


@endsection

@section('scripts')
<script>
    document.getElementById('upload-profile-pic').addEventListener('change', function(event) {
    const file = event.target.files[0];
    const reader = new FileReader();
    
    reader.onloadend = function() {
        document.getElementById('profile-pic').src = reader.result;
        document.getElementById('profile-icon').style.display = 'none'; 
    };

    if (file) {
        reader.readAsDataURL(file);
    }
});

   
    document.querySelectorAll('.toggle-password').forEach(button => {
        button.addEventListener('click', function () {
            const targetId = this.getAttribute('data-target');
            const target = document.getElementById(targetId);
            const type = target.getAttribute('type') === 'password' ? 'text' : 'password';
            target.setAttribute('type', type);
            const icon = this.querySelector('i');
            icon.classList.toggle('fa-eye');
            icon.classList.toggle('fa-eye-slash');
        });
    });
    
    $('#editprofile').on('submit', function(event) {
    event.preventDefault();
    
   
    const firstnameValue = $('#first-name').val().trim();
    const lastnameValue = $('#last-name').val().trim();
    const emailValue = $('#email').val().trim();
    const phonenumberValue = $('#phone').val().trim();
    
    
    $('#firstNameError').text('');
    $('#lastNameError').text('');
    $('#emailError').text('');
    $('#phoneError').text('');
    
   
    const isValid = checkInputs(firstnameValue, lastnameValue, emailValue, phonenumberValue);
    
    if (isValid) {
       
        var formData = new FormData(this);  
        const profilePictureInput = $('#upload-profile-pic')[0];
        if (profilePictureInput.files[0]) {
            formData.append('profile_picture', profilePictureInput.files[0]);
        }

        $.ajax({
            url: '{{ route('profile.update', ['user_id' => $user->id]) }}',
            type: 'POST',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: formData,
            contentType: false,  
            processData: false,  
            success: function (response) {
                window.location.href = "{{ route('index') }}";  
            },
            error: function (error) {
                if (error.status === 412 && error.responseJSON) {
                   
                    let messages = error.responseJSON.message;
                    $.each(messages, function (key, value) {
                        if (key === 'first_name') {
                            $('#firstNameError').text(value);
                        }
                        if (key === 'last_name') {
                            $('#lastNameError').text(value);
                        }
                        if (key === 'email') {
                            $('#emailError').text(value);
                        }
                        if (key === 'phone') {
                            $('#phoneError').text(value);
                        }
                    });
                }
            }
        });
    }
});

function checkInputs(firstnameValue, lastnameValue, emailValue, phonenumberValue) {
    const namePattern = /^[a-zA-Z ]+$/;
    const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    const phonenumberPattern = /^\d{10}$/;
    let isValid = true;

    if (firstnameValue === "") {
        setErrorFor($('#first-name'), 'First name required');
        isValid = false;
    } else if (!namePattern.test(firstnameValue)) {
        setErrorFor($('#first-name'), 'Name must contain only characters');
        isValid = false;
    } else {
        setSuccessFor($('#first-name'));
    }

    if (lastnameValue === "") {
        setErrorFor($('#last-name'), 'Last name required');
        isValid = false;
    } else if (!namePattern.test(lastnameValue)) {
        setErrorFor($('#last-name'), 'Name must contain only characters');
        isValid = false;
    } else {
        setSuccessFor($('#last-name'));
    }

    if (emailValue === "") {
        setErrorFor($('#email'), 'Email required');
        isValid = false;
    } else if (!emailPattern.test(emailValue)) {
        setErrorFor($('#email'), 'Please enter a valid email address.');
        isValid = false;
    } else {
        setSuccessFor($('#email'));
    }

    if (phonenumberValue === "") {
        setErrorFor($('#phone'), 'Phone number required');
        isValid = false;
    } else if (!phonenumberPattern.test(phonenumberValue)) {
        setErrorFor($('#phone'), 'Phone number must be 10 digits');
        isValid = false;
    } else {
        setSuccessFor($('#phone'));
    }

    return isValid;
}

function setErrorFor(input, message) {
    const formControl = input.parent();
    const small = formControl.find('.error-message');
    small.text(message);
    formControl.addClass('error');
}

function setSuccessFor(input) {
    const formControl = input.parent();
    const small = formControl.find('.error-message');
    small.text('');
    formControl.removeClass('error');
}


</script>
@endsection
