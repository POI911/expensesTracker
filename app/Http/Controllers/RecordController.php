<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Record;

class RecordController extends Controller
{
    public function index(Request $request)
    {
        if (isset($request->filter)) {
            $records = Record::where('user_id', auth()->id())->where('category_id', $request->filter)->get();
        } else {

            $records = Record::where('user_id', auth()->id())->get();
        }
        return view('record.index', compact('records'));
    }
    public function show(Record $record)
    {
        // $records = Record::where('user_id', auth()->id())->paginate(30);
        return view('record.index', compact('record'));
    }

    public function store(Request $request)
    {
        $record = new Record;

        $record->description = $request->description;
        $record->amount = $request->amount;
        $record->date = $request->date;
        $record->category_id = $request->category;
        $record->user_id = auth()->id();

        $record->save();

        return redirect()->route('records.index');
    }

    public function edit()
    {
    }

    public function update(Request $request, $record)
    {
        $record = Record::findOrFail($record);

        $record->description = $request->description;
        $record->amount = $request->amount;
        $record->date = $request->date;
        $record->category_id = $request->category;

        $record->save();

        return redirect()->route('records.index');
    }

    public function delete($id)
    {
        $record = Record::findOrFail($id);

        $record->delete();

        return redirect()->route('records.index');
    }

    public function statics()
    {
        return view('record.statics');
    }
}
