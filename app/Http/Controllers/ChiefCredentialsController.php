<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Application;
use Illuminate\Auth\Events\PasswordReset;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class ChiefCredentialsController extends Controller
{
    public function index(Request $request)
    {
        $search = $request['search'] ?? "";
        if ($search != ""){
            $user = User::where('Name', 'LIKE', "%$search%")
            ->where('Position', 'LIKE', "5")
            ->get();
        }
        else{
            $user = User::where('Position', 'LIKE', "5")
            ->get();
        }
        $data = compact('user', 'search');
        return view('Admin.Credentials.Chief.index')->with($data);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $user = User::where('userno', $id)->firstOrFail();
        return view('Admin.Credentials.Chief.edit')->with('user', $user);
    }

    public function update(Request $request, $id)
    {
        
        $user = User::where('userno', $id)->firstOrFail();
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'position' => ['required', 'string', 'max:255']
        ]);
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->position = $request->input('position');
        $user->save();
        return redirect('/Admin/Credentials/Chief');
    }

    public function destroy($id)
    {
        $user = User::where('userno', $id)->firstOrFail();
        $user->delete();
        $application = Application::where('userno', $id)->firstOrFail();
        $application->delete();
        return redirect('/Admin/Credentials/Chief');
    }
}
