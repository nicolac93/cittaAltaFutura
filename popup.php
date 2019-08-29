<?php
    include("./config.php");
    
    $query = "SELECT * FROM segnalazioni";  

    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        echo "[";
        while ($obj = $result->fetch_object()) {
            echo "{";

            echo "\"id\": " . $obj->id . ", ";
            echo "\"latitudine\": " . $obj->latitudine . ", ";
            echo "\"longitudine\": " . $obj->longitudine . ", ";
            echo "\"tipologia\": \"" . $obj->tipologia . "\", ";
            echo "\"nome\": \"" . $obj->nome_luogo . "\", ";
            echo "\"proposta\": \"" . $obj->proposta . "\", ";
            echo "\"propostaText\": \"" . $obj->propostaText . "\", ";
            echo "\"immagine\": \"" . $obj->immagine . "\", ";
            echo "\"motivazione\": \"" . $obj->motivazione . "\" ";
            
            echo "},";
        }
        echo "]";
    } else {
        echo "0 results";
    }

?>