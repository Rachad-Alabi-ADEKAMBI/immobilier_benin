<div class='col-sm-12 col-md-12  mt-4 mx-auto' data-wow-delay="0.5s" v-if='showAll' >
                         <h1 class="mx-auto text-center">
                            Gestion ({{ this.details.length}})
                         </h1>

                         <p class="text text-bold text-grey text-center" v-if='details.length == 0 '>
                            Vous n'avez publié aucune annonce pour l'instant
                         </p>

                        <div class="mt-2table-container" v-if='details.length > 0'>
                                <table>
                                    <thead>
                                        <tr>
                                            <th>Nom</th>
                                            <th>Prix</th>
                                            <th>Statut</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr v-for='detail in paginatedData' :key='detail.id'>
                                            <td data-label="Date"> {{ formatDate(detail.date_of_insertion) }} </td>
                                            <td data-label="Nom">{{ capitalizeFirstLetter(detail.name) }}</td>
                                            <td data-label="Ville">{{ detail.location }} </td>
                                            <td data-label="Prix"> {{ format(detail.price) }} XOF </td>
                                          </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>