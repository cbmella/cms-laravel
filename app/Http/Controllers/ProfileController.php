<?php

namespace App\Http\Controllers;

use Hash;
use Auth;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProfileController extends Controller
{
    public function index()
    {
        return view('auth.users.change-password');
    }

    public function changePassword(Request $request)
    {
        $this->validate($request, [
            'contrasena-actual' => 'required',
            'nueva-contrasena' => 'required|string|min:6|confirmed',
        ]);

        if (!(Hash::check($request->get('contrasena-actual'), Auth::user()->password))) {
            $data = array(
                'message' => 'La contraseña ingresada no es correcta !',
                'feedback' => 'alert-danger'
            );
        } else {
            $user = Auth::user();
            $user->password = bcrypt($request->get('nueva-contrasena'));
            $user->save();
            $data = array(
                'message' => 'Contraseña actualizada correctamente !',
                'feedback' => 'alert-success'
            );
        }

        return redirect()->back()->with($data);
    }

    public function updateProfileShow()
    {
        return view('auth.users.update-profile');
    }

    public function updateProfile(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|string|min:6|email',
        ]);

        $user = Auth::user();
        $user->name = $request->get('name');
        $user->email = $request->get('email');
        $user->save();
        $data = array(
            'message' => 'Datos actualizados correctamente !',
            'feedback' => 'alert-success'
        );

        return redirect()->back()->with($data);
    }

/*     public function activeTemplate($id)
    {
        $template = Template::findOrFail($id);
        $setting = Setting::findOrFail(17);
        $setting->value = $template->name;
        $setting->update();

        return redirect()->route('templates.show', $template->id)
            ->with('info', 'Template activado con éxito');    
    } */
}
