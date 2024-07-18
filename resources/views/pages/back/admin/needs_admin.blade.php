<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tableau de bord') }}
        </h2>
    </x-slot>

    @include('pages/back/admin/menu')
    
    <div class="needs" id="needs_admin">
        <Needs_admin/>
    </div>
</x-app-layout>
