<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\Certificates;
use App\Models\Features;
use App\Models\Home;
use App\Models\Screenshoot;
use App\Models\Services;
use App\Models\Settings;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class frontController extends Controller
{
    public function index()
    {

        $style = Settings::first()->style;
        $dataHome = Home::latest()->first();
        $dataSettings = Settings::latest()->first();
        $dataAbout = About::latest()->first();
        $dataServices = Services::latest()->get();
        $dataCertificates = Certificates::latest()->get();
        $dataScreenshoot = Screenshoot::latest()->get();
        $dataFeatures = Features::latest()->get();
        return view('front.index',
            compact('style', 'dataHome', 'dataAbout', 'dataServices', 'dataCertificates', 'dataScreenshoot' , 'dataFeatures' , 'dataSettings'));
    }

}
