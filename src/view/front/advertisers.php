<?php $title = "Immobilier Bénin - Annonceurs"; ?>

<?php ob_start(); ?>

    <div class="container" id="ap">
    <div class="row g-0 gx-5 align-items-end">
                        <div class="col-sm-6 ">
                            <div class="text-start mx-auto text-center mb-5 wow slideInLeft" data-wow-delay="0.1s">
                                <h1 class="mx-auto mb-3">Liste des agents</h1>
                            </div>
                        </div>
                    </div>
                    <div class="tab-content">
                        <div id="tab-1" class="tab-pane fade show p-0 active">
                            <div class="row g-2" >
                                <div class="col-lg-4 col-md-6 wow fadeInUp"   data-wow-delay="0.1s" v-for='detail in details' 
                                    :key='detail.id'>
                                    <div class="property-item rounded overflow-hidden" @click="goToAdvertiserPage(detail.id)" >
                                        <div class="position-relative overflow-hidden text-center">
                                                <img class="img-fluid image" :src="getImg(detail.pic)" alt="annonces immobilieres au Benin" 
                                                    v-if="detail.pic!=''">
                                                
                                                <img class="img-fluid image" src="public/img/logo-immo.png" alt="annonces immobilieres au Benin" 
                                                    v-if="detail.pic==''">
                                            
                                        </div>
                                        <div class="p-4 pb-0">
                                            <h5 class="text-blue mb-3">  {{ detail.first_name }}    {{ detail.last_name }}   </h5>
                                            <p class="d-block h5 mb-2" href="">
                                                {{ detail.ads }} annonce{{ detail.ads > 0 ? 's' : '' }}
                                            </a>
                                            <p>
                                                {{ detail.description }} 
                                                <br> <i class="fa fa-phone-alt me-1"></i> {{ detail.phone }} 
                                            </p>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
    </div>

<?php $content = ob_get_clean(); ?>

      
<?php require './src/view/layout.php'; ?>

<script>
            new Vue({
                el: '#app',
                data: {
                    details: '',
                    showAll: false,
                },
                mounted(){
                    this.displayAll();
                }, 
                methods: {
                    displayAll(){
                        this.showAll = true;
                        this.showToSell = false;
                        this.showToRent = false;
                        axios.get('api/script.php?action=advertisers')
                            .then((response) => {
                                console.log(response.data);
                                this.details = response.data;
                            })
                            .catch((error) => {
                                console.error(error);
                                alert('Failed to fetch datas');
                            });
                    },
                    format(num){
                        let res = new Intl.NumberFormat('fr-FR', { maximumSignificantDigits: 3 }).format(num);
                            return res;
                    },
                    formatDate(da) {
                        const [datePart, timePart] = da.split(' ');
                        const [year, month, day] = datePart.split('-');
                        return `${day}-${month}-${year}`;
                        },
                    getImg(pic) {
                        return "public/img/" + pic;
                    },
                    goToAdvertiserPage(id){
                        window.location.replace('./index.php?action=advertiserPage&id='+id);
                    }
                }
            });
        </script>

        <style>
             .item{
            cursor: pointer;
        }

        .custom-range {
        -webkit-appearance: none; /* Override default CSS styles */
        appearance: none;
        width: 50%; /* Full-width */
        height: 15px; /* Specified height */
        background: #ddd; /* Grey background */
        outline: none; /* Remove outline */
        opacity: 0.7; /* Set transparency (for mouse-over effects on hover) */
        transition: opacity .2s; /* 0.2 seconds transition on hover */
        margin-bottom: 20px;
        }

        .custom-range::-webkit-slider-thumb {
        -webkit-appearance: none; /* Override default look */
        appearance: none;
        width: 25px; /* Set a specific slider handle width */
        height: 25px; /* Slider handle height */
        background: #00B98E; /* Green background */
        cursor: pointer; /* Cursor on hover */
        }

        .custom-range::-moz-range-thumb {
        width: 25px; /* Set a specific slider handle width */
        height: 25px; /* Slider handle height */
        background: #00B98E; /* Green background */
        cursor: pointer; /* Cursor on hover */
        }

        .custom-range::-webkit-slider-runnable-track {
        background: linear-gradient(to right, #00B98E 0%, #00B98E var(--range-progress), #ddd var(--range-progress), #ddd 100%);
        }

        .custom-range::-moz-range-progress {
        background-color: #00B98E; /* Color of the filled part */
        }

        .custom-range::-moz-range-track {
        background-color: #ddd; /* Color of the unfilled part */
        }

        .custom-range::-ms-fill-lower {
        background-color: #00B98E; /* Color of the filled part */
        }

        .custom-range::-ms-fill-upper {
        background-color: #ddd; /* Color of the unfilled part */
    }

    .image{
        width: 250px;
        height: 250px;
        margin: 10px auto;
        border-radius: 150px;
    }
        </style>

