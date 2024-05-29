<?php 
session_start();    
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Immobilier Bénin - Agent immobilierss</title>

    <?php include 'parts/meta.php'; ?>
</head>

<body>
    <div class="container-xxl bg-white p-0">
        <?php include 'parts/spinner.php'; ?>

        <?php include 'parts/header.php'; ?> 


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
                            {{ detail.ads }} annoncess
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

        <?php include 'parts/footer.php'; ?>
    </div>

    <?php include 'parts/includeJs.php'; ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js"></script>
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
                    return "img/" + pic;
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
        
    }

    i{
        font-size: 1.7em;
        font-weight: bold;
        margin: 10px;
    }
</style>

</html>