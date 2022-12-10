<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth, Hash, Session;
use App\Models\User;

class AdminChangeNameController extends Controller
{
    public function index(Request $request)
    {
        return view('Admin.changename');
    }

    public function update(Request $request, $id)
    {
        $user = User::where('userno', $id)->firstOrFail();
        $request->validate([
            'name' => ['required', 'string', 'max:255']
        ]);
        $user->name = $request->input('name');
        $user->save();
        return back()->with('success', 'Name successfully changed!');
    }
}
