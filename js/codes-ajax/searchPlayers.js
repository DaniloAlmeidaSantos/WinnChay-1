function searchName(name) {
  $.ajax({
    url: "includes/searchPlayers.php",
    method: "POST",
    data: {name:name},
    success: function(data){
      $('#resultPlayers').html(data);
    }
  });
}

$(document).ready(function(){
  searchName();

  $('#searchPlayers').keydown(function(){
    var name = $(this).val();
    if (name != ''){
      searchName(name);
    }
    else
    {
      searchName();
    }
  });
});

