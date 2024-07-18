<x-guest-layout>
<x-authentication-card>
<div class="container-xxl p">
    <div class="container">
        <div class="row g-0 gx-5 align-items-end">
                        <div class="col-sm-12 col-md-7 mx-auto" >
                        @session('status')
                            <div class="mb-4 font-medium text-sm text-green-600">
                                {{ $value }}
                            </div>
                        @endsession
        
                            <div class="bg-white border mt-2 rounded p-sm-5 mb-3 wow">
                                <form method="POST" action="{{ route('login') }}" >
                                    @csrf
                                    <h1 class="mx-auto text-center">Connexion</h1>

                                    <div class="row g-3">
                                        <div class="col-sm-12">
                                            <div class="form-floating">
                                            <label for="name">Identifiant ou email: <span class="red">*</span></label>
                                                <input type="text" class="form-control" 
                                                required name='email' value=""  placeholder="">
                                                
                                            </div>
                                        </div>

                                        <div class="col-sm-12 mt-3">
                                            <div class="form-floating">
                                            <label for="password">Mot de passe: <span class="red">*</span></label>
                                            <input type="password" class="form-control" required name='password' id="" 
                                            placeholder="">
                                            </div>
                                        </div>

                                        <div class="col-sm-12 mt-3 text-center">
                                            <button class="btn btn-primary w-50 py-3 " type="submit">
                                                Connexion
                                            </button> 
                                        </div>

                                        <div class="col-sm-12 text-center">
                                            <p class="mt-3">
                                                Mot de passe oublié ? <a href="{{ url('/')}}" class="text-blue">Cliquez ici</a>
                                            </p>

                                            <p class="mt-3">
                                                Pas encore de compte ? <a href="{{ url('/register')}}" class="text-blue">Inscription</a>
                                            </p>        
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
        </div>
    </div>
    </x-authentication-card>
    </x-guest-layout>
