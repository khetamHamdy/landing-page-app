<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Features;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FeaturesController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Features::class);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas = Features::latest()->paginate(5);
        return view('Dashboard.Features.list', compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Dashboard.Features.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $roles = [];
        /// multi lang data
        foreach (config('app.languages') as $locale => $lang) {
            $roles ["$locale.title"] = 'required|string';
        }
        $roles["image"]='required|mimes:jpeg,png,jpg';
        $data = $this->validate($request, $roles);

        $data = $request->all();
        if ($request->hasFile('image')) {
            $data['image'] = $this->img($request);
        }
        Features::create($data);
        return redirect()->route('features.index')->with('success',__("admin.done_added"));

    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Features $features
     * @return \Illuminate\Http\Response
     */
    public function show(Features $features)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Features $features
     * @return \Illuminate\Http\Response
     */
    public function edit(Features $feature)
    {
        return view('Dashboard.Features.update', compact('feature'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Features $features
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Features $feature)
    {
        $roles = [];
        /// multi lang data
        foreach (config('app.languages') as $locale => $lang) {
            $roles ["$locale.title"] = 'required|string';
        }
        $roles["image"]='required|mimes:jpeg,png,jpg';
        $data = $this->validate($request, $roles);


        $data = $request->all();
        if ($request->hasFile('image')) {
            $data['image'] = $this->img($request);
        }
        $feature->update($data);
        return redirect()->route('features.index')->with('info',  __("admin.done_update"));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Features $features
     * @return \Illuminate\Http\Response
     */
    public function destroy(Features $feature)
    {
        Storage::disk('public')->delete($feature->image);
        $feature->delete();
        return redirect()->route('features.index')->with('errors',__("admin.done_deleted"));

    }

    public function img(Request $request)
    {
        $avatarpath = null;
        if ($request->hasFile('image')) {
            $avatarpath = $request->file('image')->storeAs(
                'services_img',
                rand(1, 1000) . '.' . $request->file('image')->getClientOriginalExtension()
                ,
                'public'
            );
            // dd($request->file('profile_photo_path')->getClientOriginalExtension());

        }
        return $avatarpath;
    }


}
