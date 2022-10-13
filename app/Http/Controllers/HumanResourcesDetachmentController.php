<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Detachments;

class HumanResourcesDetachmentController extends Controller
{
    public function index()
    {
        $search = $request['search'] ?? "";
        if ($search != ""){
            $detachment = Detachments::where('Detachment', 'LIKE', "%$search%")
            ->orwhere('Region', 'LIKE', "%$search%")
            ->orwhere('Location', 'LIKE', "%$search%")
            ->get();
        }
        else{
            $detachment = Detachments::all();
        }
        $data = compact('detachment', 'search');
        return view('HumanResources.Detachments.index')->with($data);
    }

    public function create()
    {
        return view('HumanResources.Detachments.add');
    }

    public function store(Request $request)
    {
        $detachment = new Detachment();
        $detachment->Detachment = request('Detachment');
        $detachment->Location = request('');
        $detachment->Region = request('');
        $detachment->Wage = (0);
        $detachment->save();
        return redirect('/HumanResources/Detachments');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $detachment = Detachments::findorfail($id);
        return view('HumanResources.Detachments.edit')->with('detachment', $detachment);
    }

    public function update(Request $request, $Id)
    {
        $detachment = Detachments::findorfail($Id);
        $detachment->Detachment = $request->input('Detachment');
        $detachment->Location = $request->input('Location');
        $detachment->Region = $request->input('Region');
        $detachment->Wage = $request->input('Wage');
        $wage->update();
        return redirect('/HumanResources/Detachments');
    }

    public function destroy($id)
    {
        $detachment = Detachments::findorfail($id);
        $detachment->delete();
        return redirect('/HumanResources/Detachments');
    }
}
