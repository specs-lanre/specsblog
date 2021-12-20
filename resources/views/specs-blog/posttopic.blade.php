@extends('specs-blog.welcome')
@section('content')
<div align="center">
    <h2>Post Topic</h2>

    <form method="post" action="processposttopic" 
    enctype="multipart/form-data"
    >
        {{ csrf_field() }}
     
        <div class="form-group">
            <label for="topic">Topic</label>
            <input type="text" class="form-control"
			id="topic" name="topic">
        </div>

        <div class="form-group">
            <label for="summary">Summary</label>
            <input type="summary" 
            class="form-control"
			id="summary" 
            name="summary">
        </div>


        <div class="form-group">
            <label for="imagefile">Image</label>
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
            
            </textarea>
        </div>
        
        
        
        
        <div class="form-group">
            <button style="cursor:pointer" type="submit"
			class="btn btn-primary">Post Content</button>
        </div>
       
    </form>
</div>
@endsection