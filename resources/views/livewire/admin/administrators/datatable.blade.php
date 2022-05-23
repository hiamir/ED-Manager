<x-datatable.main>

    {{--    TOAST  --}}
    <x-datatable.toast></x-datatable.toast>

    {{--    ADD BUTTON  --}}
    <x-datatable.insert name="Add"></x-datatable.insert>

    {{--    DATATABLE FILTER --}}
    <x-datatable.filter></x-datatable.filter>

    {{--    DATATABLE  --}}
    <x-datatable.table :dataRecord="$records">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-100 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Full name
                </th>
                <th scope="col" class="px-6 py-3 text-center">
                    Email
                </th>
                <th scope="col" class="px-6 py-3 text-center">
                    Created on
                </th>
                <th scope="col" class="px-6 py-3 text-center">
                    Updated on
                </th>
                <th scope="col" class="px-6 py-3">
                    <span class="sr-only" type="button">Edit</span>
                </th>
            </tr>
            </thead>
            <tbody>


            @forelse ($records as $record)
                <tr class=" @if($loop->last)bg-white dark:bg-gray-800 @else bg-white border-b dark:bg-gray-800 dark:border-gray-700 @endif">
                    <th scope="row"
                        class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                        {{$record->name}}
                    </th>
                    <td class="px-6 py-4 text-center">
                        {{$record->email}}
                    </td>
                    <td class="px-6 py-4 text-center">
                        {{$record->created_at->diffForHumans()}}
                    </td>
                    <td class="px-6 py-4 text-center">
                        {{$record->updated_at->diffForHumans()}}
                    </td>

                    <td class="px-8 py-4 text-right space-x-2 overflow-hidden">
                        <x-datatable.password-icon wire:click="passwordButton('{{$record->id}}')"></x-datatable.password-icon>
                        <x-datatable.update-icon wire:click="editButton('{{$record->id}}')"></x-datatable.update-icon>
                        <x-datatable.delete-icon wire:click="deleteButton('{{$record->id}}')"></x-datatable.delete-icon>
                    </td>
                </tr>
            @empty
                <x-datatable.norecords name="Users" colspan="5"></x-datatable.norecords>
            @endforelse
            </tbody>
        </table>
    </x-datatable.table>

    {{--    ADD/UPDATE MODAL SIZE MD, Xl, 4XL, 7XL--}}
    <x-datatable.modal.modal header="{{$header}}" modalSize="{{$modalSize}}">
        @switch($modalType)
            @case ('add')
            @case ('update')
            <x-form wire:submit.prevent="submit" class="space-y-6" novalidate autocomplete="off">
                <div class="mt-4">
                    <x-label for="Full name" :value="__('Full name')"/>
                    <div class="relative">
                        <x-input name="name" placeholder="Enter your full name" wire:model.defer="admin.name"></x-input>
                    </div>
                    <x-forms.form-error field="admin.name"></x-forms.form-error>
                </div>

                <div class="mt-4">
                    <x-label for="email" :value="__('Email')"/>
                    <div class="relative">
                        <x-input name="email" placeholder="Enter your valid email-ID" wire:model.defer="admin.email"></x-input>
                    </div>
                    <x-forms.form-error field="admin.email" class="mb-0"></x-forms.form-error>
                </div>

                <x-forms.submit name="update" type="update">{{$modalType}}</x-forms.submit>

            </x-form>
            @break
        @endswitch

    </x-datatable.modal.modal>



    {{--    PASSWORD MODAL--}}
    @isset($record)

        <x-datatable.modal.confirmation icon="exclamation">

            @switch($modalType)
                @case ('delete')
                <x-form wire:submit.prevent="submit" class="space-y-6" novalidate autocomplete="off">
                    <x-datatable.modal.alert-icon></x-datatable.modal.alert-icon>
                    <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Are you sure you want to delete
                        <span class="font-semibold text-blue-500 dark:text-yellow-500">{{$record->name}}?</span></h3>

                    <x-forms.submit name="delete" type="delete" class="">Yes, I'm sure</x-forms.submit>

                    <x-forms.button @click="confirmModal=false" name="cancel" color="cancel" class="ml-3">No, cancel
                    </x-forms.button>
                </x-form>
            @break


                @case ('reset_password')

            <x-form wire:submit.prevent="submit" class="space-y-6" novalidate autocomplete="off">
                <x-datatable.modal.alert-icon></x-datatable.modal.alert-icon>

                <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">
                    Are you sure you want to reset password for <span class="font-semibold text-blue-500 dark:text-yellow-500">{{$record->name}}?</span>
                </h3>

                <x-forms.submit name="delete" type="delete" class="">Yes, I'm sure</x-forms.submit>

                <x-forms.button @click="confirmModal=false" name="cancel" color="cancel" class="ml-3">No, cancel
                </x-forms.button>
            </x-form>
                @break
            @endswitch
        </x-datatable.modal.confirmation>
    @endisset
</x-datatable.main>

