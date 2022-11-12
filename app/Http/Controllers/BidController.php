<?php

namespace App\Http\Controllers;

use App\Models\Bid;
use App\Models\Paper;
use App\Models\User;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BidController extends Controller
{
    public function index()
    {
      $user = auth()->user();

      //get list of papers that current reviewer has not bid on
      $toExclude = DB::table('papers')
        ->join('bids','bids.paper_id','=','papers.pid')
        ->select('paper_id')
        ->where('user_id', '=', $user->id)
        ->get();

      $eList = array();
      foreach($toExclude as $te)
      {
        foreach($te as $t)
        {
          $eList[] = $t;
        }
      }

      $paper = DB::table('papers')
        ->whereNotIn('pid', $eList)
        ->leftJoin('reviews','reviews.paper_id','=','papers.pid')
        ->get();

      return view('bid.index', compact('paper'), ['user_id'=>$user->id]);
    }

    public function create()
    {
        return view('bid.create');
    }

    public function store(Request $request)
    {
        $user = auth()->user();
        $rid = $user->id;
        $paper_id = $request->input('paper_id');
        if($request->input('bid_status')!==NULL)
        {
          Bid::create(['paper_pid'=>$paper_id, 'user_id'=>$rid, 'isAwarded'=>FALSE]);
        }

        return redirect()->route('bid.index')
            ->with('success','Bid submitted successfully.');
    }

    public function show(Bid $bid)
    {
        return view('bid.show',compact('bid'));
    }

    public function edit(Bid $bid)
    {
        return view('bid.edit',compact('bid'));
    }

    public function update(Request $request, Bid $bid)
    {
        $request->validate([

        ]);

        $bid->update($request-> all());

        return redirect()->route('bid.index')
            ->with('success','Bid updated successfully');
    }

    public function destroy(Bid $bid)
    {
        $bid->delete();

        return redirect()->route('bid.index')
            ->with('success','Bid deleted successfully');
    }
}
