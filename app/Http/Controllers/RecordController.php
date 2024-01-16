<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Record;

class RecordController extends Controller
{
    public function index(){
        $records = Record::all();

    }

    public function store(Request $request){

    }

    public function edit(){

    }

    public function update(){

    }

    public function delete(){

    }
}
