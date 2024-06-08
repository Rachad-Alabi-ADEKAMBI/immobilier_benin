<div class="col-sm-12 mt-1 text-center">
                                <div class="menu">
                                            <button class="btn btn-blue m-2" @click="displayAll()" v-if='!showAll'>
                                            <i class="fas fa-list"></i> Annonces
                                            </button>

                                            <button class="btn btn-blue m-2" @click="displayUsers()" v-if='!showUsers'>
                                            <i class="fas fa-list"></i> Utilisateurs
                                            </button>

                                            <button class="btn btn-blue m-2" @click="displayNeeds()" v-if='!showNeeds'>
                                            <i class="fas fa-question"></i> Demandes
                                            </button>
                                </div>
                    </div>