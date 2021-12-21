@extends('specs-blog.welcome')
@section('content')
<style>
button{padding:10px;margin:11px 5px;
display:inline-block;width:40%;border-radius:11px; }
input{padding:10px;margin:11px 5px;
display:inline-block;width:60%;border-radius:11px; }
label{display:block;padding:15px;font-weight:bolder;}
.xlink{padding:10px;margin:11px 15px;
background:#FF0000;color:#fff;
display:inline-block;width:40%;border-radius:11px;}
</style>
<div align="center">
    <h2>Confrim Delete ?</h2>
    
        <br />
        
         <span style="display:inline-block;padding:25px;
         margin:11px;" />
     {{$coms->comment}} 
        </span>
        <p>
        <a href="confirmdelete/{{$coms->id}}"  class="xlink">
        Go ahead and delete
        </a>
        
         <a href="/bloghome" class="xlink">
        Ignore 
        </a>
        
        
        </div>



</div>
@endsection