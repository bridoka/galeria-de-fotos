<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="/Css/galeria.css">
    <title>Upload de Arquivos</title>
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">UPLOAD</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">

            </ul>
            <form class="form-inline my-2 my-lg-0">
                <button class="btn btn btn-dark my-2 my-sm-0" type="button" onclick="window.location=('index')">Galeria</button>&nbsp;
                <button class="btn btn btn-dark my-2 my-sm-0" type="button" onclick="window.location=('list')">Lista de Fotos</button>
            </form>
        </div>
    </nav>
    <br>
    <div class="container">
        <div id="alerts">
            <div class="alert" role="alert" id="alert" hidden="true">
                This is a primary alert—check it out!
            </div>
        </div>
    </div>
    <br>
    <div class="container">
    <div class="card">
        <h5 class="card-header">Upload de Foto</h5>
        <form name="form" id="form" method="post" enctype="multipart/form-data">
        <div class="card-body">
            <div class="input-group">
                <input type="file" name="image" id="image" accept="image/x-png,image/gif,image/jpeg">
            </div>
        </div>
        <div class="card-footer">
            <div class="form-group text-right">
                <button class="btn btn-primary" type="button" id="upload" name="upload">Upload</button>
            </div>
        </div>
        </form>
    </div>
    </div>


<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script
            src="https://code.jquery.com/jquery-3.3.1.min.js"
            integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
            crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="/../Js/upload.js"></script>

</body>
</html>