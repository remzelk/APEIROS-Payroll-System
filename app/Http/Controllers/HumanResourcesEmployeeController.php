<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employees;

class HumanResourcesEmployeeController extends Controller
{
    public function index(Request $request)
    {
        $search = $request['search'] ?? "";
        if ($search != ""){
            $employee = Employees::where('Detachment', 'LIKE', "%$search%")
            ->orwhere('FirstName', 'LIKE', "%$search%")
            ->orwhere('LastName', 'LIKE', "%$search%")
            ->get();
        }
        else{
            $employee = Employees::all();
        }
        $data = compact('employee', 'search');
        return view('HumanResources.employeelist')->with($data);
    }

    public function create()
    {
        return view('HumanResources.addemployee');
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
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
