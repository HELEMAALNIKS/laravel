<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBuildingRequest;
use App\Http\Requests\UpdateBuildingRequest;
use Illuminate\Http\Request;
use App\Models\Building;
use Illuminate\Support\Facades\File;
use App\Models\User;
use Auth;

class BuildingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $buildings = Building::all();
        return view('building.index', compact('buildings'));      
    }

    public function search(Request $request)
    {
        $q = $request->input('search');
    
        // Search in the title and body columns from the posts table
        $buildings = Building::query()
            ->where('title', 'LIKE', "%{$q}%")
            ->orWhere('description', 'LIKE', "%{$q}%")
            ->orWhere('architect', 'LIKE', "%{$q}%")
            ->orWhere('constructionyear', 'LIKE', "%{$q}%")
            ->get();
    
        // Return the search view with the resluts compacted
        return view('building.search', compact('buildings'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('building.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreBuildingRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBuildingRequest $request)
    {
        $request->validate([
            'title' => 'required',
            'architect' => 'required',
            'constructionyear' => 'required',
            'description' => 'required',
            'image' => 'required|mimes:jpeg,jpg,bmp,png|max:32768'
        ]);
        
        $newImageName = time() . '-' . $request->title . '.' . $request->image->extension();

        $request->image->move(public_path('images'), $newImageName);

        $building = Building::create([
            'title' => $request->input('title'),
            'architect' => $request->input('architect'),
            'constructionyear' => $request->input('constructionyear'),
            'description' => $request->input('description'),
            'image_path' => $newImageName,
            'user_id' => auth()->id()
        ]);

        // $userHasBuildings = User::has('buildings')->find(Auth::user()->id);
        // dd($userHasBuildings);

        return redirect()->route('building.index')->with('success', 'Building created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Building  $building
     * @return \Illuminate\Http\Response
     */
    public function show(Building $building)
    {
        return view('building.show', compact('building'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Building  $building
     * @return \Illuminate\Http\Response
     */
    public function edit(Building $building)
    {
        return view('building.edit', compact('building'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateBuildingRequest  $request
     * @param  \App\Models\Building  $building
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Building $building)
    {
        $request->validate([
            'title' => 'required',
            'architect' => 'required',
            'constructionyear' => 'required',
            'description' => 'required',
            'image' => 'mimes:jpeg,jpg,bmp,png|max:32768'

        ]);       
        if($request->hasfile('image')){
            $imageName = time() . '-' . $request->title . '.' . $request->image->extension();
            $request->image->move(public_path('images'), $imageName);
            File::delete(public_path("images/" . $building->image_path));
        } 
        else
        {
            $imageName  = $building->image_path;
        }

        Building::where('id', $building->id)->update([
            'title' => $request->input('title'),
            'architect' => $request->input('architect'),
            'constructionyear' => $request->input('constructionyear'),
            'description' => $request->input('description'),
            'image_path' => $imageName
        ]);        
        return redirect()->route('building.index')->with('success', 'Building updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Building  $building
     * @return \Illuminate\Http\Response
     */
    public function destroy(Building $building)
    {
        if(count(auth()->user()->buildings) > 5 && Auth::user()->id === $building->user_id) {
            File::delete(public_path("images/" . $building->image_path));
            $building->delete();
            return redirect()->route('building.index')
            ->with('success', 'Building deleted successfully');
        } else {
            return redirect()->route('building.index')->with('failure', "Error, not allowed");
        };
    }
}
