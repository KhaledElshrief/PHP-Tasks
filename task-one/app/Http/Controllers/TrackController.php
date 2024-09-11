<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Track;
use App\Models\Student;


class TrackController extends Controller
{
    public function index()
    {
        $tracks = Track::all();
        return view('track.index',compact('tracks'));
    }


    public function create()
    {
        return view('track.create');
    }



public function createTrack(Request $request)
{
    // dd($request->logo);
       $request->validate([
        'logo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        'name'=>'required|max:200|unique:tracks',
        'description'=>'required|max:500'
    ]);
    $path;
           if ($request->hasFile('logo')) {
        $imageName = time() . '.' . $request->logo->extension();

        $path = $request->logo->storeAs('track', $imageName, 'public');

        // $track = new Track();
        // $track->image_path = $path;
        // $track->save();
    }
// dd("-----------------");
    $track = new Track();
        $track->logo = $path;
        $track->name = $request->name;
        $track->description = $request->description;
        $track->save();
            return redirect('/Tracks');

}

    public function show($id)
    {
        $track = Track::find($id);
        $students = Student::where('track_id', $track->id)->get();

        return view('track.show',compact('track'),compact('students'));
    }

    public function edit($id)
    {
        $track = Track::find($id);

        return view('track.update',compact('track'));
    }

    public function update(Request $request, $id)
    {
        $track = Track::find($id);
        $track->name = $request->name;
        $track->description = $request->description;
        $track->save();
        return redirect('/Tracks');
    }

//     public function destroy(Track $track )
//     {
//         $track->delete();
//         return redirect('/Tracks');
// }
    public function destroy( $id ){
        $track = Track::find($id);
        $students = Student::where('track_id', $track->id)->get();
        if(count($students)>0){
            return redirect('/Tracks');
        }
        $track->delete();
        return redirect('/Tracks');
    }

    public function store(Request $request)
    {
        $requestedData=request()->all();
        $track=Track::create($requestedData);
        $track->save();
        return redirect('/track');
    }
public function all()
{
    $students = Student::with('track')->get();

    return view('index', compact('students'));
}


}
