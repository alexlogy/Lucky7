<?php

namespace App\Http\Controllers;

use App\Models\Submission;
use Illuminate\Http\Request;

class SubmissionController extends Controller
{
    public function index()
    {
        $submission = Submission::latest()->paginate(5);
        return view('submission.index', compact('submission'))
            ->with('i', (request()->input('page',1) - 1) * 5);
    }

    public function create()
    {
        return view('submission.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'paper_id' => 'required',
            'author_id' =>'required',
        ]);

        Submission::create($request->all());

        return redirect()->route('submission.index')
            ->with('success','Article submitted successfully.');
    }

    public function show(Submission $submission)
    {
        return view('submission.show',compact('submission'));
    }

    public function edit(Submission $submission)
    {
        return view('submission.edit',compact('submission'));
    }

    public function update(Request $request, Submission $submission)
    {
        $request->validate([

        ]);

        $submission->update($request-> all());

        return redirect()->route('submission.index')
            ->with('success','Submission updated successfully');
    }

    public function destroy(Submission $submission)
    {
        $submission->delete();

        return redirect()->route('submission.index')
            ->with('success','Submission deleted successfully');
    }
}
