<?php
    include("../config.php");
    
    $query = "INSERT INTO funzionicostruito(USER_ID, DOMANDA_1, DOMANDA_1_DETTAGLI, DOMANDA_2, DOMANDA_2_DETTAGLI, DOMANDA_3, DOMANDA_3_DETTAGLI, DOMANDA_4, DOMANDA_41, DOMANDA_42, DOMANDA_5, DOMANDA_51, DOMANDA_51_DETTAGLI, DOMANDA_6, DOMANDA_61, DOMANDA_61_DETTAGLI, DOMANDA_7, DOMANDA_7_DETTAGLI) VALUES (".$_POST['USER_ID'].", ".$_POST['DOMANDA_1'].", '".$_POST['DOMANDA_1_DETTAGLI']."', ".$_POST['DOMANDA_2'].", '".$_POST['DOMANDA_2_DETTAGLI']."', ".$_POST['DOMANDA_3'].", '".$_POST['DOMANDA_3_DETTAGLI']."', ".$_POST['DOMANDA_4'].", ".$_POST['DOMANDA_41'].", '".$_POST['DOMANDA_42']."', ".$_POST['DOMANDA_5'].", ".$_POST['DOMANDA_51'].", '".$_POST['DOMANDA_51_DETTAGLI']."', ".$_POST['DOMANDA_6'].", ".$_POST['DOMANDA_61'].", '".$_POST['DOMANDA_61_DETTAGLI']."', ".$_POST['DOMANDA_7'].", '".$_POST['DOMANDA_7_DETTAGLI']."')";  


    if (mysqli_query($conn, $query)) {
        echo "";
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($conn);
    }

?>