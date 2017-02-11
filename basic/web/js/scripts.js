	$(document).on("click", ".table-bordered input:checkbox" ,function() {
		if (this.checked) {
			var id = $(this).val();
			$.post('/admin/default/ajaxhome', {id: id}, function (data) {
				$(".application-index").html(data);
			},"text");
		}     
	});