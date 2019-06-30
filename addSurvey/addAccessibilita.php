<?php
    include("../config.php");
    
    $query = "INSERT INTO accessibilita(USER_ID, DOMANDA_1, DOMANDA_2, DOMANDA_21, DOMANDA_21_DETTAGLI, DOMANDA_3, DOMANDA_31_DETTAGLI, DOMANDA_4, DOMANDA_41, DOMANDA_42, DOMANDA_5, DOMANDA_51_DETTAGLI) VALUES (".$_GET['USER_ID'].", ".$_GET['DOMANDA_1'].", ".$_GET['DOMANDA_2'].", ".$_GET['DOMANDA_21'].", '".$_GET['DOMANDA_21_DETTAGLI']."', ".$_GET['DOMANDA_3'].", '".$_GET['DOMANDA_31_DETTAGLI']."', ".$_GET['DOMANDA_4'].", '".$_GET['DOMANDA_41']."', '".$_GET['DOMANDA_42']."', ".$_GET['DOMANDA_5'].", '".$_GET['DOMANDA_5_DETTAGLI']."')";


    if (mysqli_query($conn, $query)) {
        echo "";
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($conn);
    }

?>