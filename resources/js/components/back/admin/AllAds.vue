<template>
  <section class="container xxl mt-0">
    <div class="row pt-4" id="myads">
      <div class="col-sm-12 col-md-12 mx-auto" id="pageTop" data-wow-delay="0.5s">
        <h1 class="mx-auto text-center" v-if="showAll">
          Toutes les annonces ({{ details.length }})
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

        <div class="mt-2 table-container" v-if="showAll && details.length > 0">
          <div class="mt-3 mx-auto">
            <div class="table-responsive-sm mt-2">
              <table class="table table-bordered table-striped table-hover mx-auto text-center">
                <thead>
                  <tr>
                    <th>Nom</th>
                    <th>Image</th>
                    <th>Annonceur</th>
                    <th>Statut</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                <tbody>
                  <tr v-for="detail in paginatedData" :key="detail.id">
                    <td data-label="Nom">{{ capitalizeFirstLetter(detail.name) }}</td>
                    <td data-label="Image">
                      <img :src="getImgUrl(detail.pic1)" alt="annonces immobilieres au benin">
                    </td>
                    <td data-label="Annonceur">{{ capitalizeFirstLetter(detail.user_first_name) }} {{ capitalizeFirstLetter(detail.user_last_name) }}</td>
                    <td data-label="Statut">
                      <p class="text-success" v-if="detail.situation === 'Disponible'">
                        {{ detail.situation }}
                      </p>
                      <p class="text-danger" v-if="detail.situation === 'Stop'">
                        {{ detail.situation }}
                      </p>
                    </td>
                    <td data-label="Actions">
                      <button class="btn btn-warning m-1 text-white" @click="displayStop(detail.id)" v-if="detail.situation === 'Disponible' || detail.situation === 'Non Disponible'">
                        <i class="fa fa-stop m-1 text-white"></i> Stop
                      </button>
                      <button class="btn btn-success m-1 text-white" @click="authorizeAd(detail.id)" v-if="detail.situation === 'Stop'">
                        <i class="fa fa-play m-1 text-white"></i> Autoriser
                      </button>
                      <button class="btn btn-info m-1 text-white" @click="goToProperty(detail.id)">
                        <i class="fa fa-eye m-1 text-white"></i> Voir
                      </button>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>

        <div class="mt-2 table-container" v-if="showFiltered && filteredResults.length > 0">
          <div class="mt-3 mx-auto">
            <div class="table-responsive-sm mt-2">
              <table class="table table-bordered table-striped table-hover mx-auto text-center">
                <thead>
                  <tr>
                    <th>Nom</th>
                    <th>Image</th>
                    <th>Annonceur</th>
                    <th>Statut</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                <tbody>
                  <tr v-for="detail in filteredResults" :key="detail.id">
                    <td data-label="Nom">{{ capitalizeFirstLetter(detail.name) }}</td>
                    <td data-label="Image">
                      <img :src="getImgUrl(detail.pic1)" alt="annonces immobilieres au benin">
                    </td>
                    <td data-label="Annonceur">{{ capitalizeFirstLetter(detail.user_first_name) }} {{ capitalizeFirstLetter(detail.user_last_name) }}</td>
                    <td data-label="Statut">
                      <p class="text-success" v-if="detail.situation === 'Disponible'">
                        {{ detail.situation }}
                      </p>
                      <p class="text-danger" v-if="detail.situation === 'Stop'">
                        {{ detail.situation }}
                      </p>
                    </td>
                    <td data-label="Actions">
                      <button class="btn btn-warning m-1 text-white" @click="displayStop(detail.id)" v-if="detail.situation === 'Disponible' || detail.situation === 'Non Disponible'">
                        <i class="fa fa-stop m-1 text-white"></i> Stop
                      </button>
                      <button class="btn btn-success m-1 text-white" @click="authorizeAd(detail.id)" v-if="detail.situation === 'Stop'">
                        <i class="fa fa-play m-1 text-white"></i> Autoriser
                      </button>
                      <button class="btn btn-info m-1 text-white" @click="goToProperty(detail.id)">
                        <i class="fa fa-eye m-1 text-white"></i> Voir
                      </button>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>

        <p class="text-center" v-if="showFiltered && filteredResults.length == 0">
          Aucun résultat pour cette recherche
        </p>
      </div>

      <div class="col-sm-12 col-md-8 mx-auto" v-if="showStop">
        <div class="card p-3">
          <form @submit.prevent="stop">
            <span class="mx-auto bold" @click="displayAll()">
              <i class="fa fa-times me-3 mx-auto text-blue"></i>
            </span>

            <h2>Mise en Stop de l'annonce</h2>
            <p>{{ selectedDetail.name }}</p>
            <label for="reason">Motif <span class="red">*</span></label>
            <textarea class="form-control" v-model="reason" id="reason" placeholder="Motif" required></textarea>
            <button class="btn btn-success mt-3" type="submit">Mettre en Stop</button>
          </form>
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
    </div>
  </section>
</template>

<script>
export default {
  name: "AllAds",
  props: {
    img_url: String,
  },
  data() {
    return {
      showAll: false,
      showStop: false,
      reason: "",
      details: [],
      selectedDetail: null,
      currentPage: 1,
      itemsPerPage: 5,
      showFiltered: false,
      searchKey: "",
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
      return this.details.filter(
        (detail) =>
          detail.name.toLowerCase().includes(this.searchKey.toLowerCase()) ||
          detail.user_first_name.toLowerCase().includes(this.searchKey.toLowerCase()) ||
          detail.user_last_name.toLowerCase().includes(this.searchKey.toLowerCase())
      );
    },
  },
  watch: {
    searchKey(newVal) {
      if (newVal === "") {
        this.showAll = true;
        this.showFiltered = false;
      } else {
        this.showAll = false;
        this.showFiltered = true;
      }
    },
  },
  methods: {
    displayAll() {
      axios
        .get("/allAdsApi")
        .then((response) => {
          this.details = response.data;
          this.showAll = true;
          this.showFiltered = false;
        })
        .catch((error) => {
          console.error(error);
        });
    },
    displayStop(id) {
      this.selectedDetail = this.details.find((detail) => detail.id === id);
      this.showStop = true;
      this.showAll = false;
      this.showFiltered = false;
    },
    stop() {
      axios
        .post(`/stopAd/${this.selectedDetail.id}`, { reason: this.reason })
        .then((response) => {
          alert("Annonce mise en stop avec succès");
          this.displayAll();
          this.showStop = false;
          this.reason = "";
        })
        .catch((error) => {
          console.error(error);
        });
    },
    authorizeAd(id) {
      axios
        .post(`/authorizeAd/${id}`)
        .then((response) => {
          alert("Annonce autorisée avec succès");
          this.displayAll();
        })
        .catch((error) => {
          console.error(error);
        });
    },
    getImgUrl(imagePath) {
      return `${this.img_url}${imagePath}`;
    },
    capitalizeFirstLetter(string) {
      return string.charAt(0).toUpperCase() + string.slice(1);
    },
    goToProperty(id) {
      window.location.href = `/property/${id}`;
    },
    clearSearch() {
      this.searchKey = "";
      this.isSearching = false;
    },
    handleInput() {
      this.isSearching = !!this.searchKey;
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
  },
};
</script>
