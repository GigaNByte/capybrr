<x-admin-layout :user="$user">
    <x-slot name="content">
        <div class="card has-table">
            <header class="card-header">
                <p class="card-header-title">
                    <span class="icon"><i class="mdi mdi-account-multiple"></i></span>
                    {{ __('Users') }}
                </p>
                <a href="{{url()->current()}}" class="card-header-icon">
                    <span class="icon"><i class="mdi mdi-reload brr-reload"></i></span>
                </a>
            </header>
            <div class="card-content">
                <table>
                    <thead>
                    <tr>
                        <th></th>
                        <th> {{ __('Name') }}</th>
                        <th>{{ __('Gender') }} </th>
                        <th>{{ __('Age') }} </th>
                        <th>{{ __('Location') }} </th>
                        <th>{{ __('Relationship') }} </th>
                        <th>{{ __('Species') }} </th>
                        <th>{{ __('Interests') }} </th>
                        <th>{{ __('Created') }} </th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($users as $user)

                        @if (null != $user->info)
                        <tr>
                            <td class="image-cell">
                                <div class="image">
                                    <img src="{{$user->info->getProfileImage()}}"
                                         class="rounded-full">
                                </div>
                            </td>
                            <td data-label="Name">{{$user->name}}</td>
                            <td data-label="Gender">{{$user->info->gender}}</td>
                            <td data-label="Age">{{$user->info->age}}</td>
                            <td data-label="location">{{$user->info->location}}</td>
                            <td data-label="Relationship">{{$user->info->relationship}}</td>
                            <td data-label="Species">{{$user->info->species}}</td>
                            <td data-label="Interests">
                                @foreach ($user->interests as $interest)
                                    <i class="mdi {{$interest->icon}}"></i>
                                @endforeach
                            </td>
                            <td data-label="Created">
                                <small class="text-gray-500" >{{$user->created_at}}</small>
                            </td>
                            <td class="actions-cell">
                                <div class="buttons right nowrap">
                                    <form id="delete-form" method="post" action="{{ route('admin.user.delete',['id'=>$user->id]) }}">
                                        @csrf
                                        @method('DELETE')
                                        <button class="button small red --jb-modal" type="submit">
                                            <span class="icon"><i class="mdi mdi-trash-can"></i></span>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endif
                    @endforeach
                    </tbody>
                </table>

                <div class="table-pagination">
                    <x-auth-validation-errors class="my-5" :errors="$errors" />

                    @if (\Session::has('status'))
                        <div class="my-5">{{Session::get('status')}} </div>
                    @endif
                        {{ $users->links() }}
                </div>
            </div>
        </div>
    </x-slot>
</x-admin-layout>

