$(document).ready(function(){
  $('#search').focus()

  $('#search').on('keyup', function(){
    var search = $('#search').val()
    $.ajax({
      type: 'POST',
      url: 'php/searchN2.php',
      data: {'search': search},
     /* beforeSend: function(){
        $('#result').html('<img src="img/pacman.gif">')
      } */
    })
    .done(function(resultado){
      $('#result2').html(resultado)
    })
    .fail(function(){
      alert('Hubo un error :(')
    })
  })
})