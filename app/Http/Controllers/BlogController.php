<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Setting;
use App\Models\Menu;
use App\Models\Post;

class BlogController extends Controller
{
    private $template;
    private $posts;
    private $menus;

    public function __construct()
    {
        $this->template = Setting::findOrFail(1);
        $this->posts = Post::orderBy('id', 'DESC')->paginate(5);
        $this->menus = Menu::all();
        if (!$this->template->active) {
            abort(response('<h1>No hay templates activos</h1>', 401));
        }
    }

    public function index()
    {
        $template = $this->template->value;
        $posts = $this->posts;
        $menus = $this->menus;
        return view('templates.' . $template . '.blog.index', compact('template', 'posts', 'menus'));
    }

    public function show(Request $request)
    {
        $template = $this->template->value;
        $menus = $this->menus;
        $post = Post::find($request->id);
        return view('templates.' . $template . '.blog.post', compact('template', 'post', 'menus'));
    }
}
