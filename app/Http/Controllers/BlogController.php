<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BlogController extends Controller
{
    //
    public function ViewallTopics(){
        return "View all topics";
    }
    public function ReadTopic(){
        return "Read selected  topics";
    }
    
     public function PostTopic(){
        return "Post a Topic";
    }
     public function ProcessPostTopic(){
        return "Process Post a Topic";
    }
     public function CommentonTopic(){
        return "Comment on  selected  topics";
    }
    
    
    
}
