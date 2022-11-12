<?php

namespace App;

use Illuminate\Support\Facades\Auth;

class Helper {

    public static function prettyJson($inputArray, $statusCode) {
        return response()->json($inputArray, $statusCode, array('Content-Type' => 'application/json'), JSON_PRETTY_PRINT);
    }

    public static function updateDetailsToSessions(): void
    {
        // Set user details in session
        $user_details = array();
        $user_details['id'] = Auth::id();
        $user_details['user'] = Auth::user()->fresh();

        session()->put('user_details', $user_details);
    }
}
