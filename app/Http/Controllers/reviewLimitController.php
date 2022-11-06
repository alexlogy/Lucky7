<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class reviewLimitController extends Controller
{
    
  public function __invoke(Request $request, $id)
  {
    $user = User::find($request->input('id'));

      $user->max_review_no = $request->input('max_review_no');
      $user->save();

        return redirect()->route('review.index')
            ->with('success','Limit updated successfully');
  }
}
