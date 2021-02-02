<?php

namespace App\Http\Controllers;

class SeriesController extends Controller
{
    public function index(){
        $series = [
            'Lost',
            'Agents of Shield',
            'Wandavision'
        ];

        return view('series.index', compact('series'));
    }

    public function create()
    {
        return view('series.create');
    }
}