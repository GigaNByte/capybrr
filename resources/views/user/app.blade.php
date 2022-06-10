<x-user-layout :user="$user">
    <x-slot name="content">

        @if ($errors->any() or session('status'))
            <div class="flex">
                <div class="card basis-full m-auto my-10">
                    <div class="card-content items-center">
                        <p class="text-gray-500 text-2xl">

                            <x-auth-session-status class=" text-2xl text-pink font-['Montserrat']" :status="session('status')"/>

                            <!-- Validation Errors -->
                            <x-auth-validation-errors class="mb-4" :errors="$errors"/>
                        </p>
                    </div>
                </div>
            </div>
        @endif


        @if ( $suggestedUser )
        <div class="flex justify-center mb-20 mt-0 lg:mt-20  ">
            <div class="card ">
                <div class="card-content">
                    <div class="flex items-center align justify-center">
                        <div class="widget-label text-center">
                            <div class="image app relative aspect-w-7 aspect-h-10">
                                <img src="{{$suggestedUser->info->getProfileImage()}}" alt="{{$suggestedUser->name}} "
                                     class="brightness-50 w-full rounded-md shadow-md">
                                <div class="absolute bottom-0 left-0 p-5 text-left text-white">
                                    <h1 class="">
                                        {{ $suggestedUser->name }} <span class=" ml-2   align-middle"> {{ $suggestedUser->info->age }}</span>
                                    </h1>
                                    <p> {{ $suggestedUser->info->relationship }}</p>
                                    <div class=" text-lg location">
                                        <i class="mdi mdi-map-marker-outline "></i> <span> {{ $suggestedUser->info->location }}</span>
                                    </div>
                                    <p> {{ $suggestedUser->info->description }}</p>

                                    <div class="interests">
                                        @foreach ($suggestedUser->interests as $interest)
                                            <i class="mdi {{$interest->icon}}"></i> <span> {{ $interest->name }}</span>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="flex items-center justify-center p-5">
                        <div class="widget-label w-full text-center flex justify-center">
                            <form id="app-like-form-{{$suggestedUser->id}}" class="px-10" action="{{ route('user.app.like',  $suggestedUser->id ) }}" method="post" >
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
        @else
            <div class="card basis-full lg:basis-1/4 m-auto my-10">
                <div class="card-content">
                    <div class="flex items-center align justify-center p-5">
                        <div class="widget-label text-center">
                            <div class="image profile ">
                                <x-icon-capybara></x-icon-capybara>
                            </div>
                            <h1 class="text-pink ">
                                <span> {{ __('You liked all Capybaras!') }}
                            </h1>
                        </div>
                    </div>
                    <div class="flex items-center justify-center p-5">
                        <div class="widget-label text-center">
                            <p>{{__('Try to explore your likes and matches!')}}</p>
                            <a href="{{route('user.dashboard.matches')}}">
                                <x-button class="my-4  big"> {{__('Jump in')}}</x-button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </x-slot>
</x-user-layout>
