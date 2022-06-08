<x-user-layout :user="$user">
    <x-slot name="content">
        <div class="flex justify-center my-20 ">
            <div class="card">
                <div class="card-content">
                    <div class="flex items-center align justify-center p-5">
                        <div class="widget-label text-center">

                            <div class="image profile ">

                                <img id="profile-image-preview" src="{{$user->info->getProfileImage()}}"
                                     alt="{{$user->name}}"
                                     class="rounded-full w-full">
                            </div>
                            <div class="text-center upload">
                                <form id="form-update-image" action="{{ route('user.updateProfileImage') }}"
                                      enctype="multipart/form-data" method="post">
                                    @csrf
                                    @method('put')
                                    <div>
                                        <label>
                                            <input id="profile-image-input" type="file" name="picture" class="hidden"
                                                   onchange="this.form.submit();document.getElementById('profile-image-preview').src = window.URL.createObjectURL(this.files[0])"
                                                   required="" multiple>
                                            <a class="input-image-link">{{__("Change image")}}</a>
                                        </label>
                                        @if (\Session::has('status'))
                                            <div>{{Session::get('status')}} </div>
                                        @endif

                                    </div>
                                </form>
                                {!! JsValidator::formRequest('App\Http\Requests\UpdateUserProfileImageRequest', '#form-update-image'); !!}
                            </div>
                            <h1 class="text-pink mt-5">
                                <span class> {{ $user->name }}
                            </h1>
                            <div id="joined">Joined {{ $user->created_at->format('d M Y') }}</div>
                        </div>
                    </div>
                    <div class="flex items-center justify-between p-5">
                        <div class="widget-label text-center">
                            <h3>{{__('Your Account Details')}}</h3>
                            <x-auth-validation-errors class="my-5" :errors="$errors"/>

                            <form id="update-form" class="my-10" method="POST" action="{{ route('user.updateInfo') }}">
                            @method('post')
                            @csrf

                            <!-- Name -->
                                <div class="form-group">
                                    <x-label for="name" :value="__('Name')"/>

                                    <x-input id="name" class="block mt-1 w-full" type="text" name="name"
                                             :value="$user->name" required
                                             autofocus/>

                                </div>
                                <!-- Email Address -->
                                <div class="mt-4 form-group">
                                    <x-label for="email" :value="__('Email')"/>

                                    <x-input id="email" class="block mt-1 w-full" type="email" name="email"
                                             :value="$user->email" required/>

                                </div>



                                <div class="mt-4 form-group">
                                    <x-label for="phone" :value="__('Phone')"/>

                                    <x-input id="phone" class="block mt-1 w-full" type="text" name="phone"
                                             :value="$user->info->phone" required
                                             autofocus/>
                                </div>

                                <div class="mt-4 form-group">
                                    <x-label for="location" :value="__('Location')"/>

                                    <x-input id="location" class="block mt-1 w-full" type="text" name="location"
                                             :value="$user->info->location"
                                             required autofocus/>
                                </div>
                                <div class="mt-4 form-group">
                                    <x-label for="gender" :value="__('Gender')"/>

                                    <select id="gender" class=" form-select block mt-1 w-full" type="text" name="gender"
                                            :value="$user->info->gender" required autofocus>
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                    </select>
                                </div>
                                <div class="mt-4 form-group">
                                    <x-label for="age" :value="__('Age')"/>

                                    <x-input id="age" class="block mt-1 w-full" type="number" name="age"
                                             :value="$user->info->age" required
                                             autofocus/>
                                </div>
                                <div class="mt-4 form-group">
                                    <x-label for="relationship" :value="__('Relationship status')"/>
                                    <select id="relationship" class=" form-select block mt-1 w-full" type="text"
                                            name="relationship"
                                            :value="$user->info->relationship" required autofocus>
                                        <option value="Single">Single</option>
                                        <option value="Complicated">Complicated</option>
                                        <option value="Taken">Taken</option>
                                        <option value="Married">Married</option>
                                    </select>
                                </div>
                                <div class="mt-4 form-group full">
                                    <x-label for="description" class="block" :value="__('Your profile description')"/>
                                    <textarea id="description" class="block form-textarea mt-1 w-full" name="description"  value="{{$user->info->description}}" required autofocus>{{$user->info->description}}</textarea>
                                </div>

                                <h3 class="my-10">{{__("Change Password")}}</h3>
                                <!-- Password -->
                                <div class="mt-4 form-group">
                                    <x-label for="password" :value="__('Password')"/>

                                    <x-input id="password" class="block mt-1 w-full"
                                             type="password"
                                             name="password"
                                              autocomplete="new-password"/>
                                </div>

                                <!-- Confirm Password -->
                                <div class="mt-4 form-group">
                                    <x-label for="password_confirmation" :value="__('Confirm Password')"/>

                                    <x-input id="password_confirmation" class="block mt-1 w-full"
                                             type="password"
                                             name="password_confirmation" />
                                </div>

                                <div class="flex items-center justify-end mt-4">
                                    <x-button class="my-8 big "> {{__('Update profile')}}</x-button>
                                </div>
                            </form>
                            {!! JsValidator::formRequest('App\Http\Requests\UpdateUserInfoRequest', '#update-form'); !!}


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </x-slot>
</x-user-layout>
