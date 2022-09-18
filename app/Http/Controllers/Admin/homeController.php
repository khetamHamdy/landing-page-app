<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\Home;
use App\Traits\ImageTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class homeController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Home::class);
    }

    public function index()
    {
        $data = Home::latest()->first();
        if ($data) {
            return view('Dashboard.home.add', compact('data'));
        } else {
            $data = new Home();
            return view('Dashboard.home.add', compact('data'));
        }

    }


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
        Home::updateOrCreate(['id' => $request->id], $data);
        return redirect()->route('homeList')->with('success', __("admin.done_added"));

    }

    public function list()
    {
        $datas = Home::latest()->paginate(5);
        return view('Dashboard.home.list', compact('datas'));
    }

    public function Delete(Home $home)
    {
        Storage::disk('public')->delete($home->image);
        $home->delete();
        return redirect()->route('homeList')->with('warning', __("admin.done_deleted"));

    }

    public function Edit(Home $home)
    {
        return view('Dashboard.home.update', compact('home'));
    }

    public function update(Request $request, Home $home)
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
        $home->update($data);
        return redirect()->route('homeList')->with('warning',  __("admin.done_update"));

    }

    public function img(Request $request)
    {
        $avatarpath = null;
        if ($request->hasFile('image')) {
            $avatarpath = $request->file('image')->storeAs(
                'about_img',
                rand(1, 1000) . '.' . $request->file('image')->getClientOriginalExtension()
                ,
                'public'
            );
            // dd($request->file('profile_photo_path')->getClientOriginalExtension());

        }
        return $avatarpath;
    }


}
