<?php
include("config.php");

$valid_extensions = array('jpeg', 'jpg', 'png', 'gif', 'bmp' , 'pdf'); // valid extensions
$uploaddir  = 'uploads/'; // upload directory

if (isset($_FILES['inputImgFileName']) && is_uploaded_file($_FILES['inputImgFileName']['tmp_name'])) {
    $img = $_FILES['inputImgFileName']['name'];
    $tmp = $_FILES['inputImgFileName']['tmp_name'];

    if (move_uploaded_file($tmp, $uploaddir . $img)) {
        //Se l'operazione è andata a buon fine...
        echo 'File inviato con successo.';
    }else{
        //Se l'operazione è fallta...
        echo 'Upload NON valido!';
    }

}



$query = "INSERT INTO segnalazioni(id_utente, latitudine, longitudine, tipologia, nome_luogo, immagine, proposta, motivazione)
                VALUES (".$_POST['userId'].",
                        ".$_POST['coordinateSegnalazioneLat'].",
                        '".$_POST['coordinateSegnalazioneLng']."',
                        ".$_POST['tipologiaSegnalazioneHidden'].",
                        '".$_POST['inputNameBuilding']."',
                        '".$_FILES['inputImgFileName']['name']."',
                        '".$_POST['selectProposta']."',
                        '".$_POST['textAreaMotivazione']."')";

echo $query;

if (mysqli_query($conn, $query)) {
    echo "";
} else {
    echo "Error: " . $query . "<br>" . mysqli_error($conn);
}

?>