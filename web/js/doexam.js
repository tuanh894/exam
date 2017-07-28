$(document).ready(function() {
	// console.log(val);
	//get array form doexam.php
	var answer = '';
	var data = {};
	var question_data = $('.question-data').data().model;
	var exam_id= $('.question-data').data().id;
	console.log(exam_id);
	var url = $('.question-data').data().url;
	console.log(url)
	console.log(question_data);
	$('.answer').on('click',function() {
		answer = $(this).val();
		$('.btn-next').prop("disabled", false);
	});	
	// xy ly button next
	$('.btn-next').on('click', function() {
		var btnNext = this;
		//disable next 
		$('.btn-next').prop("disabled", true);
		var numb = parseInt(btnNext.id);
		var len = question_data.length;
		$('.answer').prop('checked', false);
		var question_id = $('.ques-id').attr('id');

		console.log(question_id);
		console.log(answer)
		data[question_id] = answer;
		console.log(data);
		if (numb == len - 1) {
			$('.btn-next').prop("disabled", true);
		}

		if (numb < len - 1) {
			numb += 1;
			$('.ques-id').empty();
			$('.ques-id').append('Question : '+ (numb + 1));
			$('.ques-id').attr('id', question_data[numb]['question_id']);

			$('.ques-content').empty();
			$('.ques-content').append(question_data[numb]['content_question']);

			$('.answer_a').empty();
			$('.answer_a').append(question_data[numb]['answer_a']);			

			$('.answer_b').empty();
			$('.answer_b').append(question_data[numb]['answer_b']);	

			$('.answer_c').empty();
			$('.answer_c').append(question_data[numb]['answer_c']);	

			$('.answer_d').empty();
			$('.answer_d').append(question_data[numb]['answer_d']);		

			btnNext.id = numb;
		} else {
			$('.btn-next').hide();
			$('.btn-submit').show();
		}
		
	});
	
	$('.btn-submit').on('click', function(){
		$.post(url, {data: data }, function(res){
			if (res != null) {
				var result = JSON.parse(res);
				var totalAnswer = Object.keys(result).length - 1;
				var rightAnswer = result.point / 2;
				var point = result.point;
				$('.modal-answer').append(rightAnswer + '/' + totalAnswer);
				$('.modal-score').append(point);
			}
		});
	});

	
})