<div class="row">
  <div class="col-12">
    <form action="{{route('user.store')}}" method="POST">
      @csrf
      <div class="form-group">
        <label for="name">Full Name</label>
        <input type="text" name="name" class="form-control" id="name" value="{{old('name')}}">
      </div>
      <div class="form-group">
        <label for="email">Email</label>
        <input type="email" name="email" class="form-control" id="email" value="{{old('email')}}">
      </div>
      <div class="form-group">
        <label for="password">Password</label>
        <input type="password" name="password" class="form-control" id="password1">
      </div>
      <div class="form-group">
        <label for="password">Password Confirmation</label>
        <input type="password" name="password_confirmation" class="form-control" id="password2">
      </div>
    </form>
  </div>
</div>

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