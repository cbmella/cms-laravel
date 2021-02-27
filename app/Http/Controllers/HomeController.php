<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use App\Models\Menu;
use App\Models\Page;

class HomeController extends Controller
{
    private $template;
    private $page;
    private $menus;

    public function __construct()
    {
        $this->template = Setting::findOrFail(1);
        $this->page = Page::findOrFail(1);
        $this->menus = Menu::all();
        if (!$this->template->active) {
            abort(response('<h1>No hay templates activos</h1>', 401));
        }
        //validar que se configure una pagina inicial
    }

    public function index()
    {
        $template = $this->template->value;
        $page = $this->page;
        $menus = $this->menus;
        return view('templates.' . $template . '.index', compact('template', 'page', 'menus'));
    }
}
