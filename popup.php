<?php
    //include("config.php");
    include("session.php");
    
    $query = "SELECT * FROM segnalazioni";  

    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        echo "[";
        while ($obj = $result->fetch_object()) {
            echo "{";

            echo "\"id\": " . $obj->id . ", ";
            echo "\"userId\": " . $_SESSION['login_user_id'] . ", ";
            echo "\"latitudine\": " . $obj->latitudine . ", ";
            echo "\"longitudine\": " . $obj->longitudine . ", ";
            echo "\"tipologia\": \"" . $obj->tipologia . "\", ";
            echo "\"nome\": \"" . $obj->nome_luogo . "\", ";
            echo "\"proposta\": \"" . $obj->proposta . "\", ";
            echo "\"propostaText\": \"" . $obj->propostaText . "\", ";
            echo "\"immagine\": \"" . $obj->immagine . "\", ";
            echo "\"motivazione\": \"" . $obj->motivazione . "\", ";

            if($_SESSION['login_user_name'] == ""){
                //non sono loggato -> button disable
                echo "\"opinione\": ". -2;
            }else{
                //sono loggato controllo se ho votato
                $sql="SELECT * FROM valutazioni_segnalazioni WHERE id_segnalazione=".$obj->id." and id_utente=".$_SESSION['login_user_id'];
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
                        //like
                        echo "\"opinione\": ". 1;
                    }else{
                        //unlike
                        echo "\"opinione\": ". 0;
                    }
                }else{
                    //loggato non votato
                    echo "\"opinione\": " . -1;
                }
            }
            
            echo "},";
        }
        echo "]";
    } else {
        echo "0 results";
    }

?>