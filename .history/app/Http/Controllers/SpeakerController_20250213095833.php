<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SpeakerController extends Controller
{

    // Show the login form
    public function showLoginForm()
    {
        return view('proposals.login'); // Ensure this view exists
    }


    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $user = Auth::user();
            if ($user->speaker) {
                $token = rand();//$user->createToken('SpeakerToken')->accessToken;
                return response()->json(['token' => $token], 200);
            } else {
                return response()->json(['error' => 'Unauthorized'], 401);
            }
        } else {
            return response()->json(['error' => 'Invalid credentials'], 401);
        }
    }

    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();
        return response()->json(['message' => 'Logged out successfully'], 200);
    }
}