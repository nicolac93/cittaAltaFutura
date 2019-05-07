<?php  
    include("../config.php");
    
    $query = "INSERT INTO cittaaltafutura(USER_ID, DOMANDA_1, DOMANDA_1_DETTAGLI, DOMANDA_2, DOMANDA_2_DETTAGLI, DOMANDA_3, DOMANDA_3_DETTAGLI) VALUES (".$_POST['USER_ID'].", ".$_POST['DOMANDA_1'].", '".$_POST['DOMANDA_1_DETTAGLI']."', ".$_POST['DOMANDA_2'].", '".$_POST['DOMANDA_2_DETTAGLI']."', ".$_POST['DOMANDA_3'].", '".$_POST['DOMANDA_3_DETTAGLI']."')";  


    if (mysqli_query($conn, $query)) {
        echo "";
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($conn);
    }

?>