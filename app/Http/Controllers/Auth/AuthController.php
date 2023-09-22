<?php

namespace App\Http\Controllers\Auth;

use Exception;
use Rules\Password;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;

class AuthController extends Controller
{  
    //  private $apiToken;
    // public function __construct()
    //  {
    //  $this->apiToken = uniqid(base64_encode(Str::random(40)));
    //  }
    public function login(Request $request){
       try {
        //      //form validation
        // $this->validate($request, [
        //     'email' => 'required|max:255',
        //     'password' => 'required|min:6|max:255',
        // ]);
        // //login user
        // if(auth()->attempt([
        //     'email' => $request->email,
        //     'password' => $request->password
        // ])){
        //     //login success
        //     $user = User::where('email', $request->email)->first();
        //     $token = $user->createToken('simple_user')->plainTextToken;
        //     return response()->json([
        //         'success' => true,
        //         'user' => [
        //             'currentToken' => $token,
        //             'data' => $user
        //         ]
        //     ]);
        // }else{
        //     //login fail
        //     return response()->json([
        //         'success' => false,
        //         'message' => 'These credentials do not match any of our records.'
        //     ]);
        // }

        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $user = Auth::user();
            $token = $user->createToken('AuthToken')->accessToken;

            return response()->json(['token' => $token], 200);
        } else {
            return response()->json(['error' => 'Unauthorized'], 401);
        }
       } catch (Exception  $ex) {
                
        $message =$ex->getMessage();
        return response()->json($message);
        }
    }


   public function register(Request $request)
    {
        try {
            // $user = new User();
            // $user->name = $request->name;
            // $user->email = $request->email;
            // $user->password = Hash::make($request->password);
            // $user->role = "customer";
            // $user->save();

            // $success = true;
            // $message = "User register successfully";

            //     return response()->json(['message' => 'Registration successful'], 201);

            // $request->validate([
            //     'name' => 'required|string|max:255',
            //     'email' => 'required|string|email|max:255|unique:users',
            //     'password' => ['required'],
            // ]);
            // $user = User::create([
            //     'name' => $request->name,
            //     'email' => $request->email,
            //     'password' => Hash::make($request->password)
            // ]);
    
    
            // return response($user, Response::HTTP_CREATED);

             $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:6',
        ]);

        // if ($validator->fails()) {
        //     return response()->json(['errors' => $validator->errors()], 400);
        // }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'remember_token' => Str::random(60),
        ]);

        // $token = $user->createToken('AuthToken')->accessToken;

        //  return response()->json(['token' => $token], 201);

        } catch (Exception  $ex) {
                
                $message =$ex->getMessage();
                return response()->json($message);
        }
        
       
    }
  
    public function logout(){

        Auth::logout();
        return response()->json([
            'success' => true,
            'message' => 'Logged out successfully'
        ]);
    }
}
