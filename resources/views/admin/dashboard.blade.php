<x-admin-layout :user="$user">
    <x-slot name="content">
        <div class="grid gap-6 grid-cols-1 md:grid-cols-3 mb-6">
            <div class="card">
                <div class="card-content">
                    <div class="flex items-center justify-between">
                        <div class="widget-label">
                            <h3>
                                {{ __('Registered users') }}
                            </h3>
                            <h1>
                                {{ $stats['users'] }}
                            </h1>
                        </div>
                        <span class="icon widget-icon text-pink"><i class="mdi mdi-account-multiple mdi-48px"></i></span>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-content">
                    <div class="flex items-center justify-between">
                        <div class="widget-label">
                            <h3>
                                {{ __('Matches') }}
                            </h3>
                            <h1>
                                {{ $stats['matches'] }}
                            </h1>
                        </div>
                        <span class="icon widget-icon text-pink"><i class="mdi mdi-heart mdi-48px"></i></span>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-content">
                    <div class="flex items-center justify-between">
                        <div class="widget-label">
                            <h3>
                                {{ __('The most popular Capybara') }}
                            </h3>
                            <h1>
                                {{ $stats['most_popular']->name }}
                            </h1>
                        </div>
                        <span class="icon widget-icon text-pink"><i class="mdi mdi-finance mdi-48px"></i></span>
                    </div>
                </div>
            </div>
        </div>

        <div class="card mb-6">
            <header class="card-header">
                <p class="card-header-title">
                    <span class="icon"><i class="mdi mdi-finance"></i></span>
                    {{ __('Matches') }}
                </p>
                <a href="{{url()->current()}}" class="card-header-icon">
                    <span class="icon"><i class="mdi mdi-reload"></i></span>
                </a>
            </header>
            <div class="card-content">
                <div  class="chart-area">
                    <div class="h-full">
                        <div class="chartjs-size-monitor">
                            <div class="chartjs-size-monitor-expand">
                                <div></div>
                            </div>
                            <div class="chartjs-size-monitor-shrink">
                                <div></div>
                            </div>
                        </div>

                        <canvas id="matches-chart" data="{{ $stats['matches_per_day'] }}" width="2992" height="1000" class="chartjs-render-monitor block"
                                style="height: 400px; width: 1197px;"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </x-slot>
</x-admin-layout>

