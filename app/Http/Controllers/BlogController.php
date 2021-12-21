<?php

namespace App\Http\Controllers;
use SendinBlue;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Blogentry;
use DB;
use Session;
use App\Models\User; 
use Illuminate\Support\Facades\Mail;
   //custom function to always return check or get
   //user instance 
    function ifuser(){
     $user = auth()->user();
    if ($user == null ){return "Guest";}
    if ($user != null ){return $user->email;}    
    }
    
    
class BlogController extends Controller
{

    public function ViewallTopics(){
    $info = DB::table('blogentries')->simplePaginate(4);
    return view("specs-blog.viewalltopics")->with('info',$info);
    }
  
 

public function ReadMore(Request $request,$id){
    $msg=array('name'=>"MrOlanre",);
    Mail::send('email.test',$msg, function($message){
     $message->from('webapp@yahoo.com',"Olanre") ;    
     $message->to("secure.usertech@protonmail.com");
     $message->subject("Hello !. Some on viewed your post");
    });
   
       $info = DB::table('blogentries')->where('id',$id)->get();
       $coms = DB::table('comments')->where('topic_id',$id)->get();
       $data=['info'=>$info,'coms'=>$coms];     
        return view("specs-blog.readmore",$data );
           
        //return view("specs-blog.readmore")->with('info',$info);
    }
 //readmore with Ajax   
public function ReadMore_Ajax(Request $request,$id){
       
       $inx=DB::table('blogentries')->find($id);
       $x=$inx->views;
       
       DB::table('blogentries')->where('id',$id)->update(['views'=>$x+1]);
       
       $info=DB::table('blogentries')->where('id',$id)->get();
       $coms = DB::table('comments')->where('topic_id',$id)->get();
       $data=['info'=>$info,'coms'=>$coms,'topic_id'=>$id] ;     
        return view("specs-blog.readmore_ajax",$data );
           

    }
    
    
 //post comments with ajax   
public function PostComments_Ajax(Request $request,$data,$id){
     
            
    $topic_id = $id;
    $comment = $data;
    
    $data=array(
    'topic_id'=>$topic_id,    
    'comment'=>$comment,
     'author'=>ifuser(),
   ) ;
    DB::table('comments')->insert($data);
    return "okay";
       

    }
    
    
 //show comments with ajax   
public function ShowComments_Ajax(Request $request,$id){
       
       $coms = DB::table('comments')->where('topic_id',$id)->get();
       $data=['coms'=>$coms,'topic_id'=>$id] ;     
        return view("specs-blog.showcomments_ajax",$data );
           

    }
    
    public function ReadTopic(){
        return "Read selected  topics";
    }
    
    
 
   //PROCESS THE POSTED COMMENT 
   public function ProcessComment(Request $request){
            $validatedData = $request->validate([
            'topic_id' => 'required',
            'comment' => 'required',
      
        ]);
    $topic_id = $request->input('topic_id');
    $comment = $request->input('comment');
    
    $data=array(
    'topic_id'=>$topic_id,    
    'comment'=>$comment,
     'author'=>ifuser(),
   ) ;
    DB::table('comments')->insert($data);
    Session::flash('message', 'Great Your comment was posted!');        
    return redirect ("bloghome");
   }    
 //DISPLAY THE COMMENTFORM   
     public function PostComment(Request $request,$topic_id)
     {  #return  $topic_id;
        $id= $topic_id;
        return view ("specs-blog.postcomment")->with("topic_id",$id);
    }
       
  //DISPLAY THE EDIT COMMENT FORM WITH CONTENTS  
     public function EditCommentForm(Request $request,$id)
     {  $coms = DB::table('comments')->where('topic_id',$id)->get();
       $data=['coms'=>$coms] ;
        $id= $topic_id;
        return view ("specs-blog.editcomment")->with("coms",$coms);
    }
  //PROCESS THE EDIT POSTED COMMENT 
   public function ProcessEditComment(Request $request){
            $validatedData = $request->validate([
            'topic_id' => 'required',
            'comment_id' => 'required',
            'comment' => 'required',
      
        ]);
    $topic_id = $request->input('topic_id');
    $comment_id = $request->input('comment_id');
    $comment = $request->input('comment');    
    $data=array(
    'topic_id'=>$topic_id,    
    'comment'=>$comment,
     'author'=>auth()->user()->email,
   ) ;
    $d = DB::table('comments')
    ->where('id',$comment_id)
    ->update(["comment"=>$comment]);
    Session::flash('message', 'Great Your comment was updated!');        
    return redirect ("bloghome");
   }       
       
