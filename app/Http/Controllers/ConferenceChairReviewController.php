<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Models\Paper;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ConferenceChairReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $paper_reviewed = DB::table('papers as p')
                            ->get();

        return view('cc_review.index', compact('paper_reviewed'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $user = auth()->user();
      return view('cc_review.create', compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'paper_id' => 'required',
            'user_id' =>'required',
        ]);

        Review::create($request->all());

        return redirect()->route('cc_review.index')
            ->with('success','Review completed successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function show(Review $review)
    {
        return view('cc_review.show',compact('review'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function edit($rid)
    {
        $review = DB::table('reviews')
        ->where(['rid' => $rid])
        ->get();

        $review = $review[0];

        print_r($review);
        return view('cc_review.edit',compact('review'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $review = Review::find($request->get('rid'));

      //$review = $review[0];
      $review->paper_rating = $request->input('paper_rating');
      $review->review_status = $request->input('review_status');
      $review->review_rating = $request->input('review_rating');
      $review->save();

        return redirect()->route('cc_review.index')
            ->with('success','Review updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function destroy($review)
    {
      $r = Review::where('rid','=',$review);
      $r->delete();

      //$review->delete();

        return redirect()->route('cc_review.index')
            ->with('success','Review deleted successfully');
    }

    public function accept($id) {
        DB::table('papers')
            ->where('pid', '=', $id)
            ->update(['paper_status'=>"Accepted"]);

        return redirect()->route('cc_review.index')
            ->with('success','Paper status update to accepted successfully');
    }

    public function decline($id) {
        DB::table('papers')
            ->where('pid', '=', $id)
            ->update(['paper_status'=>"Rejected"]);

        return redirect()->route('cc_review.index')
            ->with('success','Paper status update to rejected successfully');
    }
}
