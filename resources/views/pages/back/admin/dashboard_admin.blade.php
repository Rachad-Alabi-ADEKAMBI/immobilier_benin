<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tableau de bord Admin') }}
        </h2>
    </x-slot>

        @include('pages/back/admin/menu')

        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
    <!--my ads-->
    <div class="allads" id="allads">
        <AllAds/>
    </div>
</x-app-layout>
