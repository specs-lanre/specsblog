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
<span class="blogauthor">Views: {{$i->views}}</span>
<p> <span class="blogcontent">{{$i->content}}</span></p>
</span>
<hr width=50%>

@endforeach
</span></div></div>


 <!-- jQuery lib -->
  <script type='text/javascript' src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>

  <!-- Action on the button with id=button and update the div with id=layer -->
  <script type="text/javascript">
   $(document).ready(function() {    
     $("#loadcomments").load('/showcomments-ajax/{{$topic_id}}');   
   });
   console.log("running code"+{{$topic_id}});
  </script>






<div align="center" 
style="height:300px;overflow:scroll;overflow-x: hidden;
text-align:center;"

id="loadcomments">....loading comments</div>
<div align="center">
    <h2>Post Comment</h2> 
<form >
<input type="hidden" name="topic_id"  
 value={{$topic_id}} />    
<div class="form-group">
<label for="name">
            Posting as
@if(Auth::user())
            {{ Auth::user()->email }}
        @else
            Guest
        @endif
            </label>
</div>

        <div class="form-group">
            <label for="comment">Comment</label><br>
            <textarea name="comment" rows=5 cols=40 id="comment" >
            </textarea>
        </div>

        <div class="form-group">
            <button style="cursor:pointer" 
            type="button" id="postbutton"
			class="btn btn-primary">
            Post comment</button>
        </div>
      <script>
$(function() {
  $("#postbutton").on("click",function(e) {
    e.preventDefault();
  var data = document.getElementById('comment').value
   var d = data.trim()  
//ajax load url

$.get('/postcomments-ajax/'+d+'/'+{{$topic_id}},
 function(data, status){
    console.log("Data: " + data + "\nStatus: " + status);
    });

setTimeout(Nikey,3500)
  function Nikey(){
  console.log("post submitted !");
  console.log("data :  "+data);  
  $("#loadcomments").load('/showcomments-ajax/{{$topic_id}}');
  }
  
  
  });
});
</script>
    </form>

</div>






@endsection