@props(['header','modalSize'])
<div x-data="{
    modalOpen:false,
    confirmModal:false,
    openModal: $wire.entangle('openModal'),
    toast:$wire.entangle('toastAlert.show'),
    toastShow: false
    }"

     x-init="
     modalOpen=openModal;
    $watch('toast',function(value){
         if(value.alert=='success' || value.alert=='danger'){
            toastShow=true;
            }
     });
     $watch('openModal',function(value){
         if(!value){
            modalOpen=false;
            }
    });
    "
class="flex flex-col w-full items-stretch xs:h-auto md:h-[calc(100%_-_60px)]"
{{--     style="--}}
{{--height: -o-calc(100% - 60px); /* opera */--}}
{{--height: -webkit-calc(100% - 60px); /* google, safari */--}}
{{--height: -moz-calc(100% - 60px); /* firefox */--}}
{{--"--}}
>

    {{$slot}}

{{--    <x-datatable.modal.Auth header="{{$header}}" modalSize="{{$modalSize}}">--}}
{{--        <x-datatable.relogin header="Re-authentication required."></x-datatable.relogin>--}}
{{--    </x-datatable.modal.Auth>--}}


    {{--    MODAL BACKDROP --}}
    <x-datatable.modal.backdrop></x-datatable.modal.backdrop>
</div>
