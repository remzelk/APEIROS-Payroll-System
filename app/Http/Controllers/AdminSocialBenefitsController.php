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

class AdminSocialBenefitsController extends Controller
{
    public function index(Request $request)
    {
        $search = $request['search'] ?? "";
        if ($search != ""){
            $user = Application::orderBy('Name', 'ASC')
            ->where('Name', 'LIKE', "%$search%")
            ->get();
        }
        else{
            $user = Application::orderBy('Name', 'ASC')
            ->get();
        }
        $data = compact('user', 'search');
        return view('Admin.SocialBenefits.index')->with($data);
    }
}
