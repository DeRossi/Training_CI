$(document).ready(function () {
	$("#pro_name").keyup(function () {
		$.ajax({
			type: "POST",
			url: "http://training_ci.happy.cba/product/getproName",
			//url: "http://training_ci.happy.cba/product/getproName", ==> dddd
			data: {
				keyword: $("#pro_name").val()
			},
			dataType: "json",
			success: function (data) {
				if (data.length > 0) {
					$('#DropdownProName').empty();
					$('#pro_name').attr("data-toggle", "dropdown");
					$('#DropdownProName').dropdown('toggle');
				}
				else if (data.length == 0) {
					$('#pro_name').attr("data-toggle", "");
				}
				$.each(data, function (key,value) {
					if (data.length >= 0)
						$('#DropdownProName').append('<h3><li role="presentation">' + value['pro_name'] + '</li></h3>');
				});
			}
		});
	});
	$("ul.txtproname li").hover(function() {

	});

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