/*
Created 09/27/09										
Questions/Comments: jorenrapini@gmail.com						
COPYRIGHT NOTICE		
Copyright 2009 Joren Rapini
*/

$(document).ready(function(){
	// Place ID's of all required fields here.
	required = ["tracking_no","trkh","alamat"];
	
	required2 = ["paper","plastic","food","glass","metal","other"];
	
	// If using an ID other than #email or #error then replace it here
	email = $("#email");
	errornotice = $("#error");
	// The text to show up within a field when it is incorrect
	emptyerror = "Ruangan perlu diisi.";
	emailerror = "Sila isi emel dengan betul.";

	$("#login,#form1,#form_brng").submit(function(){	
		//Validate required fields
		for (i=0;i<required.length;i++) 
		{
			var input = $('#'+required[i]);
			if ((input.val() == "") || (input.val() == emptyerror)) 
			{
				input.addClass("needsfilled");
				input.val(emptyerror);
				errornotice.fadeIn(750);
			} 
			else 
			{
				input.removeClass("needsfilled");
			}
		}
		
		//at least 1 field is required
		total_error = 0;
		for (i=0;i<required2.length;i++) 
		{
			var input1 = $('#'+required2[i]);
			var input2 = $('#'+required2[i]+"pre");
			if ((input1.val() == "") || (input1.val() == emptyerror)) 
			{
				total_error = total_error+1;
			} 
		}
		
		if(total_error==6)
		{
		   alert("Please enter at least one data");
		   return false;
		}
		
	
		// Validate the e-mail.
		if (!/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/.test(email.val())) {
			email.addClass("needsfilled");
			email.val(emailerror);
		}
		//if any inputs on the page have the class 'needsfilled' the form will not submit
		if ($(":input").hasClass("needsfilled")) 
		{
			return false;
		} 
		else 
		{
			errornotice.hide();
			return true;
		}
	});
	
	// Clears any fields in the form when the user clicks on them
	$(":input").focus(function(){		
	   if ($(this).hasClass("needsfilled") ) {
			$(this).val("");
			$(this).removeClass("needsfilled");
	   }
	});
});	