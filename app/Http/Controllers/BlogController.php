<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Blogentry;
use DB;
use Session;
use App\Models\User;
class BlogController extends Controller
{
    //
    public function ViewallTopics(){
    $info = DB::table('blogentries')->get();
    return view("specs-blog.viewalltopics")->with('info',$info);
    }
  
 

public function ReadMore(Request $request,$id){
       $info = DB::table('blogentries')->where('id',$id)->get();
       $coms = DB::table('comments')->where('topic_id',$id)->get();
       $data=['info'=>$info,'coms'=>$coms] ;     
        return view("specs-blog.readmore",$data );
           
        //return view("specs-blog.readmore")->with('info',$info);
    }
    public function ReadTopic(){
        return "Read selected  topics";
    }
    
    
 
     public function PostTopic(){         
        return view("specs-blog.posttopic");
    }
    
    
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
     'author'=>auth()->user()->email,
   ) ;
    DB::table('comments')->insert($data);
    Session::flash('message', 'Great Your comment was posted!');        
    return redirect ("bloghome");
   }    
    
     public function PostComment(Request $request,$topic_id)
     {  #return  $topic_id;
        $id= $topic_id;
        return view ("specs-blog.postcomment")->with("topic_id",$id);
    }
       
    
    
    
    
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
 
    
    
}
