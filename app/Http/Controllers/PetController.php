<?php

namespace App\Http\Controllers;

use App\Contact;
use App\Pet;
use Illuminate\Http\Request;

class PetController extends Controller
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
    public function create(Request $request)
    {
        $contact = Contact::find($request->input('contact'));
        return view('pet.create', compact('contact'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $pet = new Pet();
        $contact = Contact::find($request->input('contact_id'))->get()->first();

        $pet->name = $request->input('name');
        $pet->sex = $request->input('sex') ? 'M' : 'F';
        $pet->desexed = $request->input('desexed') ? 'Y' : 'N';
        $pet->breed = $request->input('breed');
        $pet->age = $request->input('age');
        $pet->notes = $request->input('notes');
        $contact->pet()->save($pet);
        $request->session()->flash('message', 'success|Pet Created!');


        return redirect()->route('contacts.show', $contact);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Pet  $pet
     * @return \Illuminate\Http\Response
     */
    public function show(Pet $pet)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Pet  $pet
     * @return \Illuminate\Http\Response
     */
    public function edit(Pet $pet)
    {
        return view('pet.edit', compact('pet'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Pet  $pet
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pet $pet)
    {
        $pet->name = $request->input('name');
        $pet->sex = $request->input('sex') ? 'M' : 'F';
        $pet->desexed = $request->input('desexed') ? 'Y' : 'N';
        $pet->breed = $request->input('breed');
        $pet->age = $request->input('age');
        $pet->notes = $request->input('notes');
        $pet->save();
        $request->session()->flash('message', 'success|Pet Updated!');

        return redirect()->route('contacts.show', $pet->contact);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pet  $pet
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Pet $pet)
    {
        $pet->delete();
        $request->session()->flash('message', 'success|Pet Deleted!');

        return redirect()->route('contacts.show', $pet->contact);
    }
}
