<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Contact;
use App\Models\Roles;
use Illuminate\Http\Request;

class RolesController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Roles::class);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Roles::with('admins')->paginate();
        //dd($roles->admins()->name);
        return view('Dashboard.roles.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Dashboard.roles.create', [
            'role' => new Roles(),
            'names' => Admin::where('id', '!=', '1')->get(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'admin_id' => 'required',
            'abilities' => 'required|array',
        ]);

//dd($request->all());
        $role = Roles::with('admins')->create($request->all());
        $role->Admins()->sync($request->admin_id);
//        return redirect()->route('roles.index')->with('success',
//            __('Role :name created !',
//                ['name' => $role->name]));

        return redirect()->route('roles.index')->with('success', __("admin.done_added"));

    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Roles $role)
    {
        return view('Dashboard.roles.edit', [
            'role' => $role,
            'names' => Admin::where('id', '!=', '1')->get(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Roles $role)
    {

        $request->validate([
            'admin_id' => 'required',
            'abilities' => 'required|array',
        ]);
        // dd($request->all());
        $role->update($request->all());
        $role->Admins()->sync($request->admin_id);
//        return redirect()->route('roles.index')->with('success',
//            __('Role :name created !',
//                ['name' => $role->name]));
        return redirect()->route('roles.index')->with('warning', __("admin.done_update"));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Roles $role)
    {
        $role->delete();
//        return redirect()->route('roles.index')->with('success',
//            __('Role :name created !',
//                ['name' => $role->name]));
        return redirect()->route('roles.index')->with('info', __("admin.done_deleted"));

    }
}
