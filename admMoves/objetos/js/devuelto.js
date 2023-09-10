$(document).ready(function() {
$('.fila-tabla').on('dblclick', function() {
    var devueltoCell = $(this).find('td:last-child');
    var devuelto = devueltoCell.text().trim();
    
    if (devuelto === 'No') {
    var id = $(this).data('id');

    $.ajax({
        url: '../php/devuelto.php',
        method: 'POST',
        data: {id: id}
        });
        }
    });
});
  