var List = {
    getAllImages: function () {
        $.ajax({
            url: "getImages",
            type: "POST",
            data: {},
            dataType: 'json',
            processData: false,
            contentType: false,
            success: function(retorno){
                List.listHtml(retorno.data,retorno.directoryImages);
            }
        });
        return false;
    },
    listHtml: function(data,directory) {
        var tbody = $("#tbody tr").html();
        var htmlBody = "<tr hidden>"+tbody+"</tr>";
        for(d in data){
            var html = "<tr>"+tbody+"</tr>";
            var htmlId = html.replace(":id", data[d].id);
            var htmlImage = htmlId.replace(":imageUrl", "/../Images/"+data[d].nome_arquivo);
            var htmlNameFile = htmlImage.replace(":nameFile", data[d].nome_arquivo);
            var htmlParam = htmlNameFile.replace(":id", data[d].id);
            var htmlNoHidden = htmlParam.replace("hidden", "");
            htmlBody += htmlNoHidden;
        }
        if (data.length == 0) {
            htmlBody = "<tr><td colspan='4'><div class='alert alert-warning'>Nenhuma foto cadastrada..</div></td></tr>"
        }
        $("#tbody").html(htmlBody);
    },
    remove: function (){
        $("#confirmModal").modal('hide');
        var id = $("#id").val();

        $.ajax({
            url: "remove",
            type: "POST",
            data: {'id':id},
            dataType: 'json',
            success: function(retorno){
                $("#alert").removeAttr("hidden");
                $("#alert").addClass("alert-success");
                $("#alert").html("Removido com sucesso!");
                List.getAllImages();
            }
        });
        return false;
    },
    setId: function(id) {
        $("#id").val(id);
    }
}

$(function () {
    List.getAllImages();
})