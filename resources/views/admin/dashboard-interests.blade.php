<x-admin-layout :user="$user">
    <x-slot name="content">
        <div class="card has-table">
            <header class="card-header">
                <p class="card-header-title">
                    <span class="icon"><i class="mdi mdi-island"></i></span>
                    {{ __('Interests') }}
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
                        <th> {{ __('Interest icon') }}</th>
                        <th>{{ __('Interest ') }} </th>
                        <th> {{ __('Created By') }}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if ($interests !== null)
                        @foreach ($interests as $interest)

                            <tr>
                                <td class="image-cell ">
                                    <div class="image flex justify-center">


                                    </div>
                                </td>
                                <td data-label="Interest">

                                    <x-input form="update-form-{{$interest->id}}" id="name" class="block mt-1 w-full" type="text" name="name"
                                             :value="$interest->name" required
                                             autofocus/>
                                </td>
                                <td data-label="Icon Class">
                                    <x-input form="update-form-{{$interest->id}}" id="icon" class="block mt-1 w-full" type="text" name="icon"
                                             :value="$interest->icon" required
                                             autofocus/>
                                </td>
                                <td data-label="Created">
                                    <small class="text-gray-500">{{$user->created_at}}</small>
                                </td>
                                <td class="actions-cell">
                                    <div class="buttons right nowrap">
                                        <form id="update-form-{{$interest->id}}" method="post"
                                              action="{{ route('admin.interest.update',['id'=>$interest->id]) }}">
                                            @csrf
                                            @method('PUT')
                                            <button class="button small blue --jb-modal" type="submit">
                                                <span class="icon"><i class="mdi mdi-pencil-outline"></i></span>
                                            </button>
                                        </form>
                                        <form id="delete-form-{{$interest->id}}" method="post"
                                              action="{{ route('admin.interest.delete',['id'=>$interest->id]) }}">
                                            @csrf
                                            @method('DELETE')
                                            <button class="button small red --jb-modal" type="submit">
                                                <span class="icon"><i class="mdi mdi-trash-can"></i></span>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>

                        @endforeach
                    </tbody>
                </table>
                @endif
                @if ($interests !== null)
                    <div class="table-pagination">
                        {{ $interests->links() }}
                    </div>
                @endif
            </div>
        </div>

        <form id="interest-form" method="post" action="{{ route('admin.interest.create') }}">
            @csrf
            @method('post')
            <div class="card has-table my-5">
                <header class="card-header">
                    <p class="card-header-title">
                        <span class="icon"><i class="mdi mdi-island"></i></span>
                        {{ __('Add Interest') }}
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
                            <th>
                                <label for="name">{{__('Interest')}}</label>
                            </th>
                            <th>

                                <label for="name">{{__('Icon Class')}}</label>
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td class="image-cell ">
                                <div class="image flex justify-center">
                                    <i class="mdi"></i>
                                </div>
                            </td>
                            <td data-label="Interest Name" class=" pr-10">
                                <x-input id="name" class="block mt-1 w-full " type="text" name="name"
                                         :value="old('name')" required
                                         autofocus></x-input>
                            </td>
                            <td data-label="Icon Class" class=" pr-10">
                                <x-input id="icon" class="block mt-1 w-full" type="text" name="icon"
                                         :value="old('icon')" required
                                         autofocus></x-input>
                            </td>
                            <td class="actions-cell">
                                <div class="buttons right nowrap">
                                    <x-button type="submit">
                                        <span class="icon"><i class="mdi mdi-plus mdi-24px"></i></span>
                                    </x-button>
                                </div>
                            </td>
                        </tr>
                        </tbody>
                    </table>

                    <div class="table-pagination">
                        <x-auth-validation-errors class="my-5" :errors="$errors"/>

                        @if (\Session::has('status'))
                            <div class="my-5">{{Session::get('status')}} </div>
                        @endif

                    </div>
                </div>
            </div>
        </form>
        {!! JsValidator::formRequest('App\Http\Requests\CreateInterestRequest', '#interest-form'); !!}
    </x-slot>
</x-admin-layout>

