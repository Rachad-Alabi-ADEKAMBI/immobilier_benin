<div class='col-sm-12 col-md-12 mt-4 mx-auto data-wow-delay="0.5s"' v-if='showAll' >
                         <h1 class="mx-auto text-center">
                            Toutes les annonces <span>({{ details.length }})</span>
                         </h1>
                        <div class="mt-2table-container">
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
                                            <td data-label="Nom"> {{ detail.name }}</td>
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
                                                        {{ detail.situation }}
                                                </p>   

                                                <p class="text-warning" v-if="detail.situation =='Non disponible'">
                                                        {{ detail.situation }}
                                                </p>   
                                            </td>
                                            <td data-label="">
                                                <button class="btn btn-danger text-white m-1" @click='stop(detail.id)' 
                                                v-if="detail.situation =='Disponible'">
                                                    <i class="fa fa-stop m-1 text-white"></i> Stop
                                                </button>

                                                <button class="btn btn-success text-white m-1" @click='publish(detail.id)'
                                                v-if="detail.situation =='Stop'">
                                                    <i class="fa fa-play me-1 text-white"></i> Valider
                                                </button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>