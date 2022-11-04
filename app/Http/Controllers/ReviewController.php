<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Models\Paper;
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
        $uname = $user->name;

        $userJoin = DB::table('users')
        ->join('reviews','reviews.user_id','=','users.id')
        ->join('papers','papers.id','=','reviews.paper_id')
        ->where(['users.id' => $user_id])
        ->get();

        foreach($userJoin as $userj)
        {
          print_r($userj);
        }

        //$reviews = Review::latest()->paginate(5);
    
        return view('review.index', compact('userJoin'))
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
    public function update(Request $request, $rid)
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
