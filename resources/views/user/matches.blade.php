<x-user-layout :user="$user">
    <x-slot name="content">
        <div class="flex justify-center my-20 mb-10">
            <div class="card">
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
                    <div class="flex items-center justify-between p-5">
                        <div class="widget-label text-center">
                            <p>{{__('Welcome to Capybrr')}}</p>
                            <p>{{__('Are you ready to discover some new friends?')}}</p>
                            <a href="{{route('user.app')}}"><x-button class="my-4  big"> {{__('Jump in')}}</x-button></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </x-slot>
</x-user-layout>
