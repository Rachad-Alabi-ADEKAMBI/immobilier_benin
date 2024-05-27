<!DOCTYPE html>
<html lang="en">

<head>
    <title>Immobilier Bénin - Nouvelle demande</title>

    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

    <?php include 'parts/meta.php'; ?>

    <script src="https://cdn.jsdelivr.net/npm/vue@2"></script>
  
</head>

<body>
    <div class="container-xxl bg-white p-0">
        <?php include 'parts/spinner.php'; ?>

        <?php include 'parts/header.php'; ?>

        <div id="app">
        <div class="row g-0 gx-5 align-items-end">
                    <div class="col-sm-12 col-md-6 mt-4 mx-auto" v-if='showNew'>
                        <div class="bg-white border mt-2 rounded p-sm-5 wow fadeInUp" data-wow-delay="0.5s">
                            <form action="api/script.php?action=login" method="POST" >
                                <h1 class="mx-auto text-center">
                                    Nouvelle recherche personnalisée
                                </h1>

                                <div class="row g-3">
                                    <p class="text text-grey">
                                        Nous n'avons trouvé aucun résultat pour cette recherche, mais vous pouvez en faire une recherche 
                                        personnalisée, les agents de Immobilier Bénin seront alors informés que vous avez besoin de cela. Il est nécéssaire de 
                                        posséder un compte gratuit Immobilier Bénin pour cette option.
                                    </p>
                                </div>

                                <div class="row g-3 mt-4">
                                    <div class="col-sm-12 col-md-6 mx-auto text-center">
                                        <button class="btn btn-success w-100 py-3" type="submit">
                                           Oui, créer
                                        </button>

                                        <button class="btn btn-success w-100 py-3" type="submit">
                                            Non, merci
                                        </button>
                                    </div>
                                    
                                </div>
                            </form>
                        </div>
                    </div>
                   
                </div>
        </div>

        <?php include 'parts/footer.php'; ?>

    </div>

    <?php include 'parts/includeJs.php'; ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js"></script>

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
    </style>

</body>

</html>