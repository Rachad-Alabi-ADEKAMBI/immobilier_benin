<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tableau de bord') }}
        </h2>
    </x-slot>

    @include('pages/back/user/menu')
    
    <div class="needs" id="needs">
        <Needs/>
    </div>
</x-app-layout>
