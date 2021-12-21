@extends('specs-blog.welcome')
@section('content')
<div align="center">
<style>
button{padding:10px;margin:11px 5px;
display:inline-block;width:40%;border-radius:11px; }
input{padding:10px;margin:11px 5px;
display:inline-block;width:60%;border-radius:11px; }
label{display:block;padding:15px;font-weight:bolder;}

</style>
    <h2>Post Topic</h2>

    <form method="post" action="/processeditedposts" 
    enctype="multipart/form-data"
    >
        {{ csrf_field() }}
        @foreach($coms as $coms)
     <input id="" type="hidden" 
     name="post_id" value="{{$coms->id}}" >
        <div class="form-group">
            <label for="topic">Topic</label>
            <input type="text" 
            class="form-control"
			id="topic" name="topic" 
            value={{$coms->topic}}>
        </div>

        <div class="form-group">
            <label for="summary">Summary</label>
            <input type="summary" 
            class="form-control"
			id="summary" 
            name="summary" value="{{$coms->summary}}">
        </div>

current file:images/{{$coms->imagepath}}
        <div class="form-group">
            <label for="imagefile">Change Image</label>
            <input type="file" 
            class="form-control"
			id="imagefile" 
            name="imagefile">
        </div>
        
        
        <div class="form-group">
            <label for="content">Content</label>
            <textarea 
            class="form-control"
			id="content" 
            name="content"    cols=50 rows=10>
            {{$coms->content}} 
            </textarea>
        </div>
        
        @endforeach
        
        
        <div class="form-group">
            <button style="cursor:pointer" type="submit"
			class="btn btn-primary">Update Content</button>
        </div>
       
    </form>
</div>
@endsection