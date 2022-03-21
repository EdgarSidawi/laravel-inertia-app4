<?php

namespace App\Http\Controllers;

use App\Http\Requests\SportRequest;
use App\Models\Sport;
use Illuminate\Http\Request;
use Inertia\Inertia;

class SportController extends Controller
{
    public function index()
    {
        $sports = Sport::all();

        return Inertia('Welcome', ['sports' => $sports]);
    }

    public function create(SportRequest $request)
    {
        $sport = new Sport();
        $sport->name = $request->name;
        $sport->save();

        return redirect('/');
    }
}
