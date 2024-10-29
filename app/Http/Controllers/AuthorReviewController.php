<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthorReviewController extends Controller
{
    public function show(Review $review)
    {
        $user = Auth::user();

        $course = Course::find($review->course_id);

        if (!$course){
            return redirect()->route('home')->with('error', 'Course not show successfully.');
        }

        if (!$user || $course->user_id!=$user->id){
            return redirect()->route('home')->with('error', 'Course not show successfully.');
        }

        return view('author.reviews.author-show-review', compact('review'));
    }
}
