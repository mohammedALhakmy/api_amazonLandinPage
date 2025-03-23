<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddressOptionsAddressRequest;
use App\Models\Address;
use Illuminate\Http\Request;
use Inertia\Inertia;

class AddressOptionsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $auth = auth()->user()->id;
            if($auth){
                return Inertia::render('Address/Add',[
                    'address_auth' => Address::where('user_id',$auth)->first()
                ]);
            }
                return Inertia::render('Address/Add');
    }

    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AddressOptionsAddressRequest $request)
    {
        try {
            $address = new Address;
            $address->country = $request->country;
            $address->addr1 = $request->addr1;
            $address->addr2 = $request->addr2;
            $address->city = $request->city;
            $address->postcode = $request->postcode;
            $address->user_id = auth()->user()->id;
            $address->save();

            return Inertia::location(route('address.index'));
        }catch (\Exception $exception) {

        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            $address =  Address::find($id);
            $address->delete();

            return redirect(route('address.index'));
        }catch (\Exception $exception) {

        }
    }
}
