<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="csrf-token" content="{{ csrf_token() }}" />

  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  <title>AdminLTE 3 | Dashboard</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('admin/plugins/fontawesome-free/css/all.min.css') }}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="{{ asset('admin/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{ asset('admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
  <!-- JQVMap -->
  <link rel="stylesheet" href="{{ asset('admin/plugins/jqvmap/jqvmap.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('admin/dist/css/adminlte.min.css') }}">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{ asset('admin/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{ asset('admin/plugins/daterangepicker/daterangepicker.css') }}">
  <!-- summernote -->
  <link rel="stylesheet" href="{{ asset('admin/plugins/summernote/summernote-bs4.min.css') }}">
  <!-- DataTables CSS -->
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Preloader -->
  {{-- <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
  </div> --}}

  <!-- Navbar -->
   @include('admin.layouts.nav-top')
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  @include('admin.layouts.side-nav')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard v1</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content" >
      <div class="container-fluid">
        <div class="card">
          <h4 class="card-header" >New User </h4>
          <div class="body" style="padding: 60px;">
            <form  id="addUser" >
                @csrf
            
                <div class="mb-3">
                  <label for="firstname" class="form-label">First Name</label>
                  <input type="text" class="form-control" id="firstname" name="firstname">
                  <small id="firstNameError" class="error-message"></small>
                </div>

                <div class="mb-3">
                  <label for="lastname" class="form-label">Last Name</label>
                  <input type="text" class="form-control" id="lastname" name="lastname">
                  <small id="firstNameError" class="error-message"></small>
                </div>

                <div class="mb-3">
                  <label for="role" class="form-label">Role</label>
                  <div class="d-flex"> 
                      <div class="form-check me-3">
                          <input class="form-check-input" type="radio" name="role" id="roleAdmin" value="admin">
                          <label class="form-check-label" for="roleAdmin">
                              Admin
                          </label>
                      </div>
                      <div class="form-check">
                          <input class="form-check-input" type="radio" name="role" id="roleUser" value="user">
                          <label class="form-check-label" for="roleUser">
                              User
                          </label>
                      </div>
                  </div>
                </div>

                <div class="mb-3">
                  <label for="phone" class="form-label">Phone</label>
                  <input type="tel" class="form-control" id="phone" name="phone" required>
                  <small id="firstNameError" class="error-message"></small>
                </div>
          
                <div class="mb-3">
                  <label for="email" class="form-label">Email</label>
                  <input type="email" class="form-control" id="email" name="email" required>
                  <small id="firstNameError" class="error-message"></small>
                </div>
          
                
                <div class="mb-3">
                  <label for="address" class="form-label">Address</label>
                  <textarea class="form-control" id="address" name="address" rows="3" required></textarea>
                  <small id="firstNameError" class="error-message"></small>
                </div>
                
                <div class="mb-3">
                    <label for="country" class="form-label">Country</label>
                    <select class="form-select" id="country" name="country" required>
                    <small id="firstNameError" class="error-message"></small>
                    <option value="" selected disabled>Select Country</option>
                    @foreach ($countries as $country)
                        <option value="{{ $country->id }}">{{ $country->name }}</option>
                    @endforeach
                    </select>
                </div>
                
                <div class="mb-3">
                    <label for="state" class="form-label">State</label>
                    <select class="form-select" id="state" name="state" required>
                    <option value="" selected disabled>Select State</option>
                    <small id="firstNameError" class="error-message"></small>
                    </select>
                </div>
                
                
                <div class="mb-3">
                    <label for="city" class="form-label">City</label>
                    <select class="form-select" id="city" name="city" required>
                    <option value="" selected disabled>Select City</option>
                    <small id="firstNameError" class="error-message"></small>
                    </select>
                </div>
  
                <div class="mb-3">
                  <label for="pin" class="form-label">Pincode</label>
                  <input type="text" class="form-control" id="pin" name="pin" required>
                  <small id="firstNameError" class="error-message"></small>
                </div>
          
                <div class="mb-3">
                    <label for="branch" class="form-label">Branch</label>
                    <select class="form-select" id="branch" name="branch" required>
                    <option value="" selected disabled>Select Branch</option>
                    <small id="firstNameError" class="error-message"></small>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
              </form>
        </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  
  <!-- Footer -->
  @include('admin.layouts.footer');

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
<!-- DataTables Initialization -->
<script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
 <!-- Include Bootstrap JS -->
<script src="{{ asset('admin/plugins/jquery/jquery.min.js') }}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{ asset('admin/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{ asset('admin/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- ChartJS -->
<script src="{{ asset('admin/plugins/chart.js/Chart.min.js') }}"></script>
<!-- Sparkline -->
<script src="{{ asset('admin/plugins/sparklines/sparkline.js') }}"></script>
<!-- JQVMap -->
<script src="{{ asset('admin/plugins/jqvmap/jquery.vmap.min.js') }}"></script>
<script src="{{ asset('admin/plugins/jqvmap/maps/jquery.vmap.usa.js') }}"></script>
<!-- jQuery Knob Chart -->
<script src="{{ asset('admin/plugins/jquery-knob/jquery.knob.min.js') }}"></script>
<!-- daterangepicker -->
<script src="{{ asset('admin/plugins/moment/moment.min.js') }}"></script>
<script src="{{ asset('admin/plugins/daterangepicker/daterangepicker.js') }}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{ asset('admin/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
<!-- Summernote -->
<script src="{{ asset('admin/plugins/summernote/summernote-bs4.min.js') }}"></script>
<!-- overlayScrollbars -->
<script src="{{ asset('admin/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('admin/dist/js/adminlte.js') }}"></script>
{{-- <!-- AdminLTE for demo purposes -->
<script src="{{ asset('admin/dist/js/demo.js') }}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{ asset('admin/dist/js/pages/dashboard.js') }}"></script> --}}
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
        $(document).ready(function () {
        
        $('#state').prop('disabled', true);
        $('#city').prop('disabled', true);
        $('#branch').prop('disabled', true);


        $('#country').change(function () {
            var country_id = $(this).val();

            if (country_id) {
            
            $('#state').prop('disabled', false).empty().append('<option value="" selected disabled>Select State</option>');
            $('#city').prop('disabled', true).empty().append('<option value="" selected disabled>Select City</option>');
            $('#branch').prop('disabled', true).empty().append('<option value="" selected disabled>Select Branch</option>');

            
            $.ajax({
                url: '/states/' + country_id,
                type: 'GET',
                dataType: 'json',
                success: function (data) {
                $.each(data, function (key, value) {
                    $('#state').append('<option value="' + value.id + '">' + value.name + '</option>');
                });
                },
                error: function () {
                alert('Failed to fetch states. Please try again.');
                }
            });
            } else {
            $('#state').prop('disabled', true);
            $('#city').prop('disabled', true);
            $('#branch').prop('disabled', true);
            }
        });

        $('#state').change(function () {
            var state_id = $(this).val();

            if (state_id) {
           
            $('#city').prop('disabled', false).empty().append('<option value="" selected disabled>Select City</option>');
            $('#branch').prop('disabled', true).empty().append('<option value="" selected disabled>Select Branch</option>');

            
            $.ajax({
                url: '/cities/' + state_id,
                type: 'GET',
                dataType: 'json',
                success: function (data) {
                $.each(data, function (key, value) {
                    $('#city').append('<option value="' + value.id + '">' + value.name + '</option>');
                });
                },
                error: function () {
                alert('Failed to fetch cities. Please try again.');
                }
            });
            } else {
            $('#city').prop('disabled', true);
            $('#branch').prop('disabled', true);
            }
        });

        // When a city is selected
        $('#city').change(function () {
            var city_id = $(this).val();

            if (city_id) {
            // Enable the branch dropdown
            $('#branch').prop('disabled', false).empty().append('<option value="" selected disabled>Select Branch</option>');;

            // Fetch branches based on city_id
            $.ajax({
                url: '/branches/' + city_id,
                type: 'GET',
                dataType: 'json',
                success: function (data) {
                $.each(data, function (key, value) {
                    $('#branch').append('<option value="' + value.id + '">' + value.name + '</option>');
                });
                },
                error: function () {
                alert('Failed to fetch branches. Please try again.');
                }
            });
            } else {
            $('#branch').prop('disabled', true);
            }
          });
        $('#addUser').on('submit' , function(event){
          event.preventDefault();

          const firstnameValue = $('#firstname').val().trim();
          console.log(firstnameValue);
          const lastnameValue = $('#lastname').val().trim();
          const phoneValue = $('#phone').val().trim();
          const emailValue = $('#email').val().trim();
          const roleValue = $('input[name="role"]:checked').val();
          console.log(roleValue);
          const addressValue = $('#address').val().trim();
          const countryValue = $('#country').val().trim();
          const stateValue = $('#state').val().trim();
          const cityValue = $('#city').val().trim();
          const pinValue = $('#pin').val().trim();
          const branchValue = $('#branch').val().trim();

          $.ajax({
            url: '/api/adduser',
            type: 'POST',
            headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            contentType: 'application/json',
            data: JSON.stringify({
              first_name : firstnameValue,
              last_name : lastnameValue,
              email : emailValue,
              role : roleValue,
              phone_number :phoneValue,
              address : addressValue,
              country :countryValue,
              state : stateValue,
              city : cityValue,
              pincode : pinValue,
              branch : branchValue,
            }),
            success: function(response) {
              alert('success');
              window.location.href = "{{ route('indexx') }}"
            },
            error: function(xhr,status,error){
              alert('Error:' +xhr.responseText);
            },
          });
        });
      });

</script>
</body>
</html>
