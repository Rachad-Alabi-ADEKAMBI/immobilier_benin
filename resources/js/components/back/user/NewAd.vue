<template>
  <section class="container" if='top'>
    <div class="col-sm-12 col-md-8 mt-4 mx-auto">
      <!-- New Add -->
      <div class="bg-white border mt-2 rounded p-2 wow">
        <form @submit.prevent="submit" enctype="multipart/form-data">
          <span class="ml-0">
            <a href="/dashboard">
              <i class="fa fa-times me-3 text-blue"></i>
            </a>
          </span>

          <h1 class="mx-auto text-center">Nouvelle annonce</h1>
          <p class="text-center">
            Si vous avez des questions concernant le formulaire <br> vous pouvez
            consulter <a href="/faq">la FAQ</a>
          </p>

          <div class="row g-3">
            <div class="col-sm-6 col-md-6">
              <label for="name">Nom <span class="red">*</span> </label>
              <div class="form-floating">
                <input type="text" class="form-control" required v-model="name" placeholder="Nom">
              </div>
            </div>

            <div class="col-sm-6 col-md-6">
              <label for="price">Prix <span class="red">*</span></label>
              <div class="form-floating">
                  <input type="number" class="form-control" required v-model="price"
                   placeholder="Prix" min="0" oninput="this.value = Math.abs(this.value)">
              </div>
            </div>
          </div>

          <div class="row g-3 mt-3">
            <div class="col-sm-6 col-md-4">
              <label for="category">Catégorie <span class="red">*</span></label>
              <div class="form-floating">
                <select class="form-select" id="category" v-model="category" required>
                  <option value="" disabled>Catégorie</option>
                  <option value="Appartement">Appartement</option>
                  <option value="Appartement meublé">Appartement meublé</option>
                  <option value="Boutique">Boutique</option>
                  <option value="Maison">Maison</option>
                  <option value="Terrain">Terrain</option>
                </select>
              </div>
            </div>

            <div class="col-sm-6 col-md-4">
              <label for="action">Action <span class="red">*</span></label>
              <div class="form-floating">
                <select class="form-select" id="action" v-model="action" required>
                  <option value="" disabled>Action</option>
                  <option value="A louer">A louer</option>
                  <option value="A vendre">A vendre</option>
                </select>
              </div>
            </div>

            <div class="col-sm-4 col-md-4">
              <label for="location">Ville <span class="red">*</span></label>
              <div class="form-floating">
                <select class="form-select" id="location" v-model="location" required @change="checkLocation">
                  <option value="" disabled>Ville</option>
                  <option value="Abomey">Abomey</option>
                  <option value="Abomey-Calavi">Abomey-Calavi</option>
                  <option value="Cotonou">Cotonou</option>
                  <option value="Bohicon">Bohicon</option>
                  <option value="Grand-popo">Grand-popo</option>
                  <option value="Malanville">Malanville</option>
                  <option value="Natitingou">Natitingou</option>
                  <option value="N'dali">N'dali</option>
                  <option value="Nikki">Nikki</option>
                  <option value="Ouidah">Ouidah</option>
                  <option value="Parakou">Parakou</option>
                  <option value="Porto-Novo">Porto-Novo</option>
                  <option value="Sakété">Sakété</option>
                  <option value="Savè">Savè</option>
                  <option value="Sèmè">Sèmè</option>
                  <option value="other">Autre</option>
                </select>
              </div>
            </div>
          </div>

          <div class="row g-3 mt-3" v-if="showMoreLocation">
            <div class="col-sm-6 col-md-6">
              <div class="form-floating">
                  <label for="more_location">Ville <span class="red">*</span></label>
                <input type="text" class="form-control" v-model="moreLocation" id="more_location" placeholder="Ville">
              
              </div>
            </div>
          </div>

          <div class="row g-3 mt-3" v-if="showLand">
            <div class="col-sm-6 col-md-6">
              <div class="form-floating">
                <label for="size">Superficie <span class="red">*</span></label>
                <input type="number" class="form-control" v-model="size" id="size" placeholder="Superficie"
                  min="0" oninput="this.value = Math.abs(this.value)">
              </div>
            </div>
          </div>

          <div class="row g-3 mt-3" v-if="showHouse">
            <div class="col-sm-4 col-md-4">
               <label for="rooms">Chambres <span class="red">*</span></label>
              <div class="form-floating">
                <select class="form-select" v-model="rooms">
                  <option v-for="n in 10" :key="n" :value="n">{{ n }}</option>
                </select>
                
              </div>
            </div>

            <div class="col-sm-4 col-md-4">
               <label for="bathrooms">Douches <span class="red">*</span></label>
              <div class="form-floating">
                <select class="form-select" v-model="bathrooms">
                  <option v-for="n in 10" :key="n" :value="n">{{ n }}</option>
                </select>
              </div>
            </div>

            <div class="col-sm-4 col-md-4">
              <label for="people">Ménages: <span class="red">*</span></label>
              <div class="form-floating">
                <select class="" v-model="people">
                  <option v-for="n in 10" :key="n" :value="n">{{ n }}</option>
                </select>
               </div>
            </div>
          </div>

          <div class="row g-3 mt-3">
            <div class="col-sm-12 col-md-12">
              <div class="form-floating">
                <label for="description">Description <span class="red">*</span></label>
                <textarea class="form-control" v-model="description" id="description" placeholder="Description" required></textarea>
              </div>
            </div>
          </div>

         <div class="row g-3 mt-3">
            <!-- Only the first image is required -->
            <div class="col-sm-6 col-md-3">
              <label for="pic1">Photo<span class="red">*</span></label>
              <div class="form-floating">
                <input type="file" class="form-control" accept=".jpg, .jpeg, .png, image/*" name="pic1" id="pic1" placeholder="Photo1" required>
              </div>
            </div>
            <!-- Start at the second image but not required -->
            <div class="col-sm-6 col-md-3" v-for="i in 9 " :key="i + 1">
              <label :for="'pic' + (i + 1)">Photo {{ i + 1 }}</label>
              <div class="form-floating">
                <input type="file" class="form-control" accept=".jpg, .jpeg, .png, image/*" :name="'pic' + (i + 1)" :id="'pic' + (i + 1)" placeholder="Photo {{ i + 1 }}">
              </div>
            </div>
          </div>


          <div class="row g-3 mt-4">
            <div class="col-sm-12 col-md-4 mx-auto text-center">
              <button class="btn btn-blue w-100 py-3" type="submit">Ajouter</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </section>
