<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateUserInfoRequest;
use App\Http\Requests\UpdateUserPasswordRequest;
use App\Http\Requests\UpdateUserProfileImageRequest;
use App\Models\Interest;
use App\Models\SingleMatch;
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
            'user' => $user,
            'matches' => SingleMatch::scopeMatchesByUserIdQuery(SingleMatch::all(),$user->id)->paginate(5),
            'liked' => SingleMatch::scopeLikesByUserIdQuery(SingleMatch::all(),$user->id)->paginate(5),
        ]);
    }

    public function settings(): View
    {
        $user = auth()->user();
        $interests = Interest::all();
        return view('user.settings', [
            'user' => $user,
            'interests' => $interests
        ]);
    }

    public function updateInfo(UpdateUserInfoRequest $request): RedirectResponse
    {
        $user = auth()->user();

        if ($request->interests) {
            foreach ($request->interests as $value) {
                $user->interests()->attach([$value]);
            }
        }
        $user->interests()->sync($request->interests);


        $user->update([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
        ]);


        $user->info->update([
            'phone' => $request->get('phone'),
            'location' => $request->get('location'),
            'phone' => $request->get('phone'),
            'age' => $request->get('age'),
            'relationship' => $request->get('relationship'),
            'description' => $request->get('description'),
        ]);

        return redirect()
            ->back()
            ->with('status', __('Profile info has been updated.'));
    }
    public function updatePassword(UpdateUserPasswordRequest  $request){
        $user = auth()->user();

        $user->update([
            'password' => Hash::make($request->get('password')),
        ]);

        return redirect()
            ->back()
            ->with('status', __('Your password has been updated.'));

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
