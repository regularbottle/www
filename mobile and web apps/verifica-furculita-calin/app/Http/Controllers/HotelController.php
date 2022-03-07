<?php

namespace App\Http\Controllers;

use App\Models\Hotel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class HotelController extends Controller
{
    public function readAll() {
        $hotel = Hotel::get();
        return response()->json($hotel);
    }

    public function create(Request $request) {
        $validator = Validator::make($request->all(),[
            'name' => 'required|max:100',
            'stars' => 'required|min:1|max:5|integer',
            'address' => 'required|max:255',
        ]);

        if($validator->fails()) {
            return response()->json([
                'messages' => $validator->errors()
            ], 400);
        }

        $hotel = new Hotel();
        $hotel->name = $request->input('name');
        $hotel->stars = $request->input('stars');
        $hotel->address = $request->input('address');
        $hotel->save();
        return response()->json($hotel, 201);
    }

    public function delete($id) {
        $hotel = Hotel::findOrFail($id);
        $hotel->delete();
        return response()->json(null, 204);
    }

    public function readSingle($id) {
        $hotel = Hotel::findOrFail($id);
        return response()->json($hotel);
    }

    public function update(Request $request, $id) {
        $validator = Validator::make($request->all(),[
            'name' => 'required|max:100',
            'stars' => 'required|min:1|max:5|integer',
            'address' => 'required|max:255',
        ]);

        if($validator->fails()) {
            return response()->json([
                'messages' => $validator->errors()
            ], 400);
        }

        $hotel = Hotel::findOrFail($id);
        $hotel->name = $request->input('name');
        $hotel->stars = $request->input('stars');
        $hotel->address = $request->input('address');
        $hotel->save();
        return response()->json($hotel);
    }
}