</template>

<script>
export default {
  data() {
    return {
      name: '',
      price: '',
      category: '',
      action: '',
      location: '',
      moreLocation: '',
      showMoreLocation: false,
      showLand: false,
      size: '',
      showHouse: false,
      rooms: '',
      bathrooms: '',
      people: '',
      description: ''
    };
  },
  methods: {
    submit() {
      const formData = new FormData();
      formData.append('name', this.name);
      formData.append('price', this.price);
      formData.append('category', this.category);
      formData.append('action', this.action);
      formData.append('location', this.location);
      formData.append('moreLocation', this.moreLocation);
      formData.append('size', this.size);
      formData.append('rooms', this.rooms);
      formData.append('bathrooms', this.bathrooms);
      formData.append('people', this.people);
      formData.append('description', this.description);

      for (let i = 1; i <= 11; i++) {
        const fileInput = document.getElementById('pic' + i);
        if (fileInput && fileInput.files.length > 0) {
          formData.append('pic' + i, fileInput.files[0]);
        }
      }

      axios.post('/newAdApi', formData)
        .then(response => {
          //console.log('Form submitted successfully', response.data);
          alert('Nouvelle annonce ajoutée avec succes !');
          window.location.replace('#top')
        })
        .catch(error => {
          console.error('Form submission error', error);
        });
    },
    formatPrice(event) {
      const value = event.target.value;
      // Add formatting logic for price if needed
    },
    checkLocation(event) {
      if (event.target.value === 'other') {
        this.showMoreLocation = true;
      } else {
        this.showMoreLocation = false;
      }
    }
  },
  watch: {
    category() {
                        if (this.category == 'Terrain') {
                            this.showLand = true;
                            this.showHouse = false;
                        } 
                        else if(this.category == 'Boutique'){
                             this.showLand = falses;
                            this.showHouse = false;
                        }
                        else{
                            this.showLand = false;
                            this.showHouse = true;
                        }
                        },
  }
};
</script>

<style scoped>
/* Add your styles here */
</style>
