<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
class SpeakerController extends Controller
{
    // Show the registration form
    public function showRegistrationForm()
    {
        return view('speaker.register'); // Ensure this view exists
    }

    // Handle the registration request
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
        ]);

        // Create the user
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // Create the speaker
        Speaker::create([
            'user_id' => $user->id,
            'name' => $request->name,
            'email' => $request->email,
        ]);

        // Log the user in
        auth()->login($user);

        // Redirect to the speaker dashboard
        return redirect()->route('speaker.dashboard')->with('success', 'Registration successful!');
    }


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