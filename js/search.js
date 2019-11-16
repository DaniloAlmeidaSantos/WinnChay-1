function searchName(name) {
  $.ajax({
    url: "includes/search.php",
    method: "POST",
    data: {name:name},
    success: function(data){
      $('#result').html(data);
    }
  });
}

$(document).ready(function(){
  searchName();

  $('#search').keyup(function(){
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

