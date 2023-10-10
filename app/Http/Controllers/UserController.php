<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Controllers\Controller;
use App\Http\Requests\SigninRequest;
use App\Http\Requests\SignupRequest;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $query = User::query();

        $data = $query->get();

        return response()->json($data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserRequest $request)
    {
        $input = $request->all();

        User::create($input);

        $message = "User created successfully!";

        return response()->json([
            'message' => $message
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        return response()->json($user);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        $input = $request->all();

        $user->update($input);

        $message = "User updated successfully!";

        return response()->json([
            'message' => $message
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();

        $message = "User deleted successfully!";

        return response()->json([
            'message' => $message
        ], 200);
    }

    public function signup(SignupRequest $request)
    {
        $input = $request->all();

        if (isset($input['password']) && $input['password']) {
            $input['password'] = Hash::make($input['password']);
        } else {
            $input['password'] = Hash::make(Str::random(10));
        }

        User::create($input);

        $message = "User registered successfully!";

        return response()->json([
            'message' => $message
        ], 200);
    }

    public function signin(SigninRequest $request)
    {
        $user = User::where('email', $request['email'])->first();

        if ($user) {

            if (!Hash::check(request()->password, $user->password)) {
                $message = __('response.errors.invalid_username_password');
                return response()->notFound($message);
            }
          
            $response['accessToken'] = $user->createToken('userToken')->plainTextToken;
            $response['message'] = 'Login Successfully';
          
            $response['user'] = $user;
            return response()->json($response);
        } else {
            $response['message'] = 'error';
            return response()->json($response,400);
        }
    }
}
