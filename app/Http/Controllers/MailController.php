<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Mail;
use Illuminate\Http\Request;

class MailController extends Controller
{
    public function email($id) {
        $author = DB::table('submissions as s')
                ->join('users as u', 's.user_id','=','u.id')
                ->select('u.id as id', 'u.name as name', 'u.email as email', )
                ->where('s.paper_pid', '=', $id)
                ->get();


        foreach($author as $author) {
            $paper = DB::table('papers as p')
                    ->join('submissions as s', 'p.pid', '=', 's.paper_pid')
                    ->select('p.title as title', 'p.paper_status as paper_status')
                    ->where('s.user_id', '=', $author->id)
                    ->where('s.paper_pid', '=', $id)
                    ->get();
            $data = "";
            foreach($paper as $paper) {
                $data = array("name" => $author->name, "title" => $paper->title,"paper_status" => $paper->paper_status);
            }

            $a = Mail::send('mail', $data, function($message) use ($author){
                $message->to($author->email, $author->name)
                        ->subject('Your paper has been evaluated');
                        $message->from('CSIT314_Laravel@hotmail.com','Conference Chair');
            });
        }
        return redirect()->route('cc_review.index')
            ->with('success','Email triggered successfully');

    }
}
