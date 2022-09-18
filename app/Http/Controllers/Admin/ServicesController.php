<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Home;
use App\Models\Services;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ServicesController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Services::class);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas = Services::latest()->paginate(5);
        return view('Dashboard.Services.list', compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Dashboard.Services.add');
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
        foreach(config('app.languages')  as $locale => $lang) {
            $roles ["$locale.title"] = 'required|string';
            $roles ["$locale.description"] = 'required|string';
        }
        $roles["image"]='required|mimes:jpeg,png,jpg';

        $data = $this->validate($request, $roles);
        //dd($request->all());
        $data = $request->all();
        if ($request->hasFile('image')) {
            $data['image'] = $this->img($request);
        }
        Services::create($data);
        return redirect()->route('services.index')->with('success', __("admin.done_added"));
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Services $services
     * @return \Illuminate\Http\Response
     */
    public function show(Services $services)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Services $services
     * @return \Illuminate\Http\Response
     */
    public function edit(Services $service)
    {
        return view('Dashboard.Services.update', compact('service'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Services $services
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Services $service)
    {
        $roles = [];
        /// multi lang data
        foreach(config('app.languages')  as $locale => $lang) {
            $roles ["$locale.title"] = 'required|string';
            $roles ["$locale.description"] = 'required|string';
        }
        $roles["image"]='required|mimes:jpeg,png,jpg';
        $data = $this->validate($request, $roles);
        $data = $request->all();
        if ($request->hasFile('image')) {
            $data['image'] = $this->img($request);
        }
        $service->update($data);
        return redirect()->route('services.index')->with('info',  __("admin.done_update"));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Services $services
     * @return \Illuminate\Http\Response
     */
    public function destroy(Services $service)
    {
        //dd($service);
        Storage::disk('public')->delete($service->image);
        $service->delete();
        return redirect()->route('services.index')->with('errors', __("admin.done_deleted"));

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
