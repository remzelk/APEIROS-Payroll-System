<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Detachments;

class AccountingWageController extends Controller
{
    public function index(Request $request)
    {
        $search = $request['search'] ?? "";
        if ($search != ""){
            $wage = Detachments::where('Detachment', 'LIKE', "%$search%")
            ->orwhere('Region', 'LIKE', "%$search%")
            ->orwhere('Location', 'LIKE', "%$search%")
            ->get();
        }
        else{
            $wage = Detachments::all();
        }
        $data = compact('wage', 'search');
        return view('Accounting.wages')->with($data);
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
        $wage = Detachments::findorfail($id);
        return view('Accounting.editwage')->with('wage', $wage);   
    }

    public function update(Request $request, $Id)
    {
        $wage = Detachments::findorfail($Id);
        $wage->Detachment = $request->input('Detachment');
        $wage->Location = $request->input('Location');
        $wage->Region = $request->input('Region');
        $wage->Wage = $request->input('Wage');
        $wage->update();
        return redirect('/Accounting/Wages');
    }

    public function destroy($id)
    {
        $wage = Detachments::findorfail($id);
        $wage->delete();
        return redirect('/Accounting/Wages');
    }
}
