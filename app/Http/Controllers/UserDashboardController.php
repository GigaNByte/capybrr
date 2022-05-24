<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class UserDashboardController extends Controller
{
    public function index(): View
    {
        $user = auth()->user();

        return view('user.dashboard', [
            'user' => $user
        ]);
    }

    public function updateInfo(UpdateUserInfoRequest $request): RedirectResponse
    {
        $user = auth()->user();

        $user->info->update([
            'name' => $request->get('name'),
            'phone' => $request->get('phone'),
            'location' => $request->get('location'),
            'phone' => $request->get('phone'),
            'gender' => $request->get('gender'),
            'age' => $request->get('age'),
            'relationship' => $request->get('relationship'),
            'description' => $request->get('description'),
            'species' => $request->get('species')
        ]);

        return redirect()
            ->back()
            ->with('status', __('Profile info has been updated.'));
    }
    public function updateProfileImage(UpdateUserProfileImageRequest $request): RedirectResponse
    {
        $user = auth()->user();

        Storage::disk('public')->delete($user->info->profile_picture);

        $user->info->update([
            'profile_image' => $request->file('picture')->store('profileImages', 'public')
        ]);

        return redirect()
            ->back()
            ->with('status', __('Image has been updated.'));
    }

    public function deleteUser(): RedirectResponse
    {
        $user = Auth::user();
        $user->delete();

        return redirect(route('login'));
    }
}
