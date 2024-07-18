<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Utilisateurs') }}
        </h2>
    </x-slot>

        @include('pages/back/admin/menu')

        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
    <!--my ads-->
    <div class="users" id="users">
        <Users/>
    </div>
</x-app-layout>
