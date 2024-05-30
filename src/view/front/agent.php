<?php $title = "Immobilier Bénin - Annonceurs"; ?>

<?php ob_start(); ?>

<div class="container-xxl p" id="app">
            <div class="container" v-for='detail in details' :key='detail.id'>

                <div class="row">
                    <div class="col">
                        <h1 class="text-center">
                            {{ detail.first_name }} {{ detail.last_name }}
                        </h1>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 col-md-12 mx-auto text-center">
                        <img :src="getImgUrl(detail.pic)" alt="">
                    </div>
                </div>

            
                <div class="row">
                    <div class="col-12">
                        <div class="icon">
                            <div class="d-flex border-top">
                                <small class="flex-fill text-center py-2">
                                    {{ detail.description }}
                                </small>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row mt-4">
                    <div class="col-sm-12 col-md-8 mx-auto text-center">
                        <p class="text text-grey">
                            {{ detail.ads }} annonces
                        </p>
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-sm-12 col-md-8 mx-auto">
                    <div class="col-sm-12 col-md-8 mx-auto text-center">
                        <p>
                            Partager: <br>
                                <a href="https://wa.me/?text=bitly.com/agent.php?id=<?=$_GET['id']?>)">
                                <i class="fab fa-whatsapp"></i>
                                </a>

                                <a href="https://www.facebook.com/share.php?u=agent.php?id=<?=$_GET['id']?>" target="_blank">
                                <i class="fab fa-facebook"></i>
                                </a>

                        </p>
                        </div>
                    </div></div>
                </div>
            </div>
        </div>

<?php $content = ob_get_clean(); ?>

      
<?php require './src/view/layout.php'; ?>

    <script>
        new Vue({
            el: '#app',
            data: {
                details: [],
                id: <?= json_encode($_GET['id']) ?>
            },
            mounted(){
                this.displayDetails();
            },
            methods: {
                displayDetails(){
                    console.log(this.id);
                    axios.get('api/script.php?action=getAgent&id='+this.id)
                        .then((response) => {
                            console.log(response.data);
                            this.details = response.data;
                        })
                        .catch((error) => {
                            console.error(error);
                            alert('Failed to fetch data');
                        });
                }, 
                format(num){
                    return new Intl.NumberFormat('fr-FR', { maximumSignificantDigits: 3 }).format(num);
                },
                formatDate(da) {
                    const [datePart, timePart] = da.split(' ');
                    const [year, month, day] = datePart.split('-');
                    return `${day}-${month}-${year}`;
                },
                getImgUrl(pic) {
                    return "./public/img/" + pic;
                },
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
        </style>

