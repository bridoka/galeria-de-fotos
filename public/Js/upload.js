var Upload = {
    validateType: function () {
        var image = $("#image").val();
        if(image != "" && image != undefined){
            var part = image.split(".");
            var validTypes = ['jpeg','jpg','png','gif'];
            if($.inArray(part[1],validTypes) == -1){
                $("#image").val("");
                $("#alert").removeAttr("hidden");
                $("#alert").addClass("alert-warning");
                $("#alert").html("Formato de arquivo não permitido. Extensões válidas para upload: png,jpeg,jpg,gif.");
                return false;
            } else {
                $("#alert").attr("hidden",true);
                $("#alert").html("");
                return true;
            }
        }
    },
    validateSetField: function () {
        var image = $("#image").val();
        if(image != "" && image != undefined){
            return true;
        } else {
            $("#alert").removeAttr("hidden");
            $("#alert").addClass("alert-warning");
            $("#alert").html("Informe um arquivo. Extensões válidas para upload: png,jpeg,jpg,gif.");
        }
        return false;
    },
    start: function () {
        if(Upload.validateSetField()){
            if(Upload.validateType()){
                Upload.upload();
                var files = !!$("input[type=file]")[0].files ? $("input[type=file]")[0].files : [];
                if (!$("input[type=file]").length || !window.FileReader) return;

                if (/^image/.test( files[0].type)){
                    var reader = new FileReader();
                    reader.readAsDataURL(files[0]);
                    reader.onload = function(){
                        //console.log(this.result);
                    }
                }
            }
        }
    },
    upload: function () {
        // Pega os dados do form
        var form = document.getElementById('form');

        // Instância o FormData passando como parâmetro o formulário
        var formData = new FormData(form);

        // Envia O FormData através da requisição AJAX
        $.ajax({
            url: "upload",
            type: "POST",
            data: formData,
            dataType: 'json',
            processData: false,
            contentType: false,
            success: function(retorno){
                if (retorno.success == '1'){
                    $("#alert").removeAttr("hidden");
                    $("#alert").addClass("alert-success");
                    $("#alert").html("Upload realizado com sucesso.");
                    $("#image").val("");
                }else{
                    $("#alert").removeAttr("hidden");
                    $("#alert").addClass("alert-alert");
                    $("#alert").html("Não foi possível fazer o upload.");
                    $("#image").val("");
                }
            }
        });

        return false;
    }
}

$(function () {
    $("#upload").on('click', function(){
        Upload.start();
    });

    $("#image").on('change', function(){
        Upload.validateType();
    });
})