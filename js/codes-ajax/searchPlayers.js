function searchName(namePlayer) {
  $.ajax({
    url: "includes/searchPlayers.php",
    method: "POST",
    data: {name:namePlayer},
    success: function(data){
      $('#resultPlayers').html(data);
    }
  });
}

$(document).ready(function(){
  searchName();

  $('#searchPlayers').keydown(function(){
    var namePlayer = $(this).val();
    if (namePlayer != ''){
      searchName(namePlayer);
    }
    else
    {
      searchName();
    }
  });
});

