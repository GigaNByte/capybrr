<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateUserInfoRequest;
use App\Http\Requests\UpdateUserProfileImageRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
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

    public function matches(): View
    {
        $user = auth()->user();
        return view('user.matches', [
            'user' => $user
        ]);
    }

    public function settings(): View
    {
        $user = auth()->user();
        return view('user.settings', [
            'user' => $user
        ]);
    }

    public function updateInfo(UpdateUserInfoRequest $request): RedirectResponse
    {
        $user = auth()->user();


        $user->update([
            'password' => Hash::make($request->get('password')),
            'name' => $request->get('name'),
            'email' => $request->get('email'),
        ]);

        $user->info->update([
            'phone' => $request->get('phone'),
            'location' => $request->get('location'),
            'phone' => $request->get('phone'),
            'gender' => $request->get('gender'),
            'age' => $request->get('age'),
            'relationship' => $request->get('relationship'),
            'description' => $request->get('description'),
        ]);

        return redirect()
            ->back()
            ->with('status', __('Profile info has been updated.'));
    }

    public function updateProfileImage(UpdateUserProfileImageRequest $request): RedirectResponse
    {
        $user = auth()->user();
        //Storage::disk('public')->delete($user->info->profile_image);

        $user->info->update([
            'profile_image' => $request->file('picture')->store('profileImages', 'public')
        ]);
        return redirect(route('user.dashboard.settings'))
            ->with('status', __('Image has been updated.'));
    }


}
