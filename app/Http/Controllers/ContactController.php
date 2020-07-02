<?php

namespace App\Http\Controllers;

use App\Contact;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Symfony\Component\HttpFoundation\Response;
     */
    public function index() : Response
    {
        return response()->json(Contact::all(), 200);
    }

    /**
     * Show the form for creating a new contact.
     *
     * @return Symfony\Component\HttpFoundation\Response;
     */
    public function store(Request $request) : Response
    {
        $data = $request->validate([
            'name' => 'required',
            'phonenumber' => 'required|unique:App\Contact'
        ]);

        $result = $request
            ->user()
            ->contacts()
            ->create([
                'phonenumber' => $request->phonenumber,
                'name' => $request->name
            ])
        ;
        
        if (!$result) {
            return response()->json('failed to make contact please try again' , 404);
        }

        return response()->json('Succesfully created contact', 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Contact  $contact
     * @return Symfony\Component\HttpFoundation\Response;
     */
    public function update(Request $request, Contact $contact)
    {   
        $data = [];
        
        if($request->has('name')) {
            $data['name'] = 'required';
        }

        if($request->has('phonenumber')) {
            $data['phonenumber'] = 'required|unique:App\Contact';
        }

        $request->validate($data);

        if($request->has('name')) {
            $contact->name = $request->input('name');
        }

        if($request->has('phonenumber')) {
            $contact->phonenumber = $request->input('phonenumber');
        }

        if($request->has('name') || $request->has('phonenumber')) {
            $contact->save();
            return response()->json('Succesfully updated contact', 200);   
        }
        
        return response()->json('pleased check either name or contact phone number entered' , 404);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Contact  $contact
     * @return Symfony\Component\HttpFoundation\Response;
     */
    public function destroy(Request $request, Contact $contact)
    {
        $request->validate([
            'phonenumber' => 'required'
        ]);

        $contact->delete();

        return response()->json('Succesfully deleted contact', 200);   
    }
}
