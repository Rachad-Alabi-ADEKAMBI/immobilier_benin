<template>
  <section class="container xxl">
    <div class='col-sm-12 col-md-12 mt-4 mx-auto' data-wow-delay="0.5s">
      <div class='col-12 mt-4 mx-auto' data-wow-delay="0.5s">
        <h1 class="mx-auto text-center" v-if="showAll">
          Liste des utilisateurs ({{ details.length }})
        </h1>
        <h1 class="mx-auto text-center" v-if="showFiltered">
          Résultats de la recherche ({{ filteredResults.length }})
        </h1>
        <div class="table-top" v-if="showAll || showFiltered">
          <div class="search-menu right r-0">
            <input type="search" v-model="searchKey" @input="handleInput">
            <span class="ml-2 open" v-if="!isSearching">
              <i class="bi bi-search"></i>
            </span>
            <span @click="clearSearch" class="close" v-if="isSearching">
              <i class="bi bi-x"></i>
            </span>
          </div>
        </div>
        <div class="table mx-auto" v-if="showAll">
          <div class="table-responsive">
            <table class="table table-bordered table-striped table-hover mx-auto text-center">
              <thead>
                <tr>
                  <th scope="col">Date</th>
                  <th scope="col">Nom</th>
                  <th scope='col'>Photo</th>
                  <th scope='col'>Annonces</th>
                  <th scope='col'>Actions</th>
                </tr>
              </thead>
              <tbody>
                <tr v-for='detail in paginatedData' :key='detail.id'>
                  <td data-label="Date">{{ formatDate(detail.created_at) }}</td>
                  <td data-label="Full name">{{ capitalizeFirstLetter(detail.first_name) }} {{ capitalize(detail.last_name) }}</td>
                  <td data-label="Photo">
                    <img :src='getImgUrl(detail.profile_photo_path)' v-if="detail.profile_photo_path" alt="utilisateur immobilier benin">
                    <p class="text-danger" v-if="!detail.profile_photo_path">
                      Non renseigné
                    </p>
                  </td>
                  <td data-label="Annonces">{{ detail.ads }}</td>
                  <td data-label="Actions">
                    <button class="btn btn-danger m-1 text-white" @click="displayBan(detail.id)">
                      <i class="fa fa-trash m1-3 text-white"></i> Bannir
                    </button>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
        <div class="table mx-auto"  v-if="showFiltered && filteredResults.length > 0">
          <div class="table-responsive">
            <table class="table table-bordered table-striped table-hover mx-auto text-center">
              <thead>
                <tr>
                  <th scope="col">Date</th>
                  <th scope="col">Nom</th>
                  <th scope='col'>Photo</th>
                  <th scope='col'>Annonces</th>
                  <th scope='col'>Actions</th>
                </tr>
              </thead>
              <tbody>
                <tr v-for='detail in filteredResults' :key='detail.id'>
                  <td data-label="Date">{{ formatDate(detail.created_at) }}</td>
                  <td data-label="Full name">{{ capitalizeFirstLetter(detail.first_name) }} {{ capitalize(detail.last_name) }}</td>
                  <td data-label="Photo">
                    <img :src='getImgUrl(detail.profile_photo_path)' v-if="detail.profile_photo_path" alt="utilisateur immobilier benin">
                    <p class="text-danger" v-if="!detail.profile_photo_path">
                      Non renseigné
                    </p>
                  </td>
                  <td data-label="Annonces">{{ detail.ads }}</td>
                  <td data-label="Actions">
                    <button class="btn btn-danger m-1 text-white" @click="displayBan(detail.id)">
                      <i class="fa fa-trash m1-3 text-white"></i> Bannir
                    </button>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
        <p class="text-center" v-if="showFiltered && filteredResults.length == 0">
          Aucun résultat pour cette recherche
        </p>
      </div>
    </div>
    <div class="col-12 text-center" v-if="showAll">
      <nav aria-label="Page navigation mx-auto">
        <ul class="pagination">
          <li class="page-item" :class="{ 'disabled': currentPage === 1 }">
            <a class="page-link" href="#" @click.prevent="previousPage">Précédent</a>
          </li>
          <li class="page-item" v-for="page in totalPages" :key="page" :class="{ 'active': page === currentPage }">
            <a class="page-link" href="#" @click.prevent="gotoPage(page)">{{ page }}</a>
          </li>
          <li class="page-item" :class="{ 'disabled': currentPage === totalPages }">
            <a class="page-link" href="#" @click.prevent="nextPage">Suivant</a>
          </li>
        </ul>
      </nav>
    </div>
    <div class="col-sm-12 col-md-8 mx-auto" v-if="showBan">
      <div class="card p-3">
        <form @submit.prevent="ban">
          <span class="mx-auto bold" @click="displayAll()">
            <i class="fa fa-times me-3 mx-auto text-blue"></i>
          </span>
          <h2>Bannir un utilisateur</h2>
          <p>{{ capitalizeFirstLetter(selectedDetail.first_name) }} {{ capitalizeFirstLetter(selectedDetail.last_name) }}</p>
          <label for="reason">Motif <span class="red">*</span></label>
          <textarea class="form-control" v-model="reason" id="reason" placeholder="Motif" required></textarea>
          <button class="btn btn-success mt-3" type="submit">Bannir</button>
        </form>
      </div>
    </div>
  </section>
