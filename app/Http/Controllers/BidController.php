<?php

namespace App\Http\Controllers;

use App\Models\Bid;
use Illuminate\Http\Request;

class BidController extends Controller
{
    public function index()
    {
        $bid = Bid::latest()->paginate(5);
        return view('bid.index', compact('bid'))
            ->with('i', (request()->input('page',1) - 1) * 5);
    }

    public function create()
    {
        return view('bid.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'content' =>'required',
        ]);

        Bid::create($request->all());

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
