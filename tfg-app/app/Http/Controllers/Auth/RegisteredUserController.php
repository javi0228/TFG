<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use App\Rules\Dni;
use Carbon\Carbon;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'surname' => ['required', 'string', 'max:255'],
            'dni' => ['required', new Dni],
            'image' => ['sometimes', 'mimes:jpeg,png,jpg,gif,svg'],
            'birthday' => ['required', 'before:' . Carbon::now()->format('Y-m-d')],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'surname' => $request->surname,
            'dni' => $request->dni,
            'image' => $request->image,
            'birthday' => $request->birthday,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        if ($request->image) {
            // dd($request->image);
            $extension = $request->image->extension();

            // Guardamos la nueva foto
            $request->image->storeAs('img', $user->id . '.' . $extension, 'public');

            // movemos la imagen a la carpeta pública
            $request->image->move(public_path('assets/img/users'), $user->id . '.' . $extension);

            // El nombre de la imagen será el id del usuario + extensión
            $user->image = $user->id . '.' . $extension;
            $user->save();
        }

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
