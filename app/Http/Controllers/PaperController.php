<?php

namespace App\Http\Controllers;

use App\Models\Paper;
use App\Models\Submission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PaperController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $paper = Paper::latest()->paginate(5);
        return view('paper.index', compact('paper'))
            ->with('i', (request()->input('page',1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('paper.create');
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
            'title' => 'required',
            'content' =>'required',
            'owner' => 'required',
        ]);

        $paper_id = DB::table('Papers')->insertGetId(
            [
                'title' => $request->string('title'),
                'content' => $request->string('content'),
                'paper_status' => "New",
            ]
        );

        $str_arr = explode (";", $request->string('owner'));
        //print_r($str_arr);

        foreach($str_arr AS $str) {
            DB::table('submissions')->insertGetId(
                [
                    'paper_pid' => $paper_id,
                    'user_id' => $str,
                ]
            );
        }

        //echo $log->string('id');
        return redirect()->route('paper.index')
            ->with('success','Article submitted successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Paper  $paper
     * @return \Illuminate\Http\Response
     */
    public function show(Paper $paper)
    {
        return view('paper.show',compact('paper'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Paper  $paper
     * @return \Illuminate\Http\Response
     */
    public function edit(Paper $paper)
    {
        return view('paper.edit',compact('paper'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Paper  $paper
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Paper $paper)
    {
        $request->validate([

        ]);

        $paper->update($request-> all());

        return redirect()->route('paper.index')
            ->with('success','Paper updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Paper  $paper
     * @return \Illuminate\Http\Response
     */
    public function destroy(Paper $paper)
    {
        $paper->delete();

        return redirect()->route('paper.index')
            ->with('success','Paper deleted successfully');
    }
}
