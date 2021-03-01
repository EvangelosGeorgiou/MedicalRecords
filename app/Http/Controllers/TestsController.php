<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Patients;
use App\Tests;
use App\Http\Requests\TestsRequest;

class TestsController extends Controller
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
        return view('tests.create')->with('patients',$patients);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TestsRequest $request)
    {
        $test = Tests::create([
            'testName'  => $request->testName,
            'testReason'  => $request->testReason,
            'place'  => $request->place,
            'comments'  => $request->comments,
            'date'  => $request->date,
            'patient_id'  => $request->patient_id
        ]);

        session()->flash('success',"Test added successfully");

        return redirect(route('appointments-tests.show', $request->patient_id));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Tests $test)
    {
        $patients = Patients::find($test->patient_id);
        return view('tests.show')->with('test',$test)->with('patients',$patients);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Tests $test)
    {
        $patients = Patients::find($test->patient_id);
        return view('tests.create')->with('patients',$patients)->with('test', $test);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TestsRequest $request, Tests $test)
    {
        $data = $request->only(['testName','testReason','place','comments','date','patient_id' ]);

        $test->update($data);

        session()->flash('success','Test updated successfully');

        return redirect(route('appointments-tests.show', $request->patient_id));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tests $test)
    {
        $test->delete();
        session()->flash('success','Test deleted successfully');
        return redirect()->back();
    }
}
