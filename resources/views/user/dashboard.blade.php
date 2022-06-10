<x-user-layout :user="$user">
    <x-slot name="content">
        <div class="">
            <div class="card max-w-md m-auto my-10">
                <div class="card-content">
                    <div class="flex items-center align justify-center p-5">
                        <div class="widget-label text-center">

                            <div class="image profile ">

                                <img src="{{$user->info->getProfileImage()}}" alt="{{$user->name}}"
                                     class="rounded-full">
                            </div>
                            <div> {{__('Hi') }} </div>
                            <h1 class="text-pink ">
                               <span class> {{ $user->name }}
                            </h1>
                        </div>
                    </div>
                    <div class="flex items-center justify-center p-5">
                        <div class="widget-label text-center">
                            <p>{{__('Welcome to Capybrr')}}</p>
                            <p>{{__('Are you ready to discover some new friends?')}}</p>
                            <a href="{{route('user.app')}}"><x-button class="my-4  big"> {{__('Jump in')}}</x-button></a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card max-w-md m-auto my-10">
                <div class="card-content">
                    <div class="flex items-center align justify-center p-5">
                        <div class="widget-label text-center">
                            <div class="image profile ">
                                <span class="widget-icon text-pink icon big"><i class=" mdi mdi-heart"></i></span>
                            </div>
                            <h1 class="text-pink my-4 ">
                                <span class> {{ __('Matches') }}
                            </h1>
                        </div>
                    </div>
                    <div class="flex items-center justify-center p-5">
                        <div class="widget-label text-center">
                            <p>{{__('Moto Moto likes you!')}}</p>
                            <p>{{__('Want to check your new soulmates?')}}</p>
                            <a href="{{route('user.dashboard.matches')}}"><x-button class="my-4 big"> {{__('Ok I pull up')}}</x-button></a>
                        </div>
                    </div>
                </div>
            </div>


            <div class="card max-w-md m-auto my-10">
                <div class="card-content">
                    <div class="flex items-center align justify-center p-5">
                        <div class="widget-label text-center">

                            <div class="image profile ">
                                <span class="widget-icon text-pink icon big"><i class=" mdi mdi-account-cog-outline"></i></span>
                            </div>
                            <h1 class="text-pink my-4 ">
                                <span class> {{ __('Settings') }}
                            </h1>
                        </div>
                    </div>
                    <div class="flex items-center justify-center p-5">
                        <div class="widget-label text-center">
                            <p>{{__('Your account details')}}</p>
                            <p>{{__('Want to change anything?')}}</p>
                            <a href="{{route('user.dashboard.settings')}}"><x-button class="my-4 big"> {{__('Hop')}}</x-button></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </x-slot>
</x-user-layout>
