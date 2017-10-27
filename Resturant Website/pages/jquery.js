
    $(document).ready(function(){
		
		
      $('#slideshow').slick({						  
		  slidesToShow: 1,
		  slidesToScroll: 1,
		  autoplay: true,
		  autoplaySpeed: 2000,
		  infinite: true,
		  fade: true,
		  adaptiveHeight: true,
		  cssEase: 'Linear'  
      });
	  
	  $("table").click(function(){
		  
		$('td', this).toggle("slow");		
		
		});
		
		$('#navihide i').click(function(){
			
			$('#navihide nav').toggle('slow');			
		
		});
		
		
	$('#submitform').click(function(){
		
		var message = document.getElementById("message");;
		var playername = $('#firstname').val();
		var sex;
				for(var i=0 ; i<document.form.sex.length ; i++)
				{
					if(document.form.sex[i].checked == true)
					{
						sex=document.form.sex[i].value;
					}
				}
		
		var address = $('#address').val();
		var tnc = "disagree";
		
				if(document.form.tnc.checked == true)
				{
					tnc = document.form.tnc.value;
				}
		
		if(playername=="" || sex=="" || address=="" || tnc=="disagree")
		{
			$('#message').css('color', 'red');
			message.textContent="Please fill all mandatory fields with * sign.";
		}
		
		else
		{		
			$('#message').css('color', 'green');
			message.textContent="Thanks For Providing Your Information. We will be in contact with you shortly.";	
		}
		
	});
		
		
	});
	
  