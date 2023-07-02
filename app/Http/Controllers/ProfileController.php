<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfilePictureUpdateRequest;
use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit-new', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Display user safety form
     */
    public function security(Request $request): View
    {
        return view('profile.security', [
            'user' => $request->user()
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Update user picture
     */
    public function update_picture(ProfilePictureUpdateRequest $request): RedirectResponse
    {
        $request->validated();
        $user = auth()->user();

        if ($request->has('image')) {
            $path = '/uploads/images/';
            $image = $request->file('image');
            // remove old file
            if ($user->picture != '' && $user->picture != null) {
                $file_old = $path . $user->picture;
                $exists = Storage::disk('public')->exists($file_old);
                if ($exists) {
                    Storage::disk('public')->delete($file_old);
                }
            }
            $picture = Storage::disk('public')->put($path, $image);
            $user->update(['picture' => $picture]);
            return Redirect::route('profile.edit')->with('status', 'profile-updated');
        } else {
            return Redirect::route('profile.edit')->with('status', 'profile-failed-update');
        }
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
