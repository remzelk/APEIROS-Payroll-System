<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HumanResourcesController extends Controller
{
    public function index()
    {
    }

    public function create()
    {
    }

    public function store(Request $request)
    {
    }

    public function show($id)
    {
    }

    public function edit($id)
    {
    }

    public function update(Request $request, $id)
    {
    }

    public function destroy($id)
    {
    }

    public function login(){
        return view('HumanResources.login');
    }

    public function accountsettings()
    {
        return view('HumanResources.accountsettings');
    }
}
