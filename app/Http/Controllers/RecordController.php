<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Record;
use Illuminate\Support\Facades\DB;

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
        $top_records = Record::where('user_id', auth()->id())->get()->sortByDesc('amount')->take(5);

        $top_categories = DB::table('records')
            ->join('categories', 'records.category_id', '=', 'categories.id')
            ->select('categories.name as category_name', DB::raw('SUM(records.amount) as total_amount'))
            ->where('records.user_id', auth()->id())
            ->groupBy('categories.id', 'categories.name')
            ->orderByDesc('total_amount')
            ->take(5)
            ->get();

        $most_active_categories = DB::table('records')
            ->join('categories', 'records.category_id', '=', 'categories.id')
            ->select('categories.name as category_name', DB::raw('COUNT(records.id) as record_count'))
            ->where('records.user_id', auth()->id())
            ->groupBy('categories.id', 'categories.name')
            ->orderByDesc('record_count')
            ->take(5)
            ->get();

        $top_records_this_month = Record::where('user_id', auth()->id())
            ->whereMonth('created_at', now()->month)
            ->orderByDesc('amount')
            ->take(5)
            ->get();


        $highest_spending_days = DB::table('records')
            ->select(DB::raw('DATE(date) as date'), DB::raw('SUM(amount) as total_amount'))
            ->where('user_id', auth()->id())
            ->groupBy(DB::raw('DATE(date)'))
            ->orderByDesc('total_amount')
            ->take(5)
            ->get();

        return view('record.statics', compact('top_records', 'top_categories', 'most_active_categories', 'top_records_this_month', 'highest_spending_days'));
    }
}
