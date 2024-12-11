<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        return User::get();
    }

    public function store(Request $request)
    {
        $dados = $request->all();
        $user = User::create($dados);

        return response()->json($user);        
    }

    public function show(int $id)
    {
        $user = User::findOrFail($id);

        return response()->json($user);
    }
}
