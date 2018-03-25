<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="/Css/galeria.css">
    <title>Lista de Arquivos</title>
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">LISTA DE IMAGENS CADASTRADAS</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">

            </ul>
            <form class="form-inline my-2 my-lg-0">
                <button class="btn btn btn-dark my-2 my-sm-0" type="button" onclick="window.location=('index')">Galeria</button>&nbsp;
                <button class="btn btn btn-dark my-2 my-sm-0" type="button" onclick="window.location=('create')">Upload de Fotos</button>
            </form>
        </div>
    </nav>
    <br>
    <div class="container">
        <div id="alerts">
            <div class="alert" role="alert" id="alert" hidden="true">
            </div>
        </div>
    </div>
    <br>
    <div class="container">
    <div class="card">
        <h5 class="card-header">Lista de Imagens</h5>
        <form name="form" id="form" method="post">
            <input type="hidden" name="id" id="id">
        <div class="card-body">
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col" width="20%">Imagem</th>
                    <th scope="col">Nome da Imagem</th>
                    <th scope="col" width="10%">&nbsp;</th>
                </tr>
                </thead>
                <tbody id="tbody">
                    <tr hidden>
                        <th scope="row">:id</th>
                        <td align="center"><div class="image-container img-thumbnail"><img src=":imageUrl" class="img-responsive" style="width:100%;height: auto"></div></td>
                        <td>:nameFile</td>
                        <td><button type="button" class="btn btn-danger"  data-toggle="modal" data-target="#confirmModal" onclick="List.setId(':id')">Excluir</button></td>
                    </tr>
                </tbody>
            </table>
        </div>
        </form>
    </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="confirmModal" tabindex="-1" role="dialog" aria-labelledby="confirmModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="confirmModalLabel">Atenção</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Deseja realmente excluir?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-danger" onclick="List.remove()">Excluir</button>
                </div>
            </div>
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
<script src="/../Js/list.js"></script>

</body>
</html>