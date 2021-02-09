<?php

namespace App\Http\Controllers;

use App\Models\Setting;

class HomeController extends Controller
{
    public function __construct()
    {
        define("TEMPLATE", Setting::find(1)->value);
        define("ACTIVE", Setting::find(1)->active);
    }

    public function index()
    {
        $active = ACTIVE;
        if (!ACTIVE) {
            $template = 'basic';
            return view('templates.' . $template . '.index', compact('template'));
        }
        $template = TEMPLATE;
        return view('templates.' . TEMPLATE . '.index', compact('template'));
    }
}
