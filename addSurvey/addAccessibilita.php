<?php
    include("../config.php");
    
    $query = "INSERT INTO accessibilita(USER_ID, DOMANDA_1, DOMANDA_2, DOMANDA_21, DOMANDA_21_DETTAGLI, DOMANDA_3, DOMANDA_31_DETTAGLI, DOMANDA_4, DOMANDA_41, DOMANDA_42, DOMANDA_5, DOMANDA_51_DETTAGLI) VALUES (".$_POST['USER_ID'].", ".$_POST['DOMANDA_1'].", ".$_POST['DOMANDA_2'].", ".$_POST['DOMANDA_21'].", ".$_POST['DOMANDA_21_DETTAGLI'].", ".$_POST['DOMANDA_3'].", ".$_POST['DOMANDA_31_DETTAGLI'].", ".$_POST['DOMANDA_4'].", ".$_POST['DOMANDA_41'].", ".$_POST['DOMANDA_42'].", ".$_POST['DOMANDA_5'].", ".$_POST['DOMANDA_5_DETTAGLI'].")";  


    if (mysqli_query($conn, $query)) {
        echo "";
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($conn);
    }

?>