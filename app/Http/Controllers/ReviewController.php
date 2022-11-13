<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Models\Paper;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = auth()->user();
        $user_id = $user->id;
        $user_limit = $user->max_review_no;
        $uname = $user->name;

        //Find papers that have been reviewed
        $reviewed_papers = DB::table('reviews')->get();
        $reviewed_paper_ID = array();
        foreach($reviewed_papers as $rp)
        {
          $reviewed_paper_ID[]=$rp->paper_pid;
        }

        //get papers that have not been reviewed yet to be displayed to user
        $userJoin = DB::table('papers')
        ->join('bids','bids.paper_pid','=','papers.pid')
        ->where(['bids.isAwarded'=>TRUE, 'bids.user_id' => $user_id])
        ->whereNotIn('bids.paper_pid', $reviewed_paper_ID)
        ->get();

        return view('review.index', compact('userJoin'), ['user_id'=>$user_id, 'user_limit_no'=>$user_limit])
            ->with('i', (request()->input('page',1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
      $user = auth()->user();
      $pid = $request->input('paper_id');
      return view('review.create', compact('user'), ['pid'=>$pid]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        Review::create($request->all());

        return redirect()->route('review.index')
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
        return view('review.show',compact('review'));
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

        return view('review.edit',compact('review'));
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

      $review->paper_rating = $request->input('paper_rating');
      $review->review_status = $request->input('review_status');
      $review->save();

        return redirect()->route('review.index')
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

      $user = auth()->user();
      $reviews = Review::where('user_id','=',$user->id)->get();


      return view('review.view', compact('reviews'))
            ->with('success','Review deleted successfully');
    }

    /**
     * Show table of reviews for user to edit or delete
     *
     * @param  \App\Models\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function viewReviews()
    {
      $user = auth()->user();
      $reviews = Review::where('user_id','=',$user->id)->get();

        return view('review.view', compact('reviews'))
            ->with('success','List successful');
    }

}
