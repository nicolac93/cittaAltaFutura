<?php
//ini_set('display_errors', 'Off');
ini_set('display_errors', 'On');
error_reporting(E_ALL);

include('session.php');
?>
<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Processo partecipativo Tripla Elica per la revisione del Piano Particolareggiato di Citt&agrave; Alta e Borgo Canale (PPRCA)">
    <meta name="author" content="CST - DiathesisLab">
    <title>Città Alta Plurale | Tabella Riepilogo</title>
    <!-- Links -->
    <?php require_once('inc/links.inc'); ?>
</head>

<body>
<header>
    <?php require_once('inc/header.inc'); ?>
</header>
<div class=" bg-img-hauto p-sm-5">
    <!--     *********   TODO   **********     -->
    <main class="container">
        <div class="row">
            <div class="col-12 text-center mt-5">
                <h1 class="section-heading mt-0 mb-3">Tabella delle segnalazioni <h1>
            </div>
            <div class="col-12 text-center mt-5">
                <hr class="primary">

                <div>

                    <!-- Table riepilogo -->
                    <div class="table-responsive" id="table-riepilogo">
                        <table class="table table-striped">
                            <thead class="thead-light">
                            <tr>
                                <th scope="col">Immagine</th>
                                <th scope="col">Titolo</th>
                                <th scope="col">Tipologia</th>
                                <th scope="col">Proposta</th>
                                <th scope="col">Motivazione</th>
                                <th scope="col">Destinatari</th>
                                <th scope="col">Periodo</th>
                                <th scope="col">Stato di conservazione</th>
                                <!--<th scope="col">Autore</th>-->
                                <th scope="col">Numero voti</th>
                                <th scope="col">Vota!</th>
                            </tr>
                            </thead>
                            <tbody>

                            <?php
                            $sql = "SELECT *, segnalazioni.id as idSegnalazione FROM segnalazioni JOIN utenti ON segnalazioni.id_utente = utenti.id";

                            if (mysqli_query($conn, $sql)) {
                                echo "";
                            } else {
                                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                            }
                            $count=1;
                            $result = mysqli_query($conn, $sql);

                            if(mysqli_num_rows($result)>0){
                                while($row = mysqli_fetch_assoc($result)){ ?>
                                    <tr>
                                        <td ><img class="card-img-top" src=img/<?php echo $row['immagine']?> alt=""></td>
                                        <td><a href=<?php echo 'segnalazione.php?id='.$row['idSegnalazione']?>><?php echo $row['titolo']?></a></td>
                                        <td><?php echo $row['tipologia']?></td>
                                        <td><?php echo $row['proposta']?></td>
                                        <td><?php echo $row['motivazione']?></td>
                                        <td><?php echo $row['destinatari']?></td>
                                        <td><?php echo $row['periodo']?></td>
                                        <td><?php echo $row['conservazione']?></td>
                                        <!--<td><?php //echo $row['username']?></td>-->
                                        <td>??</td>
                                        <td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Vota!</button></td>
                                    </tr>


                                    <?php
                                    $count++;
                                }
                            } else {
                                echo "0 results";
                            }
                            ?>
                            </tbody>
                        </table>
                    </div>

                </div>


                <div class="titoloevidenziato my-5"><h3>Esprimi anche tu la tua opinione, per noi è importante!</h3>
                    <button type="button" class="btn btn-secondary btn-lg" >
                        <?php
                        if($_SESSION['login_user_name'] == ""){
                            echo '<a href="login.php">Partecipa e aiutaci a migliorare la nostra Citt&agrave; Alta</a>';
                        }else{
                            echo '<a href="partecipa.php">Partecipa e aiutaci a migliorare la nostra Citt&agrave; Alta</a>';
                        }
                        ?>
                    </button>
                </div>
            </div>
        </div>



    </main>
</div>
<!-- Footer -->
<?php require_once('inc/footer.inc'); ?>
<!-- Scripts -->
<?php require_once('inc/footerscripts.inc'); ?>
</body>
</html>
