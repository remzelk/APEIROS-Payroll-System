<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Detachments;

class AdminDetachmentController extends Controller
{
    public function index(Request $request)
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
        return view('Admin.Detachments.index')->with($data);
    }

    public function create()
    {
        return view('Admin.Detachments.add');
    }

    public function store(Request $request)
    {
        $detachment = new Detachments();
        $detachment->Detachment = request('Detachment');
        $detachment->Location = request('Location');
        $detachment->Region = request('Region');
        $detachment->save();
        return redirect('/Admin/Detachments');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $detachment = Detachments::findorfail($id);
        return view('Admin.Detachments.edit')->with('detachment', $detachment);
    }

    public function update(Request $request, $Id)
    {
        $detachment = Detachments::findorfail($Id);
        $detachment->Detachment = $request->input('Detachment');
        $detachment->Location = $request->input('Location');
        $detachment->Region = $request->input('Region');
        $detachment->Wage = $request->input('Wage');
        $detachment->update();
        return redirect('/Admin/Detachments');
    }

    public function destroy($id)
    {
        $detachment = Detachments::findorfail($id);
        $detachment->delete();
        return redirect('/Admin/Detachments');
    }
}
