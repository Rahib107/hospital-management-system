$("button#submit").click(function() {
  
  if ($( "#firstname").val()==" " || $("#lastname").val()==)
  	$("div#ack").html("plz indert both");
  else
  	$.post( $("#form").attr("action"),
  		    $("#form :input").serializeArray(),
  		    function(data){
  		    	$("div#ack").html(data);
  		    });

  $("#form").submit(function(){
  	return false;


       };



});