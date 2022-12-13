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
}
?>
<div class="container">
    <form class="mb-3" method="post" action="" enctype="multipart/form-data">
        <label for="formFile" class="form-label">Nahrajte soubor</label>
        <input class="form-control" type="file" id="formFile" name="uploadedFile">
        <br>
        <input type="submit" value="Nahrát" name="submit" class="btn-primary btn">
    </form>
</div>

</body>
</html>
