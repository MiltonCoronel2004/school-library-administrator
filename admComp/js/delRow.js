$(document).ready(function() {
    // Manejador de eventos para el botón de eliminar
    $("#delButton").click(function() {
      // Obtener el numero identificador de la computadora a eliminar de la fila seleccionada
      var id = $(".fila-tabla.selected").attr("id");
      
      if (id) {
        // Confirmar la eliminación con el usuario
        var confirmacion = confirm("¿Está seguro de que desea eliminar la computadora seleccionada?");
        
        if (confirmacion) {
          // Enviar una solicitud AJAX para eliminar el registro
          $.ajax({
            type: "POST",
            url: "delNote.php",
            data: { id: id },
            success: function() {
              // Si la eliminación es exitosa, elimina la fila de la tabla HTML
              $(".fila-tabla.selected").remove();
            }
          });
        }
      } else {
        alert("No se seleccionó ninguna computadora para eliminar");
      }
    });
  });