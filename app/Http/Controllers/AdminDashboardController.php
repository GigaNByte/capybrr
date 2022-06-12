<?php

namespace App\Http\Controllers;

use App\Models\Interest;
use App\Models\SingleMatch;
use App\Models\User;
use App\Services\AdminStatsService;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AdminDashboardController extends Controller
{
    private AdminStatsService $adminStatsService;

    public function __construct(AdminStatsService $adminStatsService)
    {
        $this->adminStatsService = $adminStatsService;
    }

    public function index(): View
    {
        $user = auth()->user();
        return view('admin.dashboard', [
            'user' => $user,
            'stats' => $this->adminStatsService->getStats()
        ]);
    }
    public function interests(): View
    {
        $user = auth()->user();
        return view('admin.dashboard-interests', [
            'user' => $user,
            'interests' => Interest::paginate(10),
        ]);
    }

    public function matches(): View
    {
        $user = auth()->user();
        return view('admin.dashboard-matches', [
            'user' => $user,
            'matches' => SingleMatch::matchesQuery()->paginate(10),
        ]);
    }
    public function likes(): View
    {
        $user = auth()->user();
        return view('admin.dashboard-likes', [
            'user' => $user,
            'matches' => SingleMatch::likesQuery()->paginate(10),
        ]);
    }

    public function users(): View
    {
        $user = auth()->user();
        return view('admin.dashboard-users', [
            'user' => $user,
            'users' => User::where('role','user')->paginate(5)
        ]);
    }
}
