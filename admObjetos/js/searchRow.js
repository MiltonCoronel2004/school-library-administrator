$(document).ready(function() {
  $("#searchInput").on("input", function() {
    var searchValue = $(this).val().toLowerCase();
    var exactMatch = false;
    
    // Verificar si hay un punto en la búsqueda
    if (searchValue.includes(".")) {
      var parts = searchValue.split(".");
      if (parts.length === 2 && parts[1].trim() === "") {
        // Si hay un punto y no hay nada después, considerarlo como búsqueda exacta
        searchValue = parts[0].trim();
        exactMatch = true;
      }
    }
    
    $(".fila-tabla").each(function() {
      var nombreLibro = $(this).find("td:eq(0)").text().toLowerCase();
      var autor = $(this).find("td:eq(1)").text().toLowerCase();
      
      if (exactMatch) {
        // Búsqueda exacta
        if (nombreLibro === searchValue || autor === searchValue) {
          $(this).show();
        } else {
          $(this).hide();
        }
      } else {
        // Búsqueda regular
        if (nombreLibro.indexOf(searchValue) !== -1 || autor.indexOf(searchValue) !== -1) {
          $(this).show();
        } else {
          $(this).hide();
        }
      }
    });
  });
});
