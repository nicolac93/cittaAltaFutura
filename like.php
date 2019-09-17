<?php
    //include("config.php");
    include("session.php");


    $query = "SELECT *
              FROM valutazioni_segnalazioni
              WHERE id_segnalazione = ". $_POST['id'] ." and id_utente = ". $_SESSION['login_user_id'];

    $result = $conn->query($query);

    if (mysqli_query($conn, $query)) {
        echo "";
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($conn);
    }

    echo empty($result);

    if ($result->num_rows > 0) {

        $query = "UPDATE valutazioni_segnalazioni
                    SET opinione = ".$_POST['opinione']."
                    WHERE id_segnalazione = ". $_POST['id'] ." and id_utente = ". $_SESSION['login_user_id'];

        if (mysqli_query($conn, $query)) {
            echo "Update Votazione";
        } else {
            echo "Error: " . $query . "<br>" . mysqli_error($conn);
        }

    }else{

        //Inserisco la segnalazione

        $query = "INSERT INTO valutazioni_segnalazioni (id_utente, id_segnalazione, opinione)
                  VALUES( ".$_SESSION['login_user_id'].", ".$_POST['id'].", ".$_POST['opinione'].")";

        if (mysqli_query($conn, $query)) {
            echo "Votazione Inserita";
        } else {
            echo "Error: " . $query . "<br>" . mysqli_error($conn);
        }
    }


?>