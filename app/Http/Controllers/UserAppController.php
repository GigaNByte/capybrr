<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateMatchLikeRequest;
use App\Services\SuggestedUserService;
use App\Services\UserReactionService;
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
    public function like(UpdateMatchLikeRequest $request, $likedUser): RedirectResponse
    {
        $user = auth()->user();

        if ($this->userReactionService->likeUser($user->id,$likedUser)){
           $recentMatch = $likedUser;
        }else{
            $recentMatch = null;
        }

        return redirect()->action(
            [get_class($this), 'index'], ['recentMatch' => $recentMatch]
        );

    }
}
