@extends('specs-blog.welcome')
@section('content')

<style>
button{padding:10px;margin:11px 5px;
display:inline-block;width:40%;border-radius:11px; }
input{padding:10px;margin:11px 5px;
display:inline-block;width:60%;border-radius:11px; }
label{display:block;padding:15px;font-weight:bolder;}
</style>

<div align="center">
    <h2>Register</h2>
    <form method="post" 
    action="doregisteruser">
        
        
        {{ csrf_field() }}
        <div class="form-group">
            <label for="name">Name(s):</label>
            <input type="text" class="form-control"
			id="name" name="name">
        </div>

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
			class="btn btn-primary">Submit</button>
        </div>
      
    </form>

</div>
@endsection