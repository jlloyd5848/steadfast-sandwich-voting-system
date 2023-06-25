<?php

namespace App\Http\Controllers;

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vote;
// use Stevebauman\Location\Facades\Location;
// use Germania\IpstackClient\Ipstack;
use Adrianorosa\GeoLocation\GeoLocation;
use Torann\GeoIP\Facades\GeoIP;

class VoteController extends Controller
{
 
    
    public function submitVote(Request $request)
    {
        // Validate the request data
        $request->validate([
            'email' => 'required|email',
            'option_id' => 'required|integer',
    
        ]);

        $email = $request->input('email');
        $ipAddress = $request->ip();

        $ipAddress = $request->ip(); // Get the user's IP address
        // $estimatedLocation = Location::get($ipAddress);
        $location = GeoIP::getLocation($ipAddress);

        $estimatedLocation = $location->city;
      

        // Create a new vote
        $vote = new Vote();
        $vote->email = $email;
        $vote->option_id = $request->option_id;
        $vote->ip_address = $ipAddress;
        $vote->estimated_location = $estimatedLocation;
        $vote->save();

        // Queue the vote for processing
        dispatch(function () use ($vote) {
            // Perform any processing or additional actions here
            // For example, you can update vote counts or perform any other business logic
        })->onQueue('votes');



        return response()->json(['message' => 'Vote submitted successfully.']);
    }


}
