function searchName(name) {
  $.ajax({
    url: "includes/searchTorneios.php",
    method: "POST",
    data: {name:name},
    success: function(data){
      $('#resultTorneios').html(data);
    }
  });
}

$(document).ready(function(){
  searchName();

  $('#searchTorneios').keydown(function(){
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

