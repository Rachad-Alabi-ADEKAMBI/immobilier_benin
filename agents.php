<?php
session_start();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Immobilier Bénin - Liste des agents</title>

    <?php include 'parts/meta.php'; ?>
</head>

<body>
    <div class="container-xxl bg-white p-0">
        <?php include 'parts/spinner.php'; ?>

        <?php include 'parts/header.php'; ?>


        <?php include 'parts/search.php'; ?>

            <div class="container" id="app">
                <div class="container">
                    <!-- Property List Start -->
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
                                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s" v-for='detail in details' 
                                    :key='detail.id'>
                                    <div class="property-item rounded overflow-hidden" @click='goToAgent(detail.id)'>
                                        <div class="position-relative overflow-hidden">
                                                <img class="img-fluid" :src="getImg(detail.pic)" alt="">
                                            
                                        </div>
                                        <div class="p-4 pb-0">
                                            <h5 class="text-primary mb-3">  {{ detail.first_name }}    {{ detail.last_name }}   </h5>
                                            <a class="d-block h5 mb-2" href="">
                                                {{ detail.ads }} annonce{{ detail.ads > 0 ? 's' : '' }}
                                            </a>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
       
        <?php include 'parts/footer.php'; ?>
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
                        axios.get('api/script.php?action=agents')
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
                        return "img/" + pic;
                    },
                    goToAgent(id){
                        window.location.replace('agent.php?id='+id);
                    }
                }
            });
        </script>
    </div>

    <?php include 'parts/includeJs.php'; ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js"></script>

</body>

</html>