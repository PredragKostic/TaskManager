
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>SB Admin - Login</title>

  <!-- Custom fonts for this template-->
  <link href="{{ url('admin/css/all.min.css') }}" rel="stylesheet" type="text/css">

  <!-- Custom styles for this template-->
 
  <link href="{{ url('admin/css/sb-admin.css') }}" rel="stylesheet">

  <meta name="csrf-token" content="{{ csrf_token() }}">

</head>

<body class="bg-dark">

  <div class="container">
    <div class="card card-login mx-auto mt-5">
      <div class="card-header">Login</div>
      <div class="card-body">
      <form method="POST" action="{{ route('login') }}">
        @csrf
          <div class="form-group">
            <div class="form-label-group">

              <input type="email" id="inputEmail" class="form-control @error('email') is-invalid @enderror" required="required" name="email" value="{{ old('email') }}">
              <label for="inputEmail">Email address</label>
              @error('email')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
              
            </div>
          </div>
          <div class="form-group">
            <div class="form-label-group">
              <input type="password" id="inputPassword" class="form-control" placeholder="Password" required="required" name="password">
              <label for="inputPassword">Password</label>
            </div>
          </div>
         <input type="submit" class="btn btn-primary btn-block" value="login">
          
        </form>
        
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
 
  <script src="{{ url('admin/js/jquery.min.js') }}"></script> 

 
  <script src="{{ url('admin/js/bootstrap.bundle.min.js') }}"></script>

  <!-- Core plugin JavaScript-->
  
  <script src="{{ url('admin/js/jquery.easing.min.js') }}"></script>

</body>

</html>
