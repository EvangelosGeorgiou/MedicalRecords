<?php

namespace App\Http\Controllers;
use App\Patients;
use App\Diet;
use App\Http\Requests\DietRequest;
use Illuminate\Http\Request;

class DietController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($patient_id)
    {
        $patients = Patients::find($patient_id);
        return view('diets.create')->with('patients', $patients);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DietRequest $request)
    {
        $diet = Diet::create([
            'description' => $request->description,
            'start_date' => $request->start_date,
            'finish_date' => $request->finish_date,
            'patient_id' => $request->patient_id
        ]);

        session()->flash('success',"Contact Information created successfully");

        return redirect(route('dhi.show', $request->patient_id));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Diet $diet)
    {
        $patients = Patients::find($diet->patient_id);
        return view('diets.create')->with('patients',$patients)->with('diets', $diet);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(DietRequest $request, Diet $diet)
    {
        $data = $request->only(['description', 'start_date', 'finish_date', 'patient_id' ]);

        $diet->update($data);

        session()->flash('success','Diet Information updated successfully');

        return redirect(route('dhi.show', $request->patient_id));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $dh = Diet::find($id);
        $dh->delete();
        session()->flash('success','Diet deleted successfully');
        return redirect()->back();
    }
}
