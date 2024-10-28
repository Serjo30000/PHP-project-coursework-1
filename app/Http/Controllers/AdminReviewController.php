<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;

class AdminReviewController extends Controller
{
    public function index()
    {
        $reviews = Review::paginate(10);

        return view('admin.reviews.admin-reviews', compact('reviews'));
    }

    public function show(Review $review)
    {
        return view('admin.reviews.admin-show-review', compact('review'));
    }

    public function destroy(Review $review)
    {
        $review->delete();
        return redirect()->route('admin.reviews.index')->with('success', 'Review deleted successfully.');
    }
}
