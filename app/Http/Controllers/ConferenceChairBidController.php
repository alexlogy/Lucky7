<?php

namespace App\Http\Controllers;

use App\Models\Bid;
use App\Models\Paper;
use App\Models\User;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ConferenceChairBidController extends Controller
{
    public function index()
    {
      $user = auth()->user();

      // get bid id, paper title, paper content, reviewer's name and email
      $cc_bid = DB::table('bids as b')
                ->join('papers as p', 'b.paper_id', '=', 'p.pid')
                ->join('users as u', 'u.id', '=', 'b.user_id')
                ->select('b.bid as bid','p.title as title', 'p.content as content', 'u.name as name', 'u.email as email')
                ->where('b.isAwarded', '=', false)
                ->get();

      return view('cc_bid.index')->with(array('cc_bid'=>$cc_bid));
    }

    public function create()
    {
        return view('bid.create');
    }

    public function store(Request $request)
    {

        return redirect()->route('bid.index')
            ->with('success','Article submitted successfully.');
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
        // take id as input, update isAwarded in bids to TRUE
        DB::table('bids')
            ->where('bid', '=', $request->string('bid'))
            ->update(['isAwarded' => true]);

        return redirect()->route('cc_bid.index')
            ->with('success',
                'Bid for ' . $request->string('title') .
                ' awarded to ' . $request->string('reviewer').  ' successfully');
    }

    public function destroy(Bid $bid)
    {
        $bid->delete();

        return redirect()->route('bid.index')
            ->with('success','Bid deleted successfully');
    }
}
