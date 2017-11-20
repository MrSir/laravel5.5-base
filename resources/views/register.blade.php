@extends('master')

@section('content')
    <br/>
    <div class="alert hide" role="alert" id="alert"></div>
    <div class="card">
        <h4 class="card-header">Register</h4>
        <div class="card-body">
            <div id="register">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name" placeholder="e.g. John Smith">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" placeholder="e.g. jsmith@gmail.com">
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password" name="password">
                </div>
                <div class="form-group">
                    <label for="password_confirmation">Confirm Password</label>
                    <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
                </div>
                <button type="button" class="btn btn-primary" onclick="javascript: register()">Submit</button>
            </div>
            <hr/>
            <a href="/redirect/google" class="btn btn-secondary">Register With Google</a>
            <a href="/redirect/github" class="btn btn-secondary">Register With GitHub</a>
        </div>
    </div>

    <script type="text/javascript">
      function register() {
        var data = {
          'name': $('#register #name').val(),
          'email': $('#register #email').val(),
          'password': $('#register #password').val(),
          'password_confirmation': $('#register #password_confirmation').val(),
        }

        $.ajax(
          {
            url: 'http://local.laravel55.com/api/user',
            data: data,
            type: 'POST',
            dataType: 'json',
          }
        ).done(
          function (json) {
            $('#alert').addClass('alert-success').removeClass('hide').html('Successfully Registered')
            $('#register input').val('')
          }
        ).fail(
          function (xhr, status, errorThrown) {
            $('#alert').addClass('alert-danger').removeClass('hide').html('Failed to Register')
          }
        )
      }

    </script>
@endsection