</template>

<script>
  export default {
    name: 'Users',
    props: {
      img_url: String
    },
    data() {
      return {
        showNew: false,
        showAll: false,
        showFiltered: false,
        details: [],
        showBan: false,
        reason: '',
        selectedDetail: null,
        location: '',
        currentPage: 1,
        itemsPerPage: 5,
        searchKey: '',
        isSearching: false,
      };
    },
    mounted() {
      this.displayAll();
    },
    computed: {
      totalPages() {
        return Math.ceil(this.details.length / this.itemsPerPage);
      },
      paginatedData() {
        const start = (this.currentPage - 1) * this.itemsPerPage;
        const end = start + this.itemsPerPage;
        return this.details.slice(start, end);
      },
      filteredResults() {
        if (!this.searchKey) {
          return [];
        }
        return this.details.filter(detail =>
          detail.first_name.toLowerCase().includes(this.searchKey.toLowerCase()) ||
          detail.last_name.toLowerCase().includes(this.searchKey.toLowerCase())
        );
      }
    },
    watch: {
      searchKey(newVal) {
        if (newVal === '') {
          this.showAll = true;
          this.showFiltered = false;
        } else {
          this.showAll = false;
          this.showFiltered = true;
        }
      }
    },
    methods: {
      displayAll() {
        axios.get('/usersApi')
          .then((response) => {
            this.details = response.data;
          })
          .catch((error) => {
            console.error(error);
          });

        this.showAll = true;
        this.showBan = false;
        this.showFiltered = false;
      },
      formatDate(dateString) {
        const date = new Date(dateString);
        const day = String(date.getDate()).padStart(2, '0');
        const month = String(date.getMonth() + 1).padStart(2, '0'); // Months are zero-based in JavaScript
        const year = date.getFullYear();
        return `${day}-${month}-${year}`;
      },
      getImgUrl(pic) {
        return "img/users/" + pic;
      },
      displayBan(id) {
        this.selectedDetail = this.details.find(detail => detail.id === id);
        this.showBan = true;
        this.showAll = false;
        this.showFiltered = false
      },
      ban() {
        if (!this.selectedDetail) return; // Ensure there's a selected detail
        const formData = new FormData();
        formData.append('reason', this.reason);
        formData.append('id', this.selectedDetail.id);

        axios.post('/banUserApi', formData)
          .then(response => {
            alert('Utilisateur banni avec succès!');
            this.displayAll();
          })
          .catch(error => {
            console.error('Error:', error);
            alert("Erreur lors de l'enregistrement!");
          });
      },
      capitalize(string) {
        return string.toUpperCase();
      },
      capitalizeFirstLetter(string) {
        return string.charAt(0).toUpperCase() + string.slice(1).toLowerCase();
      },
      previousPage() {
        if (this.currentPage > 1) {
          this.currentPage--;
        }
      },
      nextPage() {
        if (this.currentPage < this.totalPages) {
          this.currentPage++;
        }
      },
      gotoPage(page) {
        this.currentPage = page;
      },
      handleInput() {
        this.isSearching = this.searchKey.length > 0;
      },
      clearSearch() {
        this.searchKey = '';
        this.isSearching = false;
        this.showAll = true;
        this.showFiltered = false;
      },
    }
  };
</script>
