<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Screenshoot;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ScreenshootController extends Controller
{
    public  function  __construct()
    {
        $this->authorizeResource(Screenshoot::class);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas = Screenshoot::latest()->paginate(2);
        return view('Dashboard.Screenshoot.list' , compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Dashboard.Screenshoot.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        if ($request->hasFile('image')) {
            $data['image'] = $this->img($request);
        }
       // dd($data);
        Screenshoot::create($data);
        return redirect()->route('screenshoot.index')->with('success' , __("admin.done_added"));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Screenshoot  $screenshoot
     * @return \Illuminate\Http\Response
     */
    public function show(Screenshoot $screenshoot)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Screenshoot  $screenshoot
     * @return \Illuminate\Http\Response
     */
    public function edit(Screenshoot $screenshoot)
    {
        return view('Dashboard.Screenshoot.update', compact('screenshoot'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Screenshoot  $screenshoot
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Screenshoot $screenshoot)
    {
        $data = $request->all();
        if ($request->hasFile('image')) {
            $data['image'] = $this->img($request);
        }
        $screenshoot->update($data);
        return redirect()->route('screenshoot.index')->with('info' ,  __("admin.done_update"));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Screenshoot  $screenshoot
     * @return \Illuminate\Http\Response
     */
    public function destroy(Screenshoot $screenshoot)
    {
        Storage::disk('public')->delete($screenshoot->images);
        $screenshoot->delete();
        return redirect()->route('screenshoot.index')->with('errors' , __("admin.done_deleted"));
    }
    public function img(Request $request)
    {
        $avatarpath = null;
        if ($request->hasFile('images')) {
            $avatarpath = $request->file('images')->storeAs(
                'screenshoot_img',
                rand(1, 1000) . '.' . $request->file('images')->getClientOriginalExtension()
                ,
                'public'
            );
            // dd($request->file('profile_photo_path')->getClientOriginalExtension());

        }
        return $avatarpath;
    }
}
