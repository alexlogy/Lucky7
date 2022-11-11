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

        $userJoin = DB::table('papers')
        ->join('bids','bids.paper_pid','=','papers.pid')
        ->where(['bids.isAwarded'=>TRUE, 'bids.user_id' => $user_id])
        ->get();

        foreach($userJoin as $userj)
        {
          print_r($userj);
        }

        print_r($user_id);
        print_r($user_limit);

        return view('review.index', compact('userJoin'), ['user_id'=>$user_id, 'user_limit_no'=>$user_limit])
            ->with('i', (request()->input('page',1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $user = auth()->user();
      return view('review.create', compact('user'));
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

        echo $request->string('paper_id');

        DB::table('reviews')->insert([
            'paper_pid' => $request->string('paper_id'),
            'user_id' => $request->string('user_id'),
            'paper_rating' => $request->string('paper_rating'),
            'review_status' => $request->string('review_status'),
            'review_rating' => $request->string('review_rating'),
            'created_at' => now(),
        ]);

        DB::table('papers')
            ->where('pid', '=', $request->string('paper_id'))
            ->update(['paper_status' => 'review']);

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

        print_r($review);
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

      //$review = $review[0];
      $review->paper_rating = $request->input('paper_rating');
      $review->review_status = $request->input('review_status');
      $review->review_rating = $request->input('review_rating');
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

      //$review->delete();

        return redirect()->route('review.index')
            ->with('success','Review deleted successfully');
    }

}
