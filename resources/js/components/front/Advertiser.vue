<template>
    <div class="container-xxl">
        <div class="container" v-for="detail in details" :key="detail.id">
            <div class="row">
                <div class="col">
                    <h1 class="text-center">
                        {{ detail.first_name }} {{ detail.last_name }}
                    </h1>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12 col-md-12 mx-auto text-center">
                    <img :src="getImgUrl(detail.profile_photo_url)" alt="annonceur immobilier benin" class="image">
                </div>
            </div>
            <div class="row">
                <div class="col-12 text-center">
                    <p>
                        {{ detail.description }} 
                        <br> <i class="bi bi-phone text-blue"></i> {{ detail.phone }} 
                    </p>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12 col-md-8 mx-auto">
                    <p class="text text-blue text-bold text-center">
                        {{ detail.ads.length }} annonce{{ detail.ads.length > 1 ? 's' : '' }}
                    </p>
                </div>
            </div>
        </div>

         <div class="container" v-for="ad in ads" :key='ad.id'>
            <div class="row mt-2">
                <div class="col-lg-4 col-md-6 wow fadeInUp item ad">
                    <div class="property-item rounded overflow-hidden" @click='goToProperty(ad.id)'>
                        <div class="position-relative overflow-hidden">
                            <img class="img-fluid" :src="getImgUrl(ad.pic1)" alt="">
                            <div class="bg-blue rounded text-white position-absolute start-0 top-0 m-4 py-1 px-3">
                                {{ ad.action }}    
                            </div>
                            <div class="bg-white rounded-top text-blue position-absolute start-0 bottom-0 mx-4 pt-1 px-3">
                                {{ ad.category }}    
                            </div>
                        </div>
                        <div class="p-4 pb-0">
                            <h5 class="text-blue mb-3">{{ format(ad.price) }} XOF</h5>
                            <a class="d-block h5 mb-2" href="">{{ capitalizeFirstLetter(ad.ad_name) }}</a>
                            <p><i class="fa fa-map-marker-alt text-blue me-2"></i>{{ ad.location }}</p>
                        </div>
                        <div class="d-flex border-top" v-if="ad.category != 'Terrain' && ad.category != 'Boutique'">
                            <small class="flex-fill text-center border-end py-2"><i class="fa fa-ruler-combined text-blue me-2"></i>{{ ad.people }} ménage{{ ad.people > 1 ? 's' : '' }}</small>
                            <small class="flex-fill text-center border-end py-2"><i class="fa fa-bed text-blue me-2"></i>{{ ad.rooms }} chambre{{ ad.rooms > 1 ? 's' : '' }}</small>
                            <small class="flex-fill text-center py-2"><i class="fa fa-bath text-blue me-2"></i>{{ ad.bathrooms }} douche{{ ad.bathrooms > 1 ? 's' : '' }}</small>
                        </div>
                        <div class="d-flex border-top" v-if="ad.category == 'Terrain' || ad.category == 'Boutique'">
                            <small class="flex-fill text-left border-end py-2"><i class="fa fa-ruler-combined text-blue me-2"></i>{{ ad.size }} m2</small>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12 col-md-8 mt-3 mx-auto text-center">
                    <p>
                        Partager: <br>
                        <a :href="'https://wa.me/?text=bitly.com?action=advertiserPage&id=' + detail.id">
                            <i class="fab fa-whatsapp text-whatsapp m-1"></i>
                        </a>
                        <a :href="'https://www.facebook.com/share.php?u=bitly.com?action=advertiserPage&id=' + detail.id" target="_blank">
                            <i class="fab fa-facebook text-facebook m-1"></i>
                        </a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import axios from 'axios';

export default {
    name: 'Advertiser',
    props: {
        img_url: String
    },
    data() {
        return {
            details: [], // Changed from '' to [] for consistency
            id: 3, 
            ads: []
        };
    },
    mounted() {
        this.fetchDetails();
    },
    methods: {
        fetchDetails() {
            axios.get(`/userApi/${this.id}`)
                .then((response) => {
                    this.details = response.data;
                    console.log(this.details);
                })
                .catch((error) => {
                    console.error(error);
                });
            axios.get(`/advertiserApi/${this.id}`)
                .then((response) => {
                    this.ads = response.data;
                    console.log(this.ads);
                })
                .catch((error) => {
                    console.error(error);
                });
        },
        getImgUrl(pic) {
            return `img/users/${pic}`;
        },
        capitalizeFirstLetter(word) {
            if (!word) return '';
            return word.charAt(0).toUpperCase() + word.slice(1);
        }
    }
};
</script>

<style scoped>
    .user_image {
        width: 120px;
        height: 120px;
        border-radius: 90px;
    }
    .image {
        max-width: 100%;
        height: auto;
    }
</style>
