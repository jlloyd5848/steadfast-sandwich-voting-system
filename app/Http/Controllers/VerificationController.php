<?php

namespace App\Http\Controllers;

use App\Mail\VerifyEmailNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use App\Models\Vote;
use App\Models\User;
use Illuminate\Support\Facades\URL;
use App\Mail\VoteConfirmationMail;

class VerificationController extends Controller
{
    public function sendEmail(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
        ]);

       

        // Check if the user has already voted
        $email = $request->input('email');
        $existingVote = Vote::where('email', $email)->first();

        if ($existingVote) {
            return response()->json(['message' => 'You have already voted.'], 400);
        }

        // Create the user first
        $user = new User();
        $user->email = $email;
        $user->save();
    
        // Send email verification
        $verificationToken = $this->generateEmailVerificationToken($request->email);

        $this->verifyEmail($verificationToken,$request);

        // Save the verification code to the database for later validation

        return response()->json(['success' => true],200);
    }
    public function verifyEmail($token, $request)
    {
        Mail::to($request->email)->queue(new VoteConfirmationMail($token));
        // Mail::to($request->email)->send(new VoteConfirmationMail($token));
    }

    private function generateEmailVerificationToken($email)
    {
        // Create token
        $token = sha1($email . uniqid() . microtime()); 
         // Save the token in the User table, associating it with the user's email
        $user = User::where('email', $email)->first();
        $user->verification_token = $token;
        $user->save();

        return $token;
       
    }

    public function verifyCode(Request $request)
    {
        $request->validate([
            'code' => 'required',
        ]);

        $code = $request->input('code');

        // Try and find a user with that code
        $user = User::where('verification_token', $code)->first();

        if ($user) {
            // Mark the email as verified
            $user->email_verified_at = now();
            $user->verification_token = null;
            $user->save();

            return response()->json(['valid' => true]);
        } else {
            return response()->json(['valid' => false]);
        }
    }
}
