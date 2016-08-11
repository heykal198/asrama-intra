$(document).ready(function()
{
  //hide the all of the element with class msg_body
  $(".msg_body").hide();
  //toggle the componenet with class msg_body
  $(".msg_head1").click(function()
  {
    $(this).next(".msg_body").slideToggle(600);
  });
  
   $(".msg_head2").click(function()
  {
    $(this).next(".msg_body").slideToggle(600);
  });
   
   $(".msg_head3").click(function()
  {
    $(this).next(".msg_body").slideToggle(600);
  });
  
  $(".msg_head").click(function()
  {
  	var postid = $("input#item1").val();
  	var itemno = $("input#postid").val();
  	//	ajax start
  	var dataString = 'postid='+postid+'&itemno='+itemno;
  	
//  	$.ajax({
//  	type: "POST",
//  	url: "../jq_action/getItemInfo.php",
//  	data: dataString,
//  	success: function(){
//  	$('#kemaskini1').html("<?php echo $filename ?>");
//  	}
//  	})
  	//	ajax end
  	
  	$.post("../jq_action/getItemInfo.php", {postid: "85", itemno: "85"}, 
  		function(data){alert("data loaded: "+data);
  		});
  	
    $(this).next(".msg_body").slideToggle(600);
  });
});