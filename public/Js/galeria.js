$(function () {
  'use strict'
  var Galeria = {
    getImages : function() {
      $.ajax({
        url: 'getImages',
        data: {},
        dataType: 'json',
        jsonp: 'jsoncallback'
      }).done(function (result) {
        var carouselLinks = []
        var linksContainer = $('#links')
        var baseUrl = ''
        if (result.data.length == 0) {
          linksContainer.html($('<div/>').prop('class', 'alert alert-warning')
          .append($('<strong/>').html('Ops! '))
          .append($('<span/>').html('Nenhuma foto cadastrada.. :(')))
        }
        
        $.each(result.data, function (index, photo) {
          baseUrl = '/Images/' + photo.nome_arquivo;
          $('<div/>').prop('class', 'image-container img-thumbnail')
              .append($('<a/>')
                  .append($('<img class="img-responsive ">')
                .prop('src', baseUrl ))
              .prop('href', baseUrl )
              .prop('title', photo.title)
              .attr('data-gallery', ''))
          .appendTo(linksContainer)
        })
      })
    }
  }
  Galeria.getImages()
});