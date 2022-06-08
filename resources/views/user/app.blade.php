<x-user-layout :user="$user">
    <x-slot name="content">
        <div class="flex justify-center mb-20 mt-0 lg:mt-20  ">
            <div class="card ">
                <div class="card-content">
                    <div class="flex items-center align justify-center">
                        <div class="widget-label text-center">
                            <div class="image app relative aspect-w-7 aspect-h-10">
                                <img src="{{$suggestedUser->info->getProfileImage()}}" alt="{{$suggestedUser->name}} "
                                     class="brightness-50 w-full rounded-md shadow-md">
                                <div class="absolute bottom-0 left-0 p-8 text-left text-white">
                                    <h1 class="">
                                        {{ $suggestedUser->name }} <span class=" ml-2   align-middle"> {{ $suggestedUser->info->age }}</span>
                                    </h1>
                                    <div class=" text-lg location">
                                        <i class="mdi mdi-map-marker-outline "></i> <span> {{ $suggestedUser->info->location }}</span>
                                    </div>
                                    <p> {{ $suggestedUser->info->description }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="flex items-center justify-center p-5">
                        <div class="widget-label w-full text-center flex justify-center">
                            <form id="like-form" class="px-10" action="{{ route('user.app.like', ['id' => $suggestedUser->id ]) }}" method="post" >
                                @csrf
                                @method('put')

                                <x-button type="submit" class="my-4 block big shadow-md"> {{__('WOW')}}</x-button>
                            </form>
                            <a class="px-10" href="{{route('user.app')}}"><x-button class="my-4 block big shadow-md"> {{__('Meh')}}</x-button></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </x-slot>
</x-user-layout>
