<p class="text text-center">
                        Bonjour <strong><?= $_SESSION['user']['first_name'].' '.$_SESSION['user']['last_name']?>
                                </strong>
                    </p>
                    <div class="col-sm-12 text-center">
                                <div class="menu">
                                            <button class="btn btn-blue m-2" @click="displayNew()" v-if='!showNew'>
                                            <i class="fas fa-plus   "></i> Nouvelle annonce
                                            </button>

                                            <button class="btn btn-blue m-2" @click="displayAll()" v-if="!showAll && !showEdit">
                                            <i class="fas fa-list"></i> Mes annonces
                                            </button>


                                            <button class="btn btn-blue m-2" @click="displayNeeds()" v-if='!showNeeds'>
                                            <i class="fas fa-user"></i> Demandes clients
                                            </button>


                                            <button class="btn btn-blue m-2" @click="displayAccount()" v-if='!showAccount'>
                                            <i class="fas fa-user"></i> Mon compte
                                            </button>


                                </div>
                    </div>