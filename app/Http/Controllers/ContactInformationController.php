<?php

namespace App\Http\Controllers;

use App\Patients;
use App\ContactInformation;
use Illuminate\Http\Request;
use App\Http\Requests\CreateContactInfoRequest;
class ContactInformationController extends Controller
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
    public function create($patients_id)
    {
        $patients = Patients::find($patients_id);
        return view('contactInformation.create')->with('patients',$patients);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateContactInfoRequest $request)
    {
        $contact = ContactInformation::create([
            'country' => $request->country,
            'city' => $request->city,
            'address' => $request->address,
            'postal_code' => $request->postal_code,
            'patient_id' => $request->patient_id
        ]);

        session()->flash('success',"Contact Information created successfully");

        return redirect(route('patient-info.show', $request->patient_id));
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
    public function edit(ContactInformation $contact)
    {
        $patients = Patients::find($contact->patient_id);
        return view('contactInformation.create')->with('contacts',$contact)->with('patients',$patients);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CreateContactInfoRequest $request, ContactInformation $contact)
    {
        $data = $request->only(['country','city','address','postal_code','patient_id']);

        $contact->update($data);

        session()->flash('success','Contact Information updated successfully');

        return redirect(route('patient-info.show', $request->patient_id));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
