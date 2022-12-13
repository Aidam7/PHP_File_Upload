<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
<?php
if($_FILES){
    $directory = "Uploads/";
    $file = $directory.basename($_FILES['uploadedFile']['name']);
    $fileType = strtolower(pathinfo($file, PATHINFO_EXTENSION));
    $uploadSuccess = true;
    if($_FILES['uploadedFile']['error'] != 0){
        echo("Chyba uploadu");
        $uploadSuccess = false;
    }
    elseif (file_exists($file)){
        echo("Soubor již existuje");
        $uploadSuccess = false;
    }
    elseif($_FILES["uploadedFile"]['size'] > 7000000){
        echo("Soubor je příliš velký");
        $uploadSuccess = false;
    }
    /*
    elseif($fileType != "audio/*" || $fileType != "image/*" || $fileType != "video/*"){
        echo("Soubor není správný typ");
        $uploadSuccess = false;
    }
    */

    if($uploadSuccess){
        $uploadedFiles = glob($directory."*");
        foreach ($uploadedFiles as $uploadedFile){
            if(is_file($uploadedFile)){
                unlink($uploadedFile);
            }
        }
        if(move_uploaded_file($_FILES['uploadedFile']['tmp_name'], $file)){
            echo("Soubor ".basename($_FILES['uploadedFile']['name'])." byl uložen");
        }
        else{
            echo("Nepodařilo se uložit soubor");
        }
    }
}
?>
<div class="container">
    <form class="mb-3" method="post" action="" enctype="multipart/form-data" >
        <label for="formFile" class="form-label">Nahrajte soubor</label>
        <input class="form-control" type="file" id="formFile" name="uploadedFile" accept="audio/*, video/*, image/*">
        <br>
        <input type="submit" value="Nahrát" name="submit" class="btn-primary btn">
    </form>
</div>

</body>
</html>
