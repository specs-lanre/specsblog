
<style>
.blogtopics{margin:10px;border:solid 1px lightgray;
font-size:24px;display:inline-block;width:70%;
padding:20px;text-align:center;}

.blogauthor,.blogdate{margin:5px;color: #2f72c5 ;
font-size:17px;display:inline-block;
padding:5px;text-align:center;}

</style>
<div align="center" >    
Read comments(**Login to edit comments)
@foreach($coms as $c)
<div style="color: #646970;padding:10px;width:80%">
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