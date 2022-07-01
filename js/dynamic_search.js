$(document).ready(function(){
  $('#ticketsearch').focus()

  $('#ticketsearch').on('keyup', function(){
    var search = $('#ticketsearch').val()
    $.ajax({
      type: 'POST',
      url: 'inc/ticket_search.php',
      data: {'ticketsearch': search},
      beforeSend: function(){
        $('#result').html('<img src="img/sys/pacman.gif">')
      }
    })
    .done(function(resultado){
      $('#result').html(resultado)
    })
    .fail(function(){
      alert('Connection error. Contact technical support to resolve problems related to this function. X(')
    })
  })
})