<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Application;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class AccountingCredentialsController extends Controller
{
    public function index(Request $request)
    {
        $search = $request['search'] ?? "";
        if ($search != ""){
            $user = User::where('Name', 'LIKE', "%$search%")
            ->where('Position', 'LIKE', "3")
            ->get();
        }
        else{
            $user = User::where('Position', 'LIKE', "3")
            ->get();
        }
        $data = compact('user', 'search');
        return view('Admin.Credentials.Accounting.index')->with($data);
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
        return view('Admin.Credentials.Accounting.edit')->with('user', $user);
    }

    public function update(Request $request, $id)
    {
        
        $user = User::where('userno', $id)->firstOrFail();
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'position' => ['required', 'string', 'max:255'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->position = $request->input('position');
        $user->password = Hash::make($request->input('password'));
        $user->update();
        return redirect('/Admin/Credential/Accounting');
    }

    public function destroy($id)
    {
        $user = User::where('userno', $id)->firstOrFail();
        $user->delete();
        $application = Application::where('userno', $id)->firstOrFail();
        $application->delete();
        return redirect('/Admin/Credentials/Accounting');
    }
}
