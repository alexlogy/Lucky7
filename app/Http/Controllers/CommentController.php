<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Models\Paper;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function index()
    {
        $comment = Comment::all();
        return view('comment.index', compact('comment'))
            ->with('i', (request()->input('page',1) - 1) * 5);
    }

    public function create()
    {
      return view('comment.create');
    }

    public function store(Request $request)
    {

        $user=auth()->user();
        $paper_id = $request->input('paper_id');
        $comment = $request->input('new_comment');

        Comment::create(['paper_id'=>$paper_id, 'user_id'=>$user->id, 'comment'=>$comment]);

        return redirect()->route('addComment', ['paper_id'=>$paper_id]);
    }

    public function show(Comment $comment)
    {
        return view('comment.show',compact('comment'));
    }

    public function edit(Comment $comment)
    {
        return view('comment.edit',compact('comment'));
    }

    public function update(Request $request, Comment $comment)
    {
        $request->validate([

        ]);

        $comment->update($request-> all());

        return redirect()->route('comment.index')
            ->with('success','Comment updated successfully');
    }

    public function destroy(Comment $comment)
    {
        $comment->delete();

        return redirect()->route('comment.index')
            ->with('success','Comment deleted successfully');
    }

    public function addComment(Request $request)
    {
      $user = auth()->user();
      $paperID = $request->input('paper_id');
      $paper = Paper::find($paperID);

      $reviews = Review::where('paper_pid', '=', $paperID)->get();
      $comments = Comment::where('paper_pid', '=', $paperID)->get();

      return view('comment.view', compact('paper', 'comments', 'reviews'));
    }
}
