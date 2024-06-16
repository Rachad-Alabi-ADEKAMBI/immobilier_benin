                    <div class='col-12 mt-4 mx-auto data-wow-delay="0.5s"' v-if='showUsers' >
                         <h1 class="mx-auto text-center">
                            Utilisateurs ({{details.length}})
                         </h1>
                        
                         <div class="table-container">
                               <table>
                                    <thead>
                                                            <tr>
                                                            <th scope="col">Date</th>
                                                            <th scope="col">Email</th>
                                                            <th scope="col">Téléphone</th>
                                                            <th scope="col">Nom complet</th>
                                                            <th scope='col'>Photo</th>
                                                            <th scope='col'>Annonces</th>
                                                            <th scope='col'>Statut</th>
                                                            </tr>
                                    </thead>
                                                        <tbody>
                                                            <tr v-for='detail in paginatedData' :key='detail.id'>
                                                            <td data-label="Date">{{ formatDate(detail.date_of_insertion) }}</td>
                                                            <td data-label="Email">{{ detail.email }}  </td>
                                                            <td data-label="Phone">{{ detail.phone }}  </td>
                                                            <td data-label="Full name">{{ detail.first_name }} {{ detail.last_name}}  </td>
                                                             <td data-label="Photo">
                                                            <img :src='getImgUrl(detail.pic)'  v-if="detail.pic" alt="utilisateur immobilier benin">
                                                            <p class="text-danger" v-if="!detail.pic">
                                                                Non renseigné
                                                            </p>
                                                            </td>
                                                            <td data-label="Annonces" >{{ detail.ads }}</td>
                                                            <td data-label="Statut" > 
                                                                    <p class="text-success" v-if="detail.situation =='Disponible'">
                                                                            Validé
                                                                    </p>   
                                                                    
                                                                    <p class="text-warning" v-if="detail.situation =='Non disponible'">
                                                                           En pause
                                                                    </p>   
                                                                </td>
                                                            <td data-label="">

                                                <button class="btn btn-warning m-1 text-white" @click="pauseUser(detail.id)" 
                                                    v-if="detail.situation == 'Disponible'">
                                                    <i class="fa fa-pause m1-3 text-white "></i> Pause
                                                </button>

                                                <button class="btn btn-success  m-1" @click="authorizeUser(detail.id)"
                                                      v-if="detail.situation == 'Non disponible'" >
                                                      <i class="fa fa-play m1-3 text-white "></i> Autoriser
                                                </button>

                                                <button class="btn btn-danger m-1 text-white" @click="deleteUser(detail.id)">
                                                    <i class="fa fa-trash m1-3 text-white "></i> Supprimer
                                                </button>
                                            </td>
                                                            </tr>
                                                        </tbody>
                                </table>
                        </div>
                    </div>