<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Category;
use App\Models\Restaurant;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

// Helpers
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        $categories = Category::all();

        return view('auth.register', compact('categories'));
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:64'],
            'restaurant_name' => ['required', 'string', 'max:255', 'unique:restaurants,restaurant_name'],
            'description' => ['required', 'string', 'max:2048'],
            'address' => ['required', 'string', 'max:255'],
            'city' => ['required', 'string', 'max:255'],
            'vat' => ['required', 'regex:/^[0-9]{11}$/', 'unique:restaurants,vat'],
            'phone' => ['required', 'string', 'numeric', 'regex:/^[0-9]{0,10}$/'],
            'image' => 'nullable|image|max:2048',
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'categories' => ['required', 'array', 'exists:categories,id'],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        if ($request->hasFile('image')) {
            $img_path = $request->file('image')->store('restaurants', 'public');
            $restaurant_image_path = 'restaurants/' . $request->file('image')->hashName();
        } else {
            $restaurant_image_path = null;
        }

        $restaurant = Restaurant::create([
            'restaurant_name' => $request->restaurant_name,
            'slug' => Str::slug($request->restaurant_name),
            'description' => $request->description,
            'address' => $request->address,
            'city' => $request->city,
            'vat' => $request->vat,
            'image' => $restaurant_image_path,
            'phone' => $request->phone,
            'user_id' => $user->id,
        ]);

        foreach ($request->categories as $categoryId) {
            $restaurant->categories()->attach($categoryId);
        }

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
