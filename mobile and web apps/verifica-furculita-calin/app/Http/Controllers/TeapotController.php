<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TeapotController extends Controller
{
    public function readAll() {
        return response()->json([], 418);
    }
}