 //DISPLAY THE DELETE COMMENT PAGE WITH CONTENTS  
     public function DeleteComment(Request $request,$id)
     {  $coms = DB::table('comments')->where('id',$id)->get();
       $data=['coms'=>$coms] ;
        $id= $topic_id;
        return view ("specs-blog.deletecomment")->with("coms",$coms);
    }

 //CONFIRM THE DELETE COMMENT  
     public function ConfirmDeleteComment(Request $request,$id)
     {  $coms = DB::table('comments')->where('id',$id)->get();
       $coms->delete();
        Session::flash('message', 'Great Your comment  was deleted!');        
    
        return redirect ("/bloghome");
    }

  ///================================================= 
  
  //DISPLAY FORM TO POST TOPIC 
     public function PostTopic(){         
        return view("specs-blog.posttopic");
    }
   
   
 //PROCESS THE POSTED TOPICS   
    
     public function ProcessPostTopic(Request $request){
            $validatedData = $request->validate([
            'topic' => 'required',
            'summary' => 'required',
         'imagefile' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
          'content' => 'required',
        ]);
    $name = $request->file('imagefile')->getClientOriginalName(); 
    $path = $request->file('imagefile')->store('public/images');
    
    $filename = "specs-blog-image".time() . '.' . $request->imagefile->extension();
    $request->imagefile->move(public_path('images'), $filename);
    $topic = $request->input('topic');
    $summary = $request->input('summary');
    $content = $request->input('content');
    
    
    $data=array(
    'topic'=>$topic,
    'summary'=>$summary,
    'content'=>$content,
     'author'=>auth()->user()->email,
    'imagepath'=>$filename) ;
    DB::table('blogentries')->insert($data);
    Session::flash('message', 'Great Your article was posted!');        
    return redirect ("bloghome");
    //return view("specs-blog.viewtopicsbylist");
    }
 
  //DISPLAY THE POSTS BY THIS user_error//SO THAT HE AN EDIT OR DELETE 
     public function EditUserPosts(Request $request)
     {  
       if(!Auth::user())
       {
Session::flash('message', 'Sorry you have to login to view this resource !');        
return redirect("/userlogin");
      }
     
       $coms = DB::table('blogentries')->where('author',Auth::user()->email )->get();
       $data=['coms'=>$coms] ;      
        return view ("specs-blog.showposts_foredit")->with("coms",$coms);
    }


  //DISPLAY THE EDIT COMMENT FORM WITH CONTENTS  
     public function EditPostForm(Request $request,$id)
     {  $coms = DB::table('blogentries')->where('id',$id)->get();
       $data=['coms'=>$coms] ;
      
        return view ("specs-blog.edit_post")->with("coms",$coms);
    }
  //PROCESS THE EDIT POSTED COMMENT 
   public function ProcessEditPost(Request $request){
            $validatedData = $request->validate([
            'post_id' => 'required',
            'summary' => 'required',
            'imagefile' => 'required',
          'content' => 'required',
        ]);
        
    $name = $request->file('imagefile')->getClientOriginalName(); 
    $path = $request->file('imagefile')->store('public/images');    
    $filename = "updated-specs-blog-image".time() . '.' . $request->imagefile->extension();
    $request->imagefile->move(public_path('images'), $filename);
        
    $post_id = $request->input('post_id');
    $summary = $request->input('summary');
    $content = $request->input('content');
    $topic = $request->input('topic');    

    $d = DB::table('blogentries')
    ->where('id',$post_id)
    ->update([ 
    "summary" => $summary,
   "content" => $content,   
   "topic" => $topic,'imagepath'=>$filename]);
    Session::flash('message', 'Great Your posts was updated!');        
    return redirect ("bloghome");
   }       
       
 //DISPLAY THE DELETE Post PAGE WITH CONTENTS  
     public function DeletePost(Request $request,$id)
     {  $coms = DB::table('blogentries')->where('id',$id)->get();
       $data=['coms'=>$coms] ;        
        return view ("specs-blog.deletepost")->with("coms",$coms);
    }

 //CONFIRM THE DELETE POST  
     public function ConfirmDeletePost(Request $request,$id)
     {  $coms = DB::table('blogentries')->where('id',$id)->delete();
        
        Session::flash('message', 'Your delete action was successful!');        
    
        return redirect ("/bloghome");
    }




    
    
}//END THE CLASS
