<?php $title = "Immobilier Bénin - Article" ?>

<?php ob_start(); ?>

<div class="container-xxl p" id="app">
<div class="container" v-for='detail in details' :key='detail.id'>
            
            <div class="row">
                <div class="col">
                    <h1 class="text-center">
                        {{ detail.name }}
                    </h1>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12 col-md-12 mx-auto text-center">
                    <img :src="getImgUrl(detail.pic1)" alt="">
                </div>
            </div>

            <div class="row mt-4">
            <div class="col-sm-12 col-md-8 mx-auto text-center">
                <p class="text text-grey">{{ detail.content }}</p>
            </div>
            </div>
            <div class="row mt-3">
                <div class="col-sm-12 col-md-8 mx-auto text-center">
                    </div>
                </div>
                <div class="col-sm-12 col-md-8 mx-auto text-center">
                    <p>
                        Partager: <br>
                            <a href="https://wa.me/?text=https://immobilier_benin.000webhostapp.com/article.php?id=<?=$_GET['id']?>)">
                            <i class="fab fa-whatsapp text-blue"></i>
                            </a>
                            <a href="https://www.facebook.com/share.php?u=https:/immobilier_benin.000webhostapp.com/article.php?id=<?=$_GET['id']?>" target="_blank">

                            <i class="fab fa-facebook text-blue"></i>
                            </a>

                    </p>
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
                details: [],
                id: <?= json_encode($_GET['id']) ?>
            },
            mounted(){
                this.displayDetails();
            },
            methods: {
                displayDetails(){
                    console.log(this.id);
                    axios.get('api/script.php?action=post&id='+this.id)
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
                    return "public/img/" + pic;
                },
            }
        });
    </script>
</body>

<style>
    img{
        width: 80%;
        height: auto;
        margin: 15px auto;
    }

    li{
        list-style: none;
        padding-left: 30px;
        display: inline;
        margin: 10px;
        
    }

    i{
        font-size: 1.5em;
        font-weight: bold;
        margin: 10px;
    }
</style>

