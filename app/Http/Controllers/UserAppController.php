<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateMatchLikeRequest;
use App\Models\Match;
use App\Models\User;
use App\Services\SuggestedUserService;
use App\Services\UserReactionService;
use Illuminate\Contracts\Validation\ValidatorAwareRule;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

use Illuminate\View\View;

class UserAppController extends Controller
{
    private SuggestedUserService $suggestedUserService;
    private UserReactionService  $userReactionService;

    public function __construct( SuggestedUserService $suggestedUserService,UserReactionService $userReactionService)
    {
        $this->suggestedUserService = $suggestedUserService;
        $this->userReactionService = $userReactionService;
    }

    public function index(): View
    {
        $user = auth()->user();
        return view('user.app', [
            'user' => $user,
            'suggestedUser' => $this->suggestedUserService->getUser($user),
        ]);
    }
    public function like(Request $request, $likedUser): RedirectResponse
    {
        $request->merge(['id' => $request->route('id')]);

        $user = auth()->user();
        $validator = $request->validate([
            'id' =>  ['required', 'exists:users,id'],
        ]);

        $likedUserObj =  User::find($likedUser);

        if ($this->userReactionService->likeUser($user->id,$likedUser)){
            return redirect()->back()->with('status', __("It's a Match! User") . $likedUserObj->name  .__(" has been matched!") . __(" Go to matches page to see contact details!"));
        }else{
            return redirect()->back()->with('status', __("User ") . $likedUserObj->name  .__(" has been liked!"));
        }
    }
    public function unlike(Request $request, $unlikedUser): RedirectResponse
    {
        $request->merge(['id' => $request->route('id')]);

        $validator = $request->validate([
            'id' =>  ['required', 'exists:users,id'],
        ]);

        $user = auth()->user();
        $unlikedUserObj  = User::find($unlikedUser);

        $this->userReactionService->unlikeUser($user->id,$unlikedUser);

        return redirect()->back()->with('status', __("User ") . $unlikedUserObj->name  .__(" has been unliked"));

    }
}
