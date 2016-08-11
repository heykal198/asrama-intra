/* Created by jankoatwarpspeed.com */

(function($) {
    $.fn.formToWizard = function(options,stp,noRUJ) {
        options = $.extend({  
            submitButton: "" 
        }, options); 
        
        var element = this;

        var steps = $(element).find("fieldset");
		 var actual = stp;
        var count = steps.size();
        var submmitButtonName = "#" + options.submitButton;
		var ur=window.location.pathname;
		
        $(submmitButtonName).hide();

        // 2
        $(element).before("<ul id='steps'></ul>");

        steps.each(function(i) {
            $(this).wrap("<div id='step" + i + "'></div>");
            $(this).append("<p id='step" + i + "commands'></p>");

            // 2
            var name = $(this).find("legend").html();
            $("#steps").append("<li id='stepDesc" + i + "'><a href='viewformedit.php?step="+i+"&noRUJ="+noRUJ+"' id='goto"+i+"'>Step " + (i + 1) + "<span>" + name+ "</span></a></li>");
		

            if(stp==0) //ni aku tambah-----------------------------------------------------
			{
				if (i == 0) {
                createNextButton(i);
					selectStep(i);
				}
				else if (i == count - 1) {
					$("#step" + i).hide();
					createPrevButton(i);
				}
				else {
					$("#step" + i).hide();
					createPrevButton(i);
					createNextButton(i);
				}
			}
			else//ni aku tambah-----------------------------------------------------
			{
				selectStep(stp);
				
				if(i!=stp)
				{
					$("#step" + i).hide();
				}
		
				if (i == 0) {
                	createNextButton(i);
				}
				else if (i == count - 1) {
					createPrevButton(i);
				}
				else {
					createPrevButton(i);
					createNextButton(i);
				}
			}
			
        });

        function createPrevButton(i) {
            var stepName = "step" + i;
			var sN =  i - 1;
            $("#" + stepName + "commands").append("<a href='viewformedit.php?step="+sN+"&noRUJ="+noRUJ+"' id='goto"+ stepName + "Prev' class='prev'>< Sebelum</a>");

            $("#" + stepName + "Prev").bind("click", function(e) {
                $("#" + stepName).hide();
                $("#step" + (i - 1)).show();
                $(submmitButtonName).hide();
                selectStep(i - 1);
            });
        }

        function createNextButton(i) {
            var stepName = "step" + i;
			var sN =  i + 1;
            $("#" + stepName + "commands").append("<a href='viewformedit.php?step="+sN+"&noRUJ="+noRUJ+"' id='goto" + stepName + "Next' class='next'>Seterusnya ></a>");

            $("#" + stepName + "Next").bind("click", function(e) {
                $("#" + stepName).hide();
                $("#step" + (i + 1)).show();
                if (i + 2 == count)
                    $(submmitButtonName).show();
                selectStep(i + 1);
            });
        }

        function selectStep(i) {
            $("#steps li").removeClass("current");
            $("#stepDesc" + i).addClass("current");
        }

    }
})(jQuery); 