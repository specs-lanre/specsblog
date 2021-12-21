@extends('specs-blog.welcome')
@section('content')
<div align="center">
<style>
.dlink{padding:10px;margin:11px 5px;
display:inline-block;width:40%;border-radius:11px; }
input{padding:10px;margin:11px 5px;
display:inline-block;width:60%;border-radius:11px; }
label{display:block;padding:15px;font-weight:bolder;}

</style>
    <h2>Delete Post </h2>

        @foreach($coms as $coms)

        <div class="form-group">
            <label for="topic">{{$coms->topic}}</label>
     
        </div>

        <div class="form-group">
            <label for="summary">Summary{{$coms->summary}}</label>
        
        </div>

        <div class="form-group">
         <p>
<img src="/images/{{$coms->imagepath}}" width=250px;/>
</p>
        </div>
        
        
        <div class="form-group">
            <label for="content">Content</label>
       
            {{$coms->content}} 
           
        </div>
        <a href="/confirmeletepost/{{$coms->id}}" class="dlink">
<span class="readmore">Confirm Delete Post</span>
</a>
      
        @endforeach
        

       
    </form>  <br>  <br>  <br>  <br>  <br>
</div>
@endsection