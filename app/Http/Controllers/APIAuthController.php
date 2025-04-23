<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class APIAuthController extends Controller
{
    use ApiResponse;

    public function register(Request $request){
        $validator = Validator::make($request->all(),[
           'name'=>'required',
           'email'=>'required',
           'password'=>'required|same:c_password'
        ]);
        if($validator->fails()){
            $errors = $validator->errors();
            return $this->sendError("Failure",$errors,Response::HTTP_INTERNAL_SERVER_ERROR);
        }
        $user = new User();
        $user->name=$request->name;
        $user->email=$request->email;
        $user->password = $request->password;
        $user->save();
        $success['token'] =  $user->createToken('MyApp')->plainTextToken;
        $success['name'] =  $user->name;
        return $this->sendResponse($success, "User registered successfully", Response::HTTP_CREATED);
    }

    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required',
            'password' => 'required'
        ]);
        if ($validator->fails()) {
            $errors = $validator->errors();
            return $this->sendError("Failure", $errors, Response::HTTP_INTERNAL_SERVER_ERROR);
        }
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $user = Auth::user();
            $success['token'] = $user->createToken('MyApp')->plainTextToken;
            $success['name'] = $user->name;
            return $this->sendResponse($success, "User logged successfully");
        }else{
            return $this->sendError("Incorrect Email/Password", [], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
