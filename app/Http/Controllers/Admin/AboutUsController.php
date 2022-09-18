<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\About;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class AboutUsController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(About::class);
    }

    public function index()
    {

        return view('Dashboard.about_us.add');
    }

    public function store(Request $request)
    {
          //return $request;
        $roles = [];
        /// multi lang data
        foreach(config('app.languages')  as $locale => $lang) {
            $roles ["$locale.title"] = 'required|string';
            $roles ["$locale.description"] = 'required|string';
        }
        $data = $this->validate($request, $roles);

        if ($request->hasFile('image')) {
            $data['image'] = $this->img($request);
        }
        About::create($data);
        return redirect()->route('aboutList')->with('success', __("admin.done_added"));
    }

    public function list()
    {
        $datas = About::latest()->paginate(3);
        return view('Dashboard.about_us.list', compact('datas'));
    }

    public function Delete(About $about)
    {
        Storage::disk('public')->delete($about->image);
        $about->delete();
        return redirect()->route('aboutList')->with('warning', __("admin.done_deleted"));

    }

    public function Edit(About $about)
    {
        return view('Dashboard.about_us.update', compact('about'));
    }

    public function update(Request $request, About $about)
    {
        //return $request;
        $roles = [];
        /// multi lang data
        foreach(config('app.languages')  as $locale => $lang) {
            $roles ["$locale.title"] = 'required|string';
            $roles ["$locale.description"] = 'required|string';
        }
        $data = $this->validate($request, $roles);

        $data = $request->all();
        if ($request->hasFile('image')) {
            $data['image'] = $this->img($request);
        }
        $about->update($data);
        return redirect()->route('aboutList')->with('info', __("admin.done_update"));

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
//
//    protected function rules()
//    {
//        $rules = $this->rules;
//        return $rules;
//    }
}
