<div class="col-12 text-center">
                                    <nav aria-label="Page navigation mx-auto text-center">
                                        <ul class="pagination">
                                            <li class="page-item" :class="{ 'disabled': currentPage === 1 }">
                                            <a class="page-link" href="#" @click.prevent="previousPage">Précédent</a>
                                            </li>
                                            <li class="page-item" v-for="page in totalPages" :key="page" :class="{ 'active': 
                                                page === currentPage }">
                                            <a class="page-link" href="#" @click.prevent="gotoPage(page)">{{ page }}</a>
                                            </li>
                                            <li class="page-item" :class="{ 'disabled': currentPage === totalPages }">
                                            <a class="page-link" href="#" @click.prevent="nextPage">Suivant</a>
                                            </li>
                                        </ul>
                                    </nav>
                    </div>