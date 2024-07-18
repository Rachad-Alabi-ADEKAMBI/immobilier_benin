<x-app-layout>

<div class="container" id="ap">
        <div class="row g-0 gx-5 align-items-end">
                        <div class="col-sm-6 ">
                            <div class="text-start mx-auto text-center mb-5 wow slideInLeft" data-wow-delay="0.1s">
                                <h1 class="mx-auto mb-3">Liste des agents</h1>
                            </div>
                        </div>
        </div>
                    <div class="tab-content">
                        <div id="tab-1" class="tab-pane fade show p-0 active">
                            <div class="row g-2" >
                            @foreach($advertisers as $data)
                            <div class="property-item rounded overflow-hidden" >
                                        <div class="position-relative overflow-hidden text-center">
                                                <img class="img-fluid image" src="" alt="annonces immobilieres au Benin">
                                            
                                        </div>
                                        <div class="p-4 pb-0">
                                            <h5 class="text-blue mb-3">  {{ $data->first_name }}    {{ $data->last_name }}   </h5>
                                            <p class="d-block h5 mb-2" href="">
                                                {{ $data->ads }} annonce{{ $data->ads > 0 ? 's' : '' }}
                                            </a>
                                            <p>
                                                {{ $data->description }} 
                                                <br> <i class="bi bi-phone text-blue me-1"></i></i> {{ $data->phone }} 
                                            </p>
                                        </div>

                                    </div>
                            @endforeach     
                            </div>
                        </div>
                    </div>
    </div>

</x-app-layout>