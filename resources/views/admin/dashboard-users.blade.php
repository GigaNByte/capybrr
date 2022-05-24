<x-admin-layout :user="$user">
    <x-slot name="content">
        <div class="card has-table">
            <header class="card-header">
                <p class="card-header-title">
                    <span class="icon"><i class="mdi mdi-account-multiple"></i></span>
                    {{ __('Users') }}
                </p>
                <a href="#" class="card-header-icon">
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
                        <th>{{ __('Created') }} </th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($users as $user)

                        @if (null != $user->info)
                        <tr>
                            <td class="image-cell">
                                <div class="image">
                                    <img src="{{$user->info->getPicture()}}"
                                         class="rounded-full">
                                </div>
                            </td>
                            <td data-label="Name">{{$user->name}}</td>
                            <td data-label="Gender">{{$user->info->gender}}</td>
                            <td data-label="Age">{{$user->info->age}}</td>
                            <td data-label="location">{{$user->info->location}}</td>
                            <td data-label="Relationship">{{$user->info->Relationship}}</td>
                            <td data-label="Species">{{$user->info->Species}}</td>
                            <td data-label="Created">
                                <small class="text-gray-500" title="Oct 25, 2021">{{$user->timestamp}}</small>
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
                    <div class="flex items-center justify-between">
                        <div class="buttons">
                            <button type="button" class="button active">1</button>
                            <button type="button" class="button">2</button>
                            <button type="button" class="button">3</button>
                        </div>
                        <small>Page 1 of 3</small>
                    </div>
                </div>
            </div>
        </div>
    </x-slot>
</x-admin-layout>

