<?php
include("../config.php");

$query = "INSERT INTO segnalazioni(id_utente, latitudine, longitudine, tipologia, nome_luogo, immagine, proposta, propostaText, motivazione)
                VALUES (".$_POST['id_utente'].",
                        ".$_POST['lat'].",
                        '".$_POST['long']."',
                        ".$_POST['tipologia'].",
                        '".$_POST['nameBuilding']."',
                        '".$_POST['immagine']."',
                        '".$_POST['selectProposta']."',
                        '".$_POST['textAreaProposta']."',
                        '".$_POST['motivazione']."')";

echo $query;

if (mysqli_query($conn, $query)) {
    echo "";
} else {
    echo "Error: " . $query . "<br>" . mysqli_error($conn);
}

?>