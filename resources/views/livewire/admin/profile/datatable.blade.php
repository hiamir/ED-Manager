<x-datatable.main header="{{$header}}" modalSize="{{$modalSize}}">
    {{--    TOAST  --}}
    <x-datatable.toast></x-datatable.toast>



    {{--    DATATABLE  --}}
    <div
        x-data="{
            tab:$wire.entangle('tabContent'),
            modalOpen:true
            }"
        x-init="
            $watch('tab',function(value){
                this.tab=value;
            });
        "

        class="flex flex-col h-full w-full items-stretch"
    >

    <div class="flex  w-full border-b border-gray-200 dark:border-gray-700">
        <ul class="flex flex-wrap -mb-px text-sm font-medium text-center text-gray-500 dark:text-gray-400">
            <li wire:click.prevent="openTab(1)" class="mr-2 cursor-pointer">
                <a
                   :class="(tab===1) ? 'active border-b-2 text-blue-600 border-blue-600 dark:text-blue-500 dark:border-blue-500':'hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300'"
                   class="inline-flex p-4 rounded-t-lg border-b-2 border-transparent  group">
                    <svg
                        :class="(tab===1) ? 'text-blue-600 dark:text-blue-500': 'group-hover:text-gray-500 dark:group-hover:text-gray-300'"
                        class="mr-2 w-5 h-5  dark:text-gray-500 " fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                              d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-6-3a2 2 0 11-4 0 2 2 0 014 0zm-2 4a5 5 0 00-4.546 2.916A5.986 5.986 0 0010 16a5.986 5.986 0 004.546-2.084A5 5 0 0010 11z"
                              clip-rule="evenodd"></path>
                    </svg>
                    Profile

                </a>
            </li>
            <li wire:click.prevent="openTab(2)"  class="mr-2 cursor-pointer">
                <a :class="(tab===2) ? 'active border-b-2 text-blue-600 border-blue-600 dark:text-blue-500 dark:border-blue-500':'hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300 '"
                   class="inline-flex p-4 rounded-t-lg border-b-2 border-transparent group" aria-current="page">
                    <svg xmlns="http://www.w3.org/2000/svg"
                         :class="(tab===2) ? 'text-blue-600 dark:text-blue-500': 'group-hover:text-gray-500 dark:group-hover:text-gray-300'"
                         class="mr-2 w-5 h-5 dark:text-gray-500  " viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd"
                              d="M18 8a6 6 0 01-7.743 5.743L10 14l-1 1-1 1H6v2H2v-4l4.257-4.257A6 6 0 1118 8zm-6-4a1 1 0 100 2 2 2 0 012 2 1 1 0 102 0 4 4 0 00-4-4z"
                              clip-rule="evenodd"/>
                    </svg>
                    Password

                </a>
            </li>

        </ul>
    </div>

    <div class="tab-content flex h-full pt-8 pb-4" id="tabs-tabContent">
        <div x-show="tab===1" class="flex flex-wrap py-4 xs:w-full h-full tab-pane fade show  items-center justify-center" id="tabs-home" role="tabpanel"
             aria-labelledby="tabs-home-tab">


            <div
                class="flex flex-col p-4 xs:w-full w-md-[50%] max-w-md bg-white rounded-lg border border-gray-200 shadow-md sm:p-6 lg:p-8 dark:bg-gray-800 dark:border-gray-700">
                <div class="flex justify-center">
                    <img src="{{asset('storage/images/profile.svg')}}" class="mb-5 h-[200px] self-center" alt="">
                </div>


                <x-form wire:submit.prevent="submit" class="space-y-6" novalidate autocomplete="on">
                    <div class="mt-0">
                        <x-label for="name" :value="__('Full name')"/>
                        <div class="relative">
                            <x-input name="name" type="name" placeholder="Enter your Full name" autocomplete="on"
                                     wire:model.defer="user.name"></x-input>
                        </div>
                        <x-forms.form-error field="user.name"></x-forms.form-error>
                    </div>

                    <div class="mt-4">
                        <x-label for="email" :value="__('Current password')"/>
                        <div class="relative">
                            <x-forms.input-disabled name="email" type="name" placeholder="Enter your email ID" autocomplete="on"
                                     wire:model.defer="user.email" ></x-forms.input-disabled>
                        </div>
                        <x-forms.form-error field="user.email"></x-forms.form-error>
                    </div>


                    <x-forms.submit name="update" class="mt-6" type="update">Update Profile</x-forms.submit>

                </x-form>

            </div>



        </div>
        <div x-show="tab===2" class="flex flex-wrap py-4 xs:w-full h-full tab-pane fade show  items-center justify-center" id="tabs-profile"
             role="tabpanel" aria-labelledby="tabs-profile-tab">

            <div
                class="p-4 xs:w-full w-md-[50%] max-w-md bg-white rounded-lg border border-gray-200 shadow-md sm:p-6 lg:p-8 dark:bg-gray-800 dark:border-gray-700">
                <div class="flex justify-center">
                <img src="{{asset('storage/images/password.svg')}}" class="mb-5 h-[200px] self-center" alt="">
                </div>


                <x-form wire:submit.prevent="submit" class="space-y-6" novalidate autocomplete="on">
                    <div class="mt-0">
                        <x-label for="Current password" :value="__('Current password')"/>
                        <div class="relative">
                            <x-input name="current_password" type="password" placeholder="Enter your current password" autocomplete="on"
                                     wire:model.defer="auth.current_password"></x-input>
                        </div>
                        <x-forms.form-error field="auth.current_password"></x-forms.form-error>
                    </div>

                    <div class="mt-4">
                        <x-label for="New password" :value="__('New password')"/>
                        <div class="relative">
                            <x-input name="password" type="password" placeholder="Enter new password" autocomplete="on"
                                     wire:model.defer="auth.password"></x-input>
                        </div>
                        <x-forms.form-error field="auth.password"></x-forms.form-error>
                    </div>

                    <div class="mt-4">
                        <x-label for="Confirm password" :value="__('Confirm password')"/>
                        <div class="relative">
                            <x-input name="password_confirmation" type="password" autocomplete="on"
                                     placeholder="Re-enter your new password"
                                     wire:model.defer="auth.password_confirmation"></x-input>
                        </div>
                        <x-forms.form-error field="auth.password_confirmation"></x-forms.form-error>
                    </div>

                    <x-forms.submit name="update" class="mt-6" type="update">Change Password</x-forms.submit>

                </x-form>

            </div>
        </div>
    </div>
    </div>


{{--    --}}{{--    FORM --}}
{{--    <x-datatable.modal.modal header="{{$header}}" size="{{$modalSize}}">--}}
{{--       <x-datatable.relogin header="Re-authentication required."></x-datatable.relogin>--}}
{{--    </x-datatable.modal.modal>--}}




    {{--    DELETE MODAL--}}
    @isset($record)
        <x-datatable.modal.confirmation name="{{$record->name}}" icon="exclamation"> </x-datatable.modal.confirmation>
    @endisset
</x-datatable.main>

