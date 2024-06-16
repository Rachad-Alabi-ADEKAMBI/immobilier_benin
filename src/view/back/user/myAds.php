<div class='col-sm-12 col-md-12  mt-4 mx-auto' data-wow-delay="0.5s" v-if='showAll' >
                         <h1 class="mx-auto text-center">
                            Mes annonces ({{ this.details.length}})
                         </h1>

                         <p class="text text-bold text-grey text-center" v-if='details.length == 0 '>
                            Vous n'avez publié aucune annonce pour l'instant
                         </p>

                        <div class="mt-2table-container" v-if='details.length > 0'>
                                <table>
                                    <thead>
                                        <tr>
                                            <th>Date</th>
                                            <th>Nom</th>
                                            <th>Ville</th>
                                            <th>Prix</th>
                                            <th>Image</th>
                                            <th>Statut</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr v-for='detail in paginatedData' :key='detail.id'>
                                            <td data-label="Date"> {{ formatDate(detail.date_of_insertion) }} </td>
                                            <td data-label="Nom">{{ capitalizeFirstLetter(detail.name) }}</td>
                                            <td data-label="Ville">{{ detail.location }} </td>
                                            <td data-label="Prix"> {{ format(detail.price) }} XOF </td>
                                            <td data-label="Image">
                                                <img :src='getImgUrl(detail.pic1)' alt="">
                                            </td>
                                            <td data-label="Statut" > 
                                                <p class="text-success" v-if="detail.situation =='Disponible'">
                                                        {{ detail.situation }}
                                                </p>  
                                                
                                                <p class="text-danger" v-if="detail.situation =='Stop'">
                                                        Désactivé par l'administrateur
                                                </p> 
                                                
                                                <p class="text-warning" v-if="detail.situation =='Non disponible'">
                                                        {{ detail.situation }}
                                                </p>   
                                            </td>
                                           
                                            <td data-label="">

                                                <button class="btn btn-warning m-1 text-white" @click="pause(detail.id)" 
                                                    v-if="detail.situation == 'Disponible'">
                                                    <i class="fa fa-pause m1-3 text-white "></i> Pause
                                                </button>

                                                <button class="btn btn-success  m-1" @click="play(detail.id)"
                                                      v-if="detail.situation == 'Non disponible'" >
                                                      <i class="fa fa-play m1-3 text-white "></i> Publier
                                                </button>

                                                <button class="btn btn-info m-1 text-white" @click="displayEdit(detail.id)">
                                                <i class="fa fa-pen m1-3 text-white "></i> Modifier
                                                </button>


                                                <button class="btn btn-danger m-1" @click="remove(detail.id)" >
                                                    <i class="fa fa-trash m1-3 text-white "></i> Supprimer
                                                </button>

                                                <span @click="goToProperty(detail.id)">
                                                <i class="fa fa-eye me-3 text-blue"></i>
                                                </span>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>