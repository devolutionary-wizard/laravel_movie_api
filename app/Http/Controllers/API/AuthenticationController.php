<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;


/**
 * @method sendResponse(array $success, string $string)
 * @method sendError(string $string, $errors)
 */
class AuthenticationController extends Controller
{
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(),
            ['name' => 'required',
                'email' => 'required|email',
                'password' => 'required',
                'c_password' => 'required|same:password',]
        );
        if ($validator->fails()) {
            return response()->json(['message' => 'Validation Error.', $validator->errors()]);
        }
        $input = $request->all();
        $input['password'] = bcrypt($input['password']);
        $user = User::create($input);
        $success['remember_token'] = $user->createToken('MyApp')->accessToken;
        $success['name'] = $user->name;

        return response()->json(['message' => 'User register successfully.', $success]);
    }

    public function login(Request $request)
    {
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $user = Auth::user();
            $success['remember_token'] = $user->createToken('MyApp')->accessToken;
            $success['name'] = $user->name;
            return response()->json(['message' => 'User login successfully.', $success]);
        } else {
            return response()->json(['message' => 'Unauthorised.']);
        }
    }
}
