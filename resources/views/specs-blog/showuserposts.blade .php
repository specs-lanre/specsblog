@extends('specs-blog.welcome')
@section('content')
<style>
.blogtopics{margin:10px;border:solid 1px lightgray;
font-size:24px;display:inline-block;width:70%;
padding:20px;text-align:center;}

.blogauthor,.blogdate{margin:5px;color: #2f72c5 ;
font-size:17px;display:inline-block;
padding:5px;text-align:center;}

.readmore{margin:5px;color:#fff;border-radius:20px;
font-size:20px;display:inline-block;
border:solid 1px #2f72c5;
padding:5px 15px;text-align:center;background:#2f72c5;}

.blogtopics a{text-decoration:none;}
</style>
<div align="center" >
    
<div align="center" style="width:80%;padding:25px 40px;">
    <h2></h2>
     @foreach($info as $i)
<p>
<span class="blogtopics">{{$i->topic}}

<br> <img src="/images/{{$i->imagepath}}"
 style="width:200px" />
<br>
<span class="blogauthor"> {{$i->author}}</span> 
<span class="blogdate">{{$i->created_at}}</span>

<p> 
</p>
</span>


<hr width=50%>
<p>
<a href="/editpost/{{$i->id}}">
<span class="readmore">Edit Post</span>
</a>

<a href="/deletepost/{{$i->id}}">
<span class="readmore">Delete Post</span>
</a>
</p>

@endforeach

</span>


</div>


Read comments(**Login to edit comments)

@foreach($coms as $c)
<div style="color: #646970;padding:10px;">
<i class="fa fa-comments"></i>

@if (Auth::check())

@if($c->author ==Auth::user()->email )	
<b><a href="/editcomment/{{$c->id}}">
<i class="fa fa-file"></i>edit comment</a></b>
@endif


@endif
 <br>Comment {{$c->comment}} ,by {{$c->author}} 
 on
 {{$c->created_at}}
</div>
@endforeach




</div>
@endsection