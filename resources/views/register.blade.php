@extends('master')

@section('content')
    <br/>
    <div class="card">
        <h4 class="card-header">Register</h4>
        <div class="card-body">
            <form>
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name" placeholder="e.g. John Smith">
                </div>
                <div class="form-group">
                    <label for="name">Email</label>
                    <input type="email" class="form-control" id="email" placeholder="e.g. jsmith@gmail.com">
                </div>
                <div class="form-group">
                    <label for="name">Password</label>
                    <input type="password" class="form-control" id="password" name="password-confirmation">
                </div>
                <div class="form-group">
                    <label for="name">Confirm Password</label>
                    <input type="password" class="form-control" id="password-confirmation" name="password-confirmation">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
            <hr/>
            <a href="/redirect/google" class="btn btn-secondary">Register With Google</a>
            <a href="/redirect/github" class="btn btn-secondary">Register With GitHub</a>
        </div>
    </div>
@endsection