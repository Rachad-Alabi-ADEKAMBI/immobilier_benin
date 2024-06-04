<p class="text text-center">
                        Bonjour <strong><?= $_SESSION['user']['first_name'].' '.$_SESSION['user']['last_name']?>
                                </strong>
                    </p>
                    <div class="col-sm-12 text-center">
                                <div class="menu">
                                            <button class="btn btn-blue m-2" @click="displayNew()" v-if='!showNew'>
                                                Nouvelle annonce
                                            </button>

                                            <button class="btn btn-blue m-2" @click="displayAll()" v-if="!showAll && !showEdit">
                                                Mes annonces
                                            </button>


                                            <button class="btn btn-blue m-2" @click="displayNeeds()" v-if='!showNeeds'>
                                                Demandes clients
                                            </button>


                                            <button class="btn btn-blue m-2" @click="displayAccount()" v-if='!showAccount'>
                                                Mon compte
                                            </button>


                                </div>
                    </div>