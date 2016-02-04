$(document).ready(function () {
	$("#pro_name").keyup(function () {
		var value_input_ = $(this).val();
		$.post('/product/ajax_getproName', {value_input : value_input_}, function(data, textStatus, xhr) {
			rs = JSON.parse(data);
			console.log(rs.length);

			console.log(rs);

			console.log(data);

			console.log(value_input_);
			$(".dropdown-menu.txtproname").html("");
			if(rs.length > 0 || value_input!=""){
				$.each(rs, function(index, val) {
					$(".dropdown-menu.txtproname").append('<h4><b><li>'+val+'</li></b></h4>');
					console.log(val);
				});
				$(".dropdown-menu.txtproname").show();
			}else{
				$(".dropdown-menu.txtproname").html("");
				$(".dropdown-menu.txtproname").hide();
			}

			$(".dropdown-menu li").click(function(event) {
				$(".dropdown-menu.txtproname").hide();
			});
		});
	});

	/*$("#pro_name").keyup(function() {
		var value_input_ = $(this).val();
		$.ajax({
			url: '/product/ajax_getproName',
			type: 'POST',
			dataType: 'json',
			data: value_input_,
		})
		rs = JSON.parse(data);
		.done(function() {
			console.log(rs);
			console.log("success");
		})
		.fail(function() {
			console.log("error");
		})
		.always(function() {
			console.log("complete");
		});

	});*/

	$('ul.txtproname').on('click', 'li', function () {
		$('#pro_name').val($(this).text());
	});
	//_____________________________________________________________________________________________________

	$('.pro_price').keyup(function(event) {
		var $this = $(this);
		var num = $this.val().replace(/,/g, '');
		var_tmp = num.replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1,");
		$this.val(var_tmp);
		console.log(var_tmp);

		//var str = CommandToDot($(this).val());
		console.log(str);
		$('.pro_price').val(str);
	});



});