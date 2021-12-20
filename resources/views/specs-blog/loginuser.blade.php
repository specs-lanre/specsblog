@extends('specs-blog.welcome')
@section('content')
<div align="center">
    <h2>Login</h2>
    <form method="POST" action="/registeruser">
        {{ csrf_field() }}
     
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" class="form-control"
			id="email" name="email">
        </div>

        <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" class="form-control"
			id="password" name="password">
        </div>

        <div class="form-group">
            <button style="cursor:pointer" type="submit"
			class="btn btn-primary">Login</button>
        </div>
       
    </form>
</div>
@endsection