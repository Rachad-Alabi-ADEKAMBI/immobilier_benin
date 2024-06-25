<?php $title = 'Immobilier Bénin - Gestion de propriété'; 


 ob_start(); ?>

<section class="section" id='app'>
    <div class="container">
      <div class="row g-0 gx-5 align-items-end">
            <!--menu--> 
            <?php include 'menu.php'; ?>

            <div class='col-sm-12 col-md-10 mt-4 mx-auto' >
                <div class="" v-for="detail in details" :key='detail.id'>
                <h1 class="mx-auto text-center">
                            Gestion de {{ detail.id }}
                         </h1>

                        <div class="mt-2 table-container" >
                                <div class="details">
                                    oklm
                                </div>
                            </div>
                        </div>
                </div>
            </div>

      </div>
    </div>
</section>

<?php $content = ob_get_clean(); ?>

<?php require './src/view/layout.php'; ?>

<script>
            new Vue({
                el: '#app',
                data: {
                    id: <?= json_encode($_GET['id']) ?>,
                    details: '',
                },
                mounted(){
                    this.displayDetails();
                },
                methods: {
                    displayDetails(){
                        axios.get('api/script.php?action=manageProperty&id='+this.id)
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
                    getImgUrl(pic) {
                        return "public/img/" + pic;
                    },

                }
            });
        </script>

<style>
          body {
            font-family: Arial, sans-serif;
        }
        .table-container {
            width: 100%;
            overflow-x: auto;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 12px;
            text-align: left;
        }
        th {
            background-color: #f4f4f4;
        }
        @media (max-width: 600px) {
            table, thead, tbody, th, td, tr {
                display: block;
            }
            thead tr {
                display: none;
            }
            tr {
                margin-bottom: 15px;
            }
            td {
                position: relative;
                padding-left: 50%;
            }
            td::before {
                content: attr(data-label);
                position: absolute;
                left: 0;
                width: 50%;
                padding-left: 15px;
                font-weight: bold;
                background-color: #f4f4f4;
                border-right: 1px solid #ddd;
                box-sizing: border-box;
            }
        }

        img{
            width: 90px;
            height: 60px;
        }

        ul li{
            display: inline;
            list-style: none;
        }

        li i{
            cursor: pointer;
        }

        li i:hover{
            font-weight: bold;
        }
        
        .red{
            color: red;
            font-weight: bold;
        }
    </style>
