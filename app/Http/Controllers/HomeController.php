<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Setting;
/* use App\Models\Post; */
//crear modelo para paginas

class HomeController extends Controller
{
    private $template;

    public function __construct()
    {
        $this->template = Setting::findOrFail(1);
        if ($this->template->active) {
            $template = $this->template->value;
            /* $posts = Post::orderBy('id', 'DESC')->paginate(5); */
            return view('templates.' . $template . '.index', compact('template'));
        } else {
            abort(response('<h1>No hay templates activos</h1>', 401));
        }
    }

    public function index()
    {
        $template = $this->template->value;
       /*  $pages = Post::orderBy('id', 'DESC')->paginate(5); */
        return view('templates.' . $template . '.index', compact('template'/* , 'pages' */));
    }

/*     public function show(Request $request)
    {
        $template = $this->template->value;
        $post = Post::find($request->id);
        return view('templates.' . $template . '.blog.post', compact('template', 'post'));
    } */
}
