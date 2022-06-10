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

        <div class="flex my-10">
            <div class="card basis-full m-auto">
                <div class="card-content">
                    <h1 class="text-pink text-2xl">
                        {{__('Your Matches')}}
                    </h1>
                </div>
            </div>
        </div>
        <div class="flex flex-wrap">
            @if($matches && $matches->isNotEmpty())
                @foreach ($matches as $match)
                    <div class="card basis-full sm:basis-1/2 lg:basis-1/3 m-auto my-10">
                        <div class="card-content">
                            <div class="flex items-center align justify-center p-5">
                                <div class="widget-label text-center">
                                    <div class="image profile ">
                                        <img
                                            src="{{$match->getUserRelatedWithUserId($user->id)->info->getProfileImage()}}"
                                            alt="{{$match->getUserRelatedWithUserId($user->id)->name}}"
                                            class="rounded-full">
                                    </div>
                                    <h1 class="text-pink ">
                                        <span class> {{ $match->getUserRelatedWithUserId($user->id)->name }}
                                    </h1>
                                </div>
                            </div>
                            <div class="flex  items-center justify-center ">
                                <div class="widget-label text-center">

                                    <p class="mb-5">{{$match->getUserRelatedWithUserId($user->id)->info->description}}</p>


                                    <div class="flex justify-center">
                                        <i class="mdi mdi-email mdi-24px pr-2"></i>
                                        <p> {{$match->getUserRelatedWithUserId($user->id)->email}}</p>
                                    </div>
                                    <div class="flex justify-center">
                                        <i class="mdi mdi-heart mdi-24px  pr-2"></i>
                                        <p> {{$match->getUserRelatedWithUserId($user->id)->info->relationship}}</p>
                                    </div>
                                    <div class="flex  justify-center" >
                                        <i class="mdi mdi-map-marker mdi-24px  pr-2"></i>
                                        <p> {{$match->getUserRelatedWithUserId($user->id)->info->location}}</p>
                                    </div>
                                    <div class="flex justify-center">
                                        <i class="mdi mdi-phone mdi-24px  pr-2"></i>
                                        <p> {{$match->getUserRelatedWithUserId($user->id)->info->phone}}</p>
                                    </div>
                                            <form id="like-form" class="px-10"
                                                  action="{{route('user.app.unlike',['id' => $match->getUserRelatedWithUserId($user->id)->id])}}"
                                                  method="post">
                                                @csrf
                                                @method('put')
                                                <x-button type="submit"
                                                          class="my-4 big max-w-5r"> {{__('Unlike')}}</x-button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach

                            @else
                                <div class="card basis-full lg:basis-1/4 m-auto my-10">
                                    <div class="card-content">
                                        <div class="flex items-center align justify-center p-5">
                                            <div class="widget-label text-center">
                                                <div class="image profile ">
                                                    <x-icon-capybara></x-icon-capybara>
                                                </div>
                                                <h1 class="text-pink ">
                                                    <span> {{ __('No More matches found') }}
                                                </h1>
                                            </div>
                                        </div>
                                        <div class="flex items-center justify-center p-5">
                                            <div class="widget-label text-center">
                                                <p>{{__('Try to jump in and find more matches!')}}</p>
                                                <a href="{{route('user.app')}}">
                                                    <x-button class="my-4  big"> {{__('Jump in')}}</x-button>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif



                        </div>
            @if($matches && $matches->isNotEmpty())
                <div class="table-pagination  m-10">
                    <div class="table-pagination">
                        {{ $matches->links() }}
                    </div>
                </div>
            @endif
                        <div class="flex">
                            <div class="card basis-full m-auto">
                                <div class="card-content">
                                    <h1 class="text-pink text-2xl">
                                        {{__('Your Likes')}}
                                    </h1>
                                </div>
                            </div>
                        </div>
                        <div class=" flex flex-wrap">
                            @if ( $liked->isNotEmpty())
                                @foreach ($liked as $like)
                                    <div class="card basis-full sm:basis-1/2 lg:basis-1/3 m-auto my-10">
                                        <div class="card-content">
                                            <div class="flex items-center align justify-center p-5">
                                                <div class="widget-label text-center">
                                                    <div class="image profile ">
                                                        <img
                                                            src="{{$like->getUserRelatedWithUserId($user->id)->info->getProfileImage()}}"
                                                            alt="{{$like->getUserRelatedWithUserId($user->id)->name}}"
                                                            class="rounded-full">
                                                    </div>
                                                    <h1 class="text-pink ">
                                                        <span
                                                            class> {{ $like->getUserRelatedWithUserId($user->id)->name }}
                                                    </h1>
                                                </div>
                                            </div>

                                            <div class="flex items-center justify-center ">
                                                <div class="widget-label text-center">
                                                    <p>{{$like->getUserRelatedWithUserId($user->id)->info->description}}</p>
                                                    <div class="flex  justify-center my-4" >
                                                        <i class="mdi mdi-map-marker mdi-24px  pr-2"></i>
                                                        <p> {{$like->getUserRelatedWithUserId($user->id)->info->location}}</p>
                                                    </div>
                                                    <form id="like-form" class="px-10"
                                                          action="{{route('user.app.unlike',['id'  => $like->getUserRelatedWithUserId($user->id)->id])}}"
                                                          method="post">
                                                        @csrf
                                                        @method('put')
                                                        <x-button type="submit"
                                                                  class="my-4 big max-w-5r"> {{__('Unlike')}}</x-button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                @endforeach

                            @else
                                <div class="card basis-1/4 m-auto my-10">
                                    <div class="card-content">
                                        <div class="flex items-center align justify-center p-5">
                                            <div class="widget-label text-center">
                                                <div class="image profile ">
                                                    <x-icon-capybara></x-icon-capybara>
                                                </div>

                                                <h1 class="text-pink ">
                                                    <span> {{ __('No More likes found') }}
                                                </h1>
                                            </div>
                                        </div>
                                        <div class="flex items-center justify-center p-5">
                                            <div class="widget-label text-center">
                                                <p>{{__('Try to jump in and like someone!')}}</p>
                                                <a href="{{route('user.app')}}">
                                                    <x-button class="my-4  big"> {{__('Jump in')}}</x-button>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>
                    @if($liked->isNotEmpty())
                        <div class="table-pagination m-10">
                            <div class="table-pagination">
                                {{ $liked->links() }}
                            </div>
                        </div>
                    @endif
    </x-slot>
</x-user-layout>

