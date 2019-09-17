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
                                <th scope="col">Nome Luogo</th>
                                <th scope="col">Tipologia</th>
                                <th scope="col">Proposta</th>
                                <th scope="col">Motivazione</th>
                                <!--<th scope="col">Autore</th>-->
                                <th scope="col">Numero voti</th>
                                <th scope="col">Vota</th>
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
                                        <td ><img width="150px" height="100px" src=uploads/<?php echo $row['immagine']?> alt=""></td>
                                        <td><?php echo $row['nome_luogo']?></td>

                                        <?php
                                            if($row['tipologia'] == 1){
                                                echo "<td><i class='fa fa-bicycle fa-2x'></i></td>";
                                            }else if($row['tipologia'] == 2){
                                                echo "<i class='fa fa-building fa-2x'></i></td>";
                                            }else if($row['tipologia'] == 3){
                                                echo "<td><i class='fa fa-house-damage fa-2x'></i></td>";
                                            }else if($row['tipologia'] == 4){
                                                echo "<td><i class='fas fa-sync fa-2x'></i></td>";
                                            }else if($row['tipologia'] == 5){
                                                echo "<td><i class='fa fa-users fa-2x'></i></td>";
                                            }
                                        ?>

                                        <td><?php echo $row['proposta']?></td>
                                        <td><?php echo stripslashes(html_entity_decode($row['motivazione'])); ?></td>
                                        <!--<td><?php //echo $row['username']?></td>-->

                                        <?php
                                            //Conto il numero di voti
                                            $sql = "SELECT count(id_segnalazione) as num_voti FROM valutazioni_segnalazioni WHERE id_segnalazione=".$row["idSegnalazione"];

                                            if (mysqli_query($conn, $sql)) {
                                                echo "";
                                            } else {
                                                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                                            }
                                            $num_voti = mysqli_query($conn, $sql);
                                            $data=mysqli_fetch_assoc($num_voti);
                                            echo "<td>".$data['num_voti']."</td>";

                                        ?>


                                        <?php
                                            if($_SESSION['login_user_name'] == ""){
                                                echo '<td width="200px"><button style=\'font-size:15px\' onclick="tableLike('.$row["idSegnalazione"].')" disabled><i class=\'fas fa-thumbs-up\'></i> Like</button> <button style=\'font-size:15px\' onclick="tableUnlike('.$row["idSegnalazione"].')" disabled><i class=\'fas fa-thumbs-down\'></i> Unlike</button></td>';
                                            }else{

                                                //Devo controllare che sia già stato votato
                                                $sql="SELECT * FROM valutazioni_segnalazioni WHERE id_segnalazione=".$row["idSegnalazione"]." and id_utente=".$_SESSION['login_user_id'];
                                                if (mysqli_query($conn, $sql)) {
                                                    echo "";
                                                } else {
                                                    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                                                }
                                                $voti = mysqli_query($conn, $sql);
                                                $num_rows = mysqli_num_rows($voti);
                                                if($num_rows>0){
                                                    $data=mysqli_fetch_assoc($voti);
                                                    if($data["opinione"]==1){
                                                        echo '<td width="200px"><button id="buttonTableLike_'.$row["idSegnalazione"].'" style=\'font-size:15px; background-color:#4D94C9;\' onclick="tableLike('.$row["idSegnalazione"].')"><i class=\'fas fa-thumbs-up\'></i> Like</button> <button id="buttonTableUnlike_'.$row["idSegnalazione"].'" style=\'font-size:15px\' onclick="tableUnlike('.$row["idSegnalazione"].')"><i class=\'fas fa-thumbs-down\'></i> Unlike</button></td>';
                                                    }else{
                                                        echo '<td width="200px"><button id="buttonTableLike_'.$row["idSegnalazione"].'" style=\'font-size:15px;\' onclick="tableLike('.$row["idSegnalazione"].')"><i class=\'fas fa-thumbs-up\'></i> Like</button> <button id="buttonTableUnlike_'.$row["idSegnalazione"].'" style=\'font-size:15px; background-color:#4D94C9;\' onclick="tableUnlike('.$row["idSegnalazione"].')"><i class=\'fas fa-thumbs-down\'></i> Unlike</button></td>';
                                                    }
                                                }else{
                                                    echo '<td width="200px"><button id="buttonTableLike_'.$row["idSegnalazione"].'" style=\'font-size:15px\' onclick="tableLike('.$row["idSegnalazione"].')"><i class=\'fas fa-thumbs-up\'></i> Like</button> <button id="buttonTableUnlike_'.$row["idSegnalazione"].'" style=\'font-size:15px\' onclick="tableUnlike('.$row["idSegnalazione"].')"><i class=\'fas fa-thumbs-down\'></i> Unlike</button></td>';
                                                }


                                            }
                                        ?>
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

<div class="modal fade" id="modalVotazioneSuccess" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Vatazione</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Votazione inserita
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modalUpdateVotazione" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Vatazione</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Votazione aggiornata
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modalVotazioneFallita" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Vatazione</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Errore nella votazione
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

    </main>
</div>
<!-- Footer -->
<?php require_once('inc/footer.inc'); ?>
<!-- Scripts -->
<?php require_once('inc/footerscripts.inc'); ?>

<script src="js/riepilogo.js"></script>
</body>
</html>
