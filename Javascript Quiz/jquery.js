$(document).ready(function(){
	
	$('#submitform').click(function(){
		
		var quiz = $('quiz');
		var form = $('form');
		var message1 = document.getElementById("message1");
		var message2 = document.getElementById("message2");
		var playername = $('#firstname').val();
		var sex;
				for(var i=0 ; i<document.form.sex.length ; i++)
				{
					if(document.form.sex[i].checked == true)
					{
						sex=document.form.sex[i].value;
					}
				}
		
		var country = $('#country').val();
		var tnc = "disagree";
		
				if(document.form.tnc.checked == true)
				{
					tnc = document.form.tnc.value;
				}
		
		if(playername=="" || sex=="" || country=="" || tnc=="disagree")
		{
			$('#message1').css('color', 'red');
			message1.textContent="Please fill all mandatory fields with * sign.";
		}
		
		else
		{
			alert("Welcome "+playername+".\nThanks for Submiting your details.");
			$('#container').slideUp('slow');	
			form.hide();
			$('#quiz').show('fast');
			$('#q1').show('slow');
			$('#container').slideDown('slow');
			
			$('#nextq2').click(function()
			{
				if(document.quiz.q1[0].checked == false && document.quiz.q1[1].checked == false && document.quiz.q1[2].checked == false && document.quiz.q1[3].checked == false)
				{							
					alert("You have to choose one of the options below.");
				}
				
				else
				{
					$('#container').slideUp('slow');							
					$('#q1').hide('slow');
					$('#q2').show('slow');
					$('#container').slideDown('slow');					
				}
			});
			
			$('#nextq3').click(function()
			{
				if(document.quiz.q2.value == "nothing")
				{
					alert("You have to choose one answer from the below options.!!");
				}
				
				else
				{
							$('#container').slideUp('slow');							
							$('#q2').hide('slow');
							$('#q3').show('slow');
							$('#container').slideDown('slow');
				}
			});
			
			$('#nextq4').click(function()
			{
				if(document.quiz.q3.value == "" || (document.quiz.q3.value != "20" && document.quiz.q3.value != "twenty" && document.quiz.q3.value != "TWENTY" && document.quiz.q3.value != "24" && document.quiz.q3.value != "twenty four" && document.quiz.q3.value != "TWENTY FOUR" && document.quiz.q3.value != "25" && document.quiz.q3.value != "twenty five" && document.quiz.q3.value != "TWENTY FIVE" && document.quiz.q3.value != "26" && document.quiz.q3.value != "twenty six" && document.quiz.q3.value != "TWENTY SIX"))
				{
					alert("Please type your answer according to options given in the text-box below.!!");
				}
				
				else
				{
							$('#container').slideUp('slow');							
							$('#q3').hide('slow');
							$('#q4').show('slow');
							$('#container').slideDown('slow');
				}
			});
			
			$('#nextq5').click(function()
			{
				if(document.quiz.q4[0].checked == false && document.quiz.q4[1].checked == false && document.quiz.q4[2].checked == false && document.quiz.q4[3].checked == false)
				{
					alert("You have to choose atleast one from the below options of answer.!!");
				}
				
				else
				{	
					$('#container').slideUp('slow');							
					$('#q4').hide('slow');
					$('#q5').show('slow');
					$('#container').slideDown('slow');					
				}
			});
			
			$('#prevq1').click(function()
			{
				$('#container').slideUp('slow');							
				$('#q2').hide('slow');
				$('#q1').show('slow');
				$('#container').slideDown('slow');
			});
			
			$('#prevq2').click(function()
			{
				$('#container').slideUp('slow');							
				$('#q3').hide('slow');
				$('#q2').show('slow');
				$('#container').slideDown('slow');
			});
			
			$('#prevq3').click(function()
			{
				$('#container').slideUp('slow');							
				$('#q4').hide('slow');
				$('#q3').show('slow');
				$('#container').slideDown('slow');
			});
			
			$('#prevq4').click(function()
			{
				$('#container').slideUp('slow');							
				$('#q5').hide('slow');
				$('#q4').show('slow');
				$('#container').slideDown('slow');
			});
			
			$('#submitanswer').click(function()
			{
				var score=0;
				var wrong=0;
				var right=0;
				var feedback=document.getElementById("feedback")
				
				if(document.quiz.q1[3].checked == true)
				{
					score=score+5;
					right++;
				}				
				else
				{
					score=score-3;
					wrong++;
				}
				
				if(document.quiz.q2.value == 21)
				{
					score=score+5;
					right++;
				}
				else
				{
					score=score-3;
					wrong++;
				}
				
				if(document.quiz.q3.value == "24" || document.quiz.q3.value == "twenty four" || document.quiz.q3.value == "TWENTY FOUR")
				{
					score=score+5;
					right++;
				}
				else
				{
					score=score-3;
					wrong++;
				}
				
				if(document.quiz.q4[0].checked == true && document.quiz.q4[2].checked == true && document.quiz.q4[3].checked == true)
				{
					score=score+5;
					right++;
				}
				else
				{
					score=score-3;
					wrong++;
				}
				
				if(document.quiz.q5[0].checked == true)
				{
					score=score+5;
					right++;
				}
				else
				{
					score=score-3;
					wrong++;
				}
				
				$('#container').slideUp('slow');							
				$('#q5').hide('slow');
				$('#feedback').show('slow');
				$('#container').slideDown('slow');
				
				feedback.textContent="Your Score is : "+score+" | No. of right of answers : "+right+" | No. of wrong answers : "+wrong;
				
			});
			
			
			
		}
		
		
	});
	
	
})