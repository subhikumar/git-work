<!DOCTYPE html>
<html lang="en">
  @include('admin.layouts.css')

  <body>
    <div class="container-scroller">
      <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="content-wrapper d-flex align-items-center auth">
          <div class="row flex-grow">
            <div class="col-lg-4 mx-auto">
              <div class="auth-form-light text-left">
                <div class="brand-logo">
                  <h2 class="font-weight-light"><b>Sign In</b></h2>
                </div>
                <form class="pt-3" action="{{ route('store.register') }}" method="post">
                @csrf
                   <div class="form-group">
                    <input type="text" name="name" class="form-control form-control-lg" placeholder="Name">
                    @if ($errors->has('name'))
                        <span class="text-danger">{{ $errors->first('name') }}</span>
                    @endif
                  </div>
                  <div class="form-group">
                    <input type="email" name="email" class="form-control form-control-lg" placeholder="Email">
                    @if ($errors->has('email'))
                        <span class="text-danger">{{ $errors->first('email') }}</span>
                    @endif
                  </div>
                  <div class="form-group">
                    <input type="password" name="password" class="form-control form-control-lg" placeholder="Password">
                    @if ($errors->has('password'))
                        <span class="text-danger">{{ $errors->first('password') }}</span>
                    @endif
                  </div>
                  <div class="mt-3">

                    <button class="btn btn-success" type="submit">SIGN IN</button>
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
    @include('admin.layouts.scripts')
  </body>
</html>



 <!-- plugins:js -->
    {{-- <script src="{{ asset('assets/vendors/js/vendor.bundle.base.js') }}"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="{{ asset('assets/js/off-canvas.js') }}"></script>
    <script src="{{ asset('assets/js/hoverable-collapse.js') }}"></script>
    <script src="{{ asset('assets/js/misc.js') }}"></script> --}}
    <!-- endinject -->

