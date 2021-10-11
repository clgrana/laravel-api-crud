<?php


namespace App\Http\Controllers;


use App\Models\Address;

class AddressController extends Controller
{
    /**
     * @return mixed
     * List addresses
     */
    public function index()
    {
        $addresses = Address::get();
        return response()->json($addresses, 200);
    }

    /**
     * @param $id
     * @return mixed
     * show an address
     */
    public function show($id)
    {
        $address = Address::findOrfail($id);
        $address = [
            'id' => $address->id,
            'address' => $address->address,
            'user' => $address->user,
            'city' => $address->city,
            'uf' => $address->uf,
            'created_at' => $address->created_at,
            'updated_at' => $address->updated_at
        ];
        return response()->json($address, 200);
    }
}
