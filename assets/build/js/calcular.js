$(document).ready(function () {
	$('#calcularMudanca').click(function() {
		var data = $('#form-mudanca').serializeArray();
		$.ajax({
			url: "http://localhost/awake/mudanca/calcular/",
                method: "POST",
                dataType: "json",
                async: false,
                data: {data:data},
				success: function (data) {
					$('#resultado').show();
					$('#rst').append('<h2>Serão necessário(s) <b style="color: #23527c">' + data + '</b> caminhões.</h2>');
				},
				error: function () {
					console.log('fufu');
				}
			});
	});

	$('#addCaixa').click(function() {
		var a = $('#tipo').html();
		var b = $('#qtd').html();
        $('#ultCaixa').append('<div class="form-group">');
        $('#ultCaixa').append(a);
        $('#ultCaixa').append('</div><div class="form-group">');
        $('#ultCaixa').append(b);
        $('#ultCaixa').append('</div></div><hr>');
      });
});