<?php
    include("../config.php");

    $query = "INSERT INTO fattoridinamizzanti(USER_ID, DOMANDA_1, DOMANDA_1_DETTAGLI, DOMANDA_2, DOMANDA_2_DETTAGLI, DOMANDA_3, DOMANDA_3_DETTAGLI, DOMANDA_4, DOMANDA_4_DETTAGLI, DOMANDA_5, DOMANDA_5_DETTAGLI)
                VALUES (".$_POST['USER_ID'].",
                        ".$_POST['DOMANDA_1'].",
                        '".$_POST['DOMANDA_1_DETTAGLI']."',
                        ".$_POST['DOMANDA_2'].",
                        '".$_POST['DOMANDA_2_DETTAGLI']."',
                        ".$_POST['DOMANDA_3'].",
                        '".$_POST['DOMANDA_3_DETTAGLI']."',
                        ".$_POST['DOMANDA_4'].",
                        '".$_POST['DOMANDA_4_DETTAGLI']."',
                        ".$_POST['DOMANDA_5'].",
                        '".$_POST['DOMANDA_5_DETTAGLI']."')";

    echo $query;

    if (mysqli_query($conn, $query)) {
        echo "";
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($conn);
    }

?>