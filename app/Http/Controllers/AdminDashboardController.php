<?php

namespace App\Http\Controllers;

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
        $userInfo = $user->info();

        return view('admin.dashboard', [
            'user' => $user,
            'userInfo'=> $userInfo,
            'stats' => $this->adminStatsService->getStats()
        ]);
    }

}
