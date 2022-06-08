<x-admin-layout :user="$user">
    <x-slot name="content">
        <div class="card has-table">
            <header class="card-header">
                <p class="card-header-title">
                    <span class="icon"><i class="mdi mdi-account-multiple"></i></span>
                    {{ __('Matches') }}
                </p>
                <a href="{{url()->current()}}" class="card-header-icon" >
                    <span class="icon"><i class="mdi mdi-reload brr-reload"></i></span>
                </a>
            </header>
            <div class="card-content">
                <table>
                    <thead>
                    <tr>
                        <th></th>
                        <th> {{ __('User 1') }}</th>
                        <th></th>
                        <th>{{ __('User 2')  }} </th>
                        <th>{{ __('Species') }} </th>
                        <th>{{ __('Created') }} </th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($matches as $match)

                        @if (null != $match->userTwo->info && null != $match->userOne->info)
                            <tr>
                                <td class="image-cell">
                                    <div class="image">
                                        <img src="{{$match->userOne->info->getProfileImage()}}"
                                             class="rounded-full">
                                    </div>
                                </td>
                                <td data-label="Name">{{$match->userOne->name}}</td>

                                <td class="image-cell">
                                    <div class="image">
                                        <img src="{{$match->userTwo->info->getProfileImage()}}"
                                             class="rounded-full">
                                    </div>
                                </td>
                                <td data-label="Name">{{$match->userTwo->name}}</td>

                                <td data-label="Name">{{$match->userTwo->info->species}}</td>


                                <td data-label="Date">
                                    <small class="text-gray-500">{{$match->created_at}}</small>
                                </td>
                                <td class="actions-cell">
                                    <div class="buttons right nowrap">
                                        <button class="button small blue --jb-modal" data-target="sample-modal-2" type="button">
                                            <span class="icon"><i class="mdi mdi-eye"></i></span>
                                        </button>
                                        <button class="button small red --jb-modal" data-target="sample-modal" type="button">
                                            <span class="icon"><i class="mdi mdi-trash-can"></i></span>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        @endif
                    @endforeach
                    </tbody>
                </table>
                <div class="table-pagination">
                    <div class="table-pagination">
                        {{ $matches->links() }}
                    </div>
                </div>
            </div>
        </div>
    </x-slot>
</x-admin-layout>

