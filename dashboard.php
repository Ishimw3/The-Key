<head>
    <link rel="stylesheet" href="asset/css/fontawesome.css">
    <link rel="stylesheet" href="asset/css/all.css">
</head>

<?php


include 'sessionManager.php';

check_session();


include "header.php";

?>

<main class="main">

    <section class="services">


        <div class="container">


            <h1 style="padding: 40px;">Gestion du site :</h1>


            <div class="button-container">

                <a href="client.php" class="service-action">
                    <i class="fa fa-handshake"></i>
                    <p>Gestion des clients</p>
                </a>
                <a href="agent.php" class="service-action">
                    <i class="fa fa-user-secret"></i>
                    <p>Gestion des agents</p>
                </a>
                <a href="post.php" class="service-action">
                    <i class="fa fa-chart-column"></i>
                    <p>Suivi des Postes</p>
                </a>

                <a href="contrat.php" class="service-action">
                    <i class="fa fa-file-lines"></i>
                    <p>Creer Contrats et Accords</p>
                </a>

                <a href="fonction.php" class="service-action">
                    <i class="fa fa-briefcase"></i>
                    <p>Gestion des Foctions Occupés</p>
                </a>

            </div>

        </div>

    </section>

</main>

<?php include "footer.php" ?>