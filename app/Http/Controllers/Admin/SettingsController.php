<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Settings;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SettingsController extends Controller
{
    public  function  __construct()
    {
        $this->authorizeResource(Settings::class);
    }
    public function index()
    {
        $admin = Auth::guard('admin')->user()->id;

        $settings=Settings::where('admin_id', '=' ,$admin)->first();
        $StyleData = [
            '1' => 'Style 1',
            '2' => 'Style 2',
            '3' => 'Style 3',
            '4' => 'Style 4'];
        if ($settings){
            return view('Dashboard.settings.add', compact('StyleData', 'settings'));
        }
       return ;
    }

    public function store(Request $request, Settings $settings)
    {
        $admin = Auth::guard('admin')->user()->id;
        $phone = $request->phone;
        $location = $request->location;
        $email = $request->email;
        Settings::with('admin')->updateOrCreate(
            ['admin_id' => $admin],
            [
                'style' => $request->style,
                'admin_id' => $admin,
                'phone' => $phone,
                'location' => $location,
                'email' => $email
            ]
        );
       return redirect()->route('adminName')->with('success' ,__("admin.done_deleted"));
    }
}
