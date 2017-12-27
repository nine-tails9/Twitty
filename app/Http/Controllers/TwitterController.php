<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use \Twitter;
use \File;
class TwitterController extends Controller
{
    //
    private $count = 15;

    private $format = 'array';
    
    public function timeline(){

    	$data = Twitter::getUserTimeline(['count' => $this->count, 'format' => $this->format]);


    	return view('twitter', compact('data'));

    }

    public function tweet(Request $request){

    	$this->validate($request,[
    		'tweet' => 'required',
    	]);

    	$new = ['status' => $request->tweet];

    	$twitter = Twitter::postTweet($new);
    	return back();
    }
}
