@extends('adminlte.login')

@section('content')
  <div class="register-box">
    <div class="register-logo">
      <a href="#"><b>Form Register</b></a>
    </div>

    <div class="card">
      <div class="card-body register-card-body">
        <p class="login-box-msg">Register a new membership</p>

        @foreach ($errors->all() as $item)
          <div class="alert alert-danger" role="alert">
            {{$item}}
          </div>
        @endforeach

        <form action="{{route('register')}}" method="post">
          @csrf
          <div class="input-group mb-3">
            <input type="text" class="form-control" name="name" value="{{old('name')}}" placeholder="Full name" required>
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-user"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="email" class="form-control" placeholder="Email" value="{{old('email')}}" name="email" required>
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-envelope"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="password" class="form-control" placeholder="Password" name="password" id="password1" required>
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="password" class="form-control" placeholder="Retype password" id="password2" name="password_confirmation">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-8">
              <div class="icheck-primary">
                <input type="checkbox" id="agreeTerms" name="terms" value="agree" required>
                <label for="agreeTerms">
                  I agree to the <a href="#">terms</a>
                </label>
              </div>
            </div>
            <!-- /.col -->
            <div class="col-4">
              <button type="submit" class="btn btn-primary btn-block" id="submit" disabled>Register</button>
            </div>
            <!-- /.col -->
          </div>
        </form>

        <div class="mt-3 mb-1">
          <a href="{{route('login')}}" class="text-center">I already registered</a>
        </div>
      </div>
      <!-- /.form-box -->
    </div><!-- /.card -->
  </div>
  <!-- /.register-box -->
@endsection

@section('script')
  <script>
    $(document).on("keyup","#password1", function() {
      passwordCheck();
    })
    $(document).on("keyup","#password2", function() {
      passwordCheck();
    })

    function passwordCheck() {
      let pass1 = $("#password1")
      let pass2 = $("#password2")
      let btn = $("#submit")

      if(!pass2.val()) {
        return false
      }

      if(pass1.val()==pass2.val()) {
        pass2.removeClass('is-invalid')
        pass2.addClass('is-valid')
        btn.removeAttr('disabled')
      } else {
        pass2.removeClass('is-valid')
        pass2.addClass('is-invalid')
        btn.attr('disabled',true)
      }
    }
  </script>
    
@endsection