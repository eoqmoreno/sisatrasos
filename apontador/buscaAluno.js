$(document).ready(function(){
	$('#buscar').keyup(function() {




		$('form').submit(function() {

			var dados = $(this).serialize()
;			$.ajax({

				url: 'buscaAluno.php',
				type: 'POST',
				dataType: 'html',
				data: dados,
				success: function(data) {
					$('#alunos').empty().html(data);
				}
			});
			return false;


		});
		$('form').trigger('submit');
	});


});