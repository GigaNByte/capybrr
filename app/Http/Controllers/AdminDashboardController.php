<?php

namespace App\Http\Controllers;

use App\Models\Match;
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

    public function matches(): View
    {
        $user = auth()->user();
        return view('admin.dashboard-matches', [
            'user' => $user,
            'matches' => Match::All(),
        ]);
    }
    public function users(): View
    {
        $user = auth()->user();
        return view('admin.dashboard-users', [
            'user' => $user,
            'users' => User::All()
        ]);
    }
}
