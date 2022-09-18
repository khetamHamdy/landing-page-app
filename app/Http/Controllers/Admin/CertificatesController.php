<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Certificates;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class CertificatesController extends Controller
{

    public function __construct()
    {
        $this->authorizeResource(Certificates::class);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas = Certificates::latest()->paginate(2);
        return view('Dashboard.Certificates.list', compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Dashboard.Certificates.add');

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
            $roles ["$locale.title_job"] = 'required|string';
            $roles ["$locale.description"] = 'required|string';
        }
        $roles["image"] = 'required|mimes:jpeg,png,jpg';
        $data = $this->validate($request, $roles);
        $data = $request->all();
        if ($request->hasFile('image')) {
            $data['image'] = $this->img($request);
        }
        Certificates::create($data);
        return redirect()->route('certificates.index')->with('success', __("admin.done_added"));
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Certificates $certificates
     * @return \Illuminate\Http\Response
     */
    public function show(Certificates $certificates)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Certificates $certificate
     * @return \Illuminate\Http\Response
     */
    public function edit(Certificates $certificate)
    {
        return view('Dashboard.Certificates.update', compact('certificate'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Certificates $certificate
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Certificates $certificate)
    {
        $roles = [];
        /// multi lang data
        foreach (config('app.languages') as $locale => $lang) {
            $roles ["$locale.title"] = 'required|string';
            $roles ["$locale.title_job"] = 'required|string';
            $roles ["$locale.description"] = 'required|string';
        }
        $roles["image"] = 'required|mimes:jpeg,png,jpg';
        $data = $this->validate($request, $roles);

        $data = $request->all();
        if ($request->hasFile('image')) {
            $data['image'] = $this->img($request);
        }
        $certificate->update($data);
        return redirect()->route('certificates.index')->with('info', __("admin.done_update"));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Certificates $certificate
     * @return \Illuminate\Http\Response
     */
    public function destroy(Certificates $certificate)
    {
        Storage::disk('public')->delete($certificate->image);
        $certificate->delete();
        return redirect()->route('certificates.index')->with('warning', __("admin.done_deleted"));
    }

    public function img(Request $request)
    {
        $avatarpath = null;
        if ($request->hasFile('image')) {
            $avatarpath = $request->file('image')->storeAs(
                'certificate_img',
                rand(1, 1000) . '.' . $request->file('image')->getClientOriginalExtension()
                ,
                'public'
            );
            // dd($request->file('profile_photo_path')->getClientOriginalExtension());

        }
        return $avatarpath;
    }

}
