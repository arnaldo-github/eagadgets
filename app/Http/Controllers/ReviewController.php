<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Response;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function addReview(Request $request){
       $review = Review::where([
                        ['product_id', $request->product_id], 
                        ['user_id', auth()->user()->id]])->first();
        
        if (isset($review)) {
            $review->review = $request->review;
            $review->save();
            return Response::json("OK DOne");
        }
    
        $review = new Review();
        $review->review = $request->review;
        $review->product_id = $request->product_id;
        $review->user_id = auth()->user()->id;
        $review->save();

        return Response::json("OK DOne");
    }
}
