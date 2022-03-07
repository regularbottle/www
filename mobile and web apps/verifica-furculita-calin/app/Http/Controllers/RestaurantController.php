<?php

namespace App\Http\Controllers;

use App\Models\Restaurant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RestaurantController extends Controller
{
    public function readAll() {
        $restaurant = Restaurant::get();
        return response()->json($restaurant);
    }

    public function create(Request $request) {
        $validator = Validator::make($request->all(),[
            'name' => 'required|max:100',
            'vegan' => 'required|min:0|max:1|integer',
            'address' => 'required|max:255',
        ]);

        if($validator->fails()) {
            return response()->json([
                'messages' => $validator->errors()
            ], 400);
        }

        $restaurant = new Restaurant();
        $restaurant->name = $request->input('name');
        $restaurant->vegan = $request->input('vegan');
        $restaurant->address = $request->input('address');
        $restaurant->save();
        return response()->json($restaurant, 201);
    }

    public function delete($id) {
        $restaurant = Restaurant::findOrFail($id);
        $restaurant->delete();
        return response()->json(null, 204);
    }

    public function readSingle($id) {
        $restaurant = Restaurant::findOrFail($id);
        return response()->json($restaurant);
    }

    public function update(Request $request, $id) {
        $validator = Validator::make($request->all(),[
            'name' => 'required|max:100',
            'vegan' => 'required|min:0|max:1|integer',
            'address' => 'required|max:255',
        ]);

        if($validator->fails()) {
            return response()->json([
                'messages' => $validator->errors()
            ], 400);
        }

        $restaurant = Restaurant::findOrFail($id);
        $restaurant->name = $request->input('name');
        $restaurant->Vegan = $request->input('vegan');
        $restaurant->address = $request->input('address');
        $restaurant->save();
        return response()->json($restaurant);
    }
}
