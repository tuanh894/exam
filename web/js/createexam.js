$(document).ready(function(){

	// console.log($('.content_question').val(''));
	// $('.answer').val('');
	// $('.answer_a').val('');
	// $('.answer_b').val('');
	// $('.answer_c').val('');
	var url_exam = $('.exam').data().exam;
	var url_question = $('.exam').data().question;
	$('.create').on('click',function(e){
		e.preventDefault();

		var data = {};
		data['exam_title'] = $('.exam_title').val();
		$.post(url_exam, {exam: data }, function(res){
			if (res != null) {
				$('.create').hide();
				$('.exam_title').attr('disabled','disabled');
				$('.question').show();
				$('.addQuestion').show();
				$('.addQuestion').attr('id', res);
			}
		})
	})
	$('.addQuestion').on('click', function(e){
		e.preventDefault();
		var questionNumb = $('.ques-id').text();
		if (questionNumb >= 5 ) {
			$('.addQuestion').hide();
			$('.done').show();
		}else{
		var data = {};
		data['id'] = $('.addQuestion').attr('id');
		console.log(questionNumb)
		data['content_question'] = $('.content_question').val();
		data['answer'] = $('.answer').val();
		data['answer_a'] = $('.answer_a').val();
		data['answer_b'] = $('.answer_b').val();
		data['answer_c'] = $('.answer_c').val();
		data['answer_d'] = $('.answer_d').val();
		$.post(url_question,{data: data}, function(res){
			if (res == "1") {
				console.log('sdvsdv')
				$('.ques-id').empty();
				$('.ques-id').append(parseInt(questionNumb) + 1);

				$('.content_question').val('');
				$('.answer').val('');
				$('.answer_a').val('');
				$('.answer_b').val('');
				$('.answer_c').val('');
				$('.answer_d').val('');
			} else{

			}
		})
	}
	})

})
