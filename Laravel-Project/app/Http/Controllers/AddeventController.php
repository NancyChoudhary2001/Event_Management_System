<?php

namespace App\Http\Controllers;
use App\Models\Currency;
use App\Models\Event;
use Yajra\DataTables\DataTables;

use Illuminate\Http\Request;

class AddeventController extends Controller
{
    public function getCountries()
    {
        $currencies = Currency::all();
        return view('admin.add-event', compact('currencies'));
    }
    public function addevent(Request $request)
{
   
    $request->validate([
        'name' => 'required|string|unique:events,name',
        'description' => 'required|string',
        'role' => 'required|string|in:admin,user', 
        'currency' => 'required|exists:currencies,id',
        'price' => 'required|numeric|min:0', 
    ]);

   
    $event = Event::create([
        'name' => $request->name,
        'description' => $request->description,
        'role' => $request->role,
        'currency_id' => $request->currency, 
        'price' => $request->price, 
    ]);

    
    return response()->json([
        'status' => true,
        'message' => 'Event added successfully.',
        'event' => $event,
    ], 200);
}

public function getEvents(Request $request)
{
    if ($request->ajax()) {
        $data = Event::select('id', 'name', 'description', 'price');
        return DataTables::of($data)
            ->addColumn('action', function ($row) {
                return '
                    <a href="/events/edit/' . $row->name . '" class="btn btn-sm btn-primary">Edit</a>
                    <button type="button" class="btn btn-sm btn-danger delete-btn" data-id="' . $row->name . '">Delete</button>
                ';
            })
            ->rawColumns(['action']) 
            ->make(true);
    }
    
    
    return view('admin.events'); 
}
public function destroy($name)
{
    $event = Event::where('name', $name)->firstOrFail();
    $event->delete();

    return response()->json([
        'status' => true,
        'message' => 'Event deleted successfully!'
    ]);
}

public function edit($name)
{
    
    $event = Event::where('name', $name)->firstOrFail();
    //dd($event->role);

    $currencies = Currency::all();
    return view('admin.edit-event', compact('event', 'currencies')); 
}


public function update(Request $request, $name)
{
    
    $request->validate([
        'name' => 'required|string|unique:events,name,' . $name . ',name',
        'description' => 'required|string',
        'price' => 'required|numeric',
        'currency' => 'required|exists:currencies,id',
        'visibility' => 'required|in:admin,user',
    ]);

   
    $event = Event::where('name', $name)->firstOrFail();

    $event->update([
        'name' => $request->name,
        'description' => $request->description,
        'price' => $request->price,
        'currency_id' => $request->currency,
        'role' => $request->visibility,
    ]);

    return redirect()->route('events')->with('success', 'Event updated successfully!');
}




}
