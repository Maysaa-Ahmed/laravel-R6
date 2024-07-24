<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Classes;

class ClassController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $classes = Classes::get();

        return view('classes', compact('classes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('add_class');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        if (isset($request->isFulled)) {
            $isfull = true;
        } else {
            $isfull = false;
        }

        $data = [
            'className' => $request->className,
            'capacity' => $request->capacity,
            'price' => $request->price,
            'isFulled' => $isfull,
            'timeFrom' => $request->timeFrom,
            'timeTo' => $request->timeTo,
        ];

        Classes::create($data);
        return "Done";

        // $className = 'BMW';
        // $capacity = 40;
        // $isFulled = true;
        // $price = 12;
        // $timeFrom = 1;
        // $timeTo = 1;
        

        // car::create([
        //     'className' => $className,
        //     'capacity' => 40,
        //     'isFulled' => $isFulled,
        //     'price' => 12,
        //     'timeFrom' => 1,
        //     'timeTo' => 2,
        // ]);
        // return "Done";
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $class = Classesr::findOrFail($id);
        return view('edit_class', compact('class'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
