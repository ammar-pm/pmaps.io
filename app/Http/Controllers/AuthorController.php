<?php

namespace App\Http\Controllers;

use App\Team;

class AuthorController extends Controller
{

    public function index() {
        $data = [];
        $data['records'] = Team::orderBy('name')->paginate(20);
        return view('authors.index', $data);
    }

    public function show($id) {
        $data = [];
        $data['record'] = Team::findOrFail($id);
        return view('authors.show', $data);
    }

}
