<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    //GET http://localhost:8000/api/users
    public function readAll() {
        $users = User::get();
        return response()->json($users);
    }

    //POST http://localhost:8000/api/users
    public function create(Request $request) {
        $user = [
            'firstname' => $request->input('firstname')
        ];
        return response()->json($user, 201);
    }

    //GET http://localhost:8000/api/users/{id}
    // ad esempio GET http://localhost:8000/api/users/47
    public function readSingle($id) {
        $user = [
            'id' => $id,
            'firstname' => 'Demo'
        ];
        return response()->json($user);
    }

    public function delete($id) {
        return response('delete '.$id);
    }

    public function update($id) {
        return response('updated '.$id);
    }
}
