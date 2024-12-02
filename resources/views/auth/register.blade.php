<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>REGISTER</title>

  <!-- plugins:css -->
  <link rel="stylesheet" href="../../vendors/feather/feather.css">
  <link rel="stylesheet" href="../../vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="../../vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- inject:css -->
  <link rel="stylesheet" href="../../css/vertical-layout-light/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="assets/img/logo/walktogether.png" />
</head>

<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth px-0">
        <div class="row w-100 mx-0">
          <div class="col-lg-4 mx-auto">
            <div class="auth-form-light text-left py-5 px-4 px-sm-5">
              <div class="brand-logo">
                <img src="../../assets/img/logo/walktogether.png" alt="logo">
              </div>
              <h4>New here?</h4>
              <h6 class="font-weight-light">REGISTRASI NOW</h6>
              <form action="{{ route('register.action') }}" method="POST" class="pt-3">
                @csrf
                <div class="form-group">
                    <input type="text" class="form-control form-control-lg" id="exampleInputUsername1" placeholder="Username" name="username">
                    @error('username')
                    <span class="text-red-600">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <input type="email" class="form-control form-control-lg" id="email" placeholder="Email" name="email">
                    @error('email')
                    <span class="text-red-600">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <input type="password" class="form-control form-control-lg" id="exampleInputPassword1" placeholder="Password" name="password">
                    @error('password')
                    <span class="text-red-600">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <input type="password" class="form-control form-control-lg" id="exampleInputPassword2" placeholder="Confirm Password" name="password_confirmation">
                    @error('password_confirmation')
                    <span class="text-red-600">{{ $message }}</span>
                    @enderror
                </div>
            
                <div class="form-group">
                    <label for="role_id">Role</label>
                    <select class="form-control form-control-lg" id="role_id" name="role_id">
                        @foreach($roles as $role)
                            <option value="{{ $role->id }}">{{ $role->username }}</option>
                        @endforeach
                    </select>
                    @error('role_id')
                    <span class="text-red-600">{{ $message }}</span>
                    @enderror
                </div>
            
                <div class="mb-4">
                    <div class="form-check">
                        <label class="form-check-label text-muted">
                            <input type="checkbox" class="form-check-input" name="terms" required>
                            I agree to all Terms & Conditions
                        </label>
                    </div>
                </div>
                <div class="mt-3">
                    <button type="submit" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">SIGN UP</button>
                </div>
                <div class="text-center mt-4 font-weight-light">
                    Already have an account? <a href="login" class="text-primary">Login</a>
                </div>
            </form>            
            </div>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="../../vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- inject:js -->
  <script src="../../js/off-canvas.js"></script>
  <script src="../../js/hoverable-collapse.js"></script>
  <script src="../../js/template.js"></script>
  <script src="../../js/settings.js"></script>
  <script src="../../js/todolist.js"></script>
  <!-- endinject -->
</body>

</html>
