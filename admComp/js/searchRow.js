$(document).ready(function() {
    $("#searchInput").on("input", function() {
      var searchValue = $(this).val().toLowerCase();
      $(".fila-tabla").each(function() {
        var numero = $(this).find("td:eq(0)").text().toLowerCase();
        var estado = $(this).find("td:eq(1)").text().toLowerCase();
        if (numero.indexOf(searchValue) !== -1 || estado.indexOf(searchValue) !== -1) {
          $(this).show();
        } else {
          $(this).hide();
        }
      });
    });
  });
  