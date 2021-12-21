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
    <h2>Post comment here</h2>
    <form 
    method="post" 
    action="/doprocesseditcomment">
        
        <input type="hidden" name="topic_id"
        value={{$coms->topic_id}} />
        
         <input type="hidden" name="comment_id"
        value={{$coms->id}} />
        {{ csrf_field() }}
        <div class="form-group">
            <label for="name">
           Editing as {{ Auth::user()->email }}
            </label>
           
        </div>

        <div class="form-group">
            <label for="comment">Comment</label><br>
            <textarea name="comment" rows=8 cols=40>
            {{$coms->comment}}
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