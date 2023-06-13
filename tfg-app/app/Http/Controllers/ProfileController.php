<?php

namespace App\Http\Controllers;

use File;
use App\Rules\Dni;
use Auth;
use Carbon\Carbon;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Validation\Rule;
use Illuminate\View\View;
use App\Models\User;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(Request $request): RedirectResponse
    {
        // Validamos los datos del fomulario
        $request->user()->fill( $request->validate([
            'name' => ['string', 'max:255'],
            'surname' => ['string', 'max:255'],
            'dni' => ['required', new Dni],
            'image' => ['sometimes', 'mimes:jpeg,png,jpg,gif,svg'],
            'birthday' => ['required', 'before:' . Carbon::now()->format('Y-m-d')],
            'email' => ['email', 'max:255', Rule::unique(User::class)->ignore($request->user()->id)],
        ]));

        // Compruebo si el usuario ha cambiado la foto de perfil
        // y la guardamos
        if ($request->image) {
            $extension = $request->image->extension();
            // Borramos la foto anterior si hubiera
            File::delete(public_path('assets/img/users/' . Auth::user()->image));

            // Guardamos la nueva foto
            $request->image->storeAs('img', $request->user()->id . '.' . $extension,'public');

            // movemos la imagen a la carpeta pública
            $request->image->move(public_path('assets/img/users'), $request->user()->id . '.' . $extension);
            
            // El nombre de la imagen será el id del usuario + extensión
            $request->user()->image = $request->user()->id . '.' . $extension;
        }



        // Guardamos los datos del usuario en base de datos
        $request->user()->save();

        // Redirigimos al usuario
        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}