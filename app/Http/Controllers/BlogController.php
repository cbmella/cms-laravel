<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Setting;
use App\Models\Post;

class BlogController extends Controller
{
    private $template;

    public function __construct()
    {
        $this->template = Setting::findOrFail(1);
        if ($this->template->active) {
            $template = $this->template->value;
            $posts = Post::orderBy('id', 'DESC')->paginate(5);
            return view('templates.' . $template . '.index', compact('template', 'posts'));
        } else {
            abort(response('<h1>No hay templates activos</h1>', 401));
        }
    }

    public function index()
    {
        $template = $this->template->value;
        $posts = Post::orderBy('id', 'DESC')->paginate(5);
        return view('templates.' . $template . '.blog.index', compact('template', 'posts'));
    }

    public function show(Request $request)
    {
        $template = $this->template->value;
        $post = Post::find($request->id);
        return view('templates.' . $template . '.blog.post', compact('template', 'post'));
    }
}
