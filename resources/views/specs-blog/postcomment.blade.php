@extends('specs-blog.welcome')
@section('content')
<div align="center">
    <h2>Post comment here</h2>
    <form 
    method="post" 
    action="/doprocesscomment">
        
        <input type="hidden" name="topic_id"
        value={{$topic_id}} />
        {{ csrf_field() }}
        <div class="form-group">
            <label for="name">
            Posting as {{ Auth::user()->email }}
            </label>
           
        </div>

        <div class="form-group">
            <label for="comment">Comment</label>
            <textarea name="comment" rows=15 cols=40>
            </textarea>
        </div>

        <div class="form-group">
            <button style="cursor:pointer" 
            type="submit"
			class="btn btn-primary">
            Post comment</button>
        </div>
      
    </form>

</div>
@endsection