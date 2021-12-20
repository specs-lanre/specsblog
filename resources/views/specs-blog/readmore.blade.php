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
<span class="blogcontent">{{$i->content}}</span>

</p>
</span>


<hr width=50%>
comments
@foreach($coms as $c)
<h6>
Comments :{{$c->comment}}
</h6>
@endforeach


<a href="/postcomment/{{$i->id}}">
<span class="readmore">Post Comment 
<i class="fa fa-pencil-square"></i>
<i class="fa fa-pencil-square"></i>	
<i class="fa fa-pencil"></i>
</span>
</a>

</p>     
 @endforeach


</span>


</div></div>
@endsection