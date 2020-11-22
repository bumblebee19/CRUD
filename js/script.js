$(document).ready(function () {

	$('[data-toggle="tooltip"]').tooltip();

	$('#selectAll').click(function () {
		$('.select').prop('checked', this.checked);
	});

	$('.select').change(function () {
		var check = ($('.select').filter(":checked").length == $('.select').length);
		$('#selectAll').prop("checked", check);
	});
	$("input.status_d").on("click", function () {
		if ($(this).is(':checked')) {
			$(this).val("1");
		} else {
			$(this).val("0");
		}
	})
	$(document).on('click', '.edit', function ChangeStatus() {
		var input = $('#status').val();
		if (input === "1") {
			$("#status").prop('checked', true);
		} else {
			$("#status").prop('checked', false);
		}
		setTimeout(ChangeStatus, 100);
	});


});
