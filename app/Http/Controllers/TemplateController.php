<?php

namespace App\Http\Controllers;

use App\Models\Template;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use ZipArchive;


class TemplateController extends Controller
{

    function __construct()
    {
        $this->middleware('permission:template-list|template-create|template-edit|template-delete', ['only' => ['index', 'show']]);
        $this->middleware('permission:template-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:template-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:template-delete', ['only' => ['destroy']]);
    }

    public function index()
    {
        $templates = Template::latest()->paginate(5);
        return view('cruds.templates.index', compact('templates'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function create()
    {
        return view('cruds.templates.create');
    }

    public function store(Request $request)
    {
        $template = $request->file('template');
        if ($template) {
            $template_path = $template->getClientOriginalName();
            Storage::disk('templates')->put($template_path, File::get($template));

            $storagePath  = Storage::disk('templates')->getDriver()->getAdapter()->getPathPrefix();
            $zip = new ZipArchive;

            if ($zip->open($storagePath . $template_path) === TRUE) {
                $name = $template->getClientOriginalName();
                $name = str_replace(".zip", "", $name);
                Storage::disk('templates')->makeDirectory($name);
                $zip->extractTo($storagePath . $name);
                $zip->close();
                $template = new Template();
                $template->name = $name;
                $template->save();
            }
        }
        unlink($storagePath . $template_path);
        return redirect()->route('templates.index')
            ->with('success', 'Template upload successfully');
    }

    public function show(template $template)
    {
        return view('cruds.templates.show', compact('template'));
    }

    public function destroy(template $template)
    {
        Storage::disk('templates')->deleteDirectory($template->name);
        $template->delete();
        return redirect()->route('templates.index')
            ->with('success', 'template deleted successfully');
    }
}
