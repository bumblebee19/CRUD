$(document).ready(function () {

    load_data();

    function load_data() {
        $.ajax({
            url: "fetch.php",
            method: "POST",
            success: function (data) {
                $('#user_data').html(data);
            }
        });
    };

    $('.add').click(function () {
        $('#action').val('insert');
        $('#form_action').val('Insert');
        $('#exampleModalLabel').text("Add");
        $('#user_form')[0].reset();
        $("#exampleModal").modal('show');

    });

    $('#user_form').on('submit', function (event) {
        event.preventDefault();
        var error_first_name = '';
        var error_last_name = '';
        var error_role = '';
        if ($('#first_name').val() == '') {
            error_first_name = 'First Name is required';
            $('#error_first_name').text(error_first_name);
            $('#first_name').css('border-color', '#cc0000');
        } else {
            error_first_name = '';
            $('#error_first_name').text(error_first_name);
            $('#first_name').css('border-color', '');
        }
        if ($('#last_name').val() == '') {
            error_last_name = 'Last Name is required';
            $('#error_last_name').text(error_last_name);
            $('#last_name').css('border-color', '#cc0000');
        } else {
            error_last_name = '';
            $('#error_last_name').text(error_last_name);
            $('#last_name').css('border-color', '');
        }
        if ($('#role').val() == '') {
            error_role = 'Role is required';
            $('#error_role').text(error_role);
            $('#role').css('border-color', '#cc0000');
        } else {
            error_role = '';
            $('#error_role').text(error_role);
            $('#role').css('border-color', '');
        }
        if (error_first_name != '' || error_last_name != '' || error_role != '') {
            return false;
        } else {
            var form_data = $(this).serialize();
            $.ajax({
                url: "action.php",
                method: "POST",
                data: form_data,
                success: function (data) {
                    $('#exampleModal').modal('hide');
                    load_data();

                }
            });
        }

    });

    $(document).on('click', '.edit', function () {
        $("#exampleModal").modal('show');
        var id = $(this).attr('id');
        var action = 'fetch_single';
        $.ajax({
            url: "action.php",
            method: "POST",
            data: {
                id: id,
                action: action
            },
            dataType: "json",
            success: function (data) {
                $('#first_name').val(data.first_name);
                $('#last_name').val(data.last_name);
                $('#status').val(data.status);
                $('#role').val(data.role);
                $('#action').val('update');
                $('#hidden_id').val(id);
                $('#exampleModalLabel').text("Update");
                $('#form_action').val('Update');

            }

        });

    });
    $(document).on('click', '.delete', function () {
        var id = $(this).attr("id");
        $('#myModal4').attr('data-id', id).modal('show');
        //console.log(id);
    });

    $(document).on('click', '#del_confirm', function (e) {
        var id = $(this).parent().parent().parent().parent().parent().attr('data-id');
        // console.log(id);
        var action = "delete";
        $.ajax({
            url: "action.php",
            method: "POST",
            data: {
                id: id,
                action: action
            },
            success: function (data) {
                $('#myModal4').modal('hide');
                load_data();
            }

        });
        return false;

    });

    $(document).on('change', '.status_d', function () {
        // console.log($(this).is(':checked'));
        $.ajax({
            url: "action.php",
            method: "POST",
            data: {
                id: $(this).data('id'),
                status: $(this).is(':checked'),
                action: "change_status"
            },
        });
    });

    $(document).on('click', '.mass_action', function () {
        var action = $(".exampleFormControlSelect1").val();

        if ($(".select").is(":checked")) {
            if (action == "select") {
                $('#myModal2').modal('show');
                $('#desc').text("Please select an action.");
            }
        } else {
            $('#myModal2').modal('show');
            $('#desc').text("Please select checkbox.");
        }
        if (action == "select") {

        } else {
            if (action == "delete_d" && $(".select").is(":checked")) {
                var id = $("input.select:checked").attr("value");
                $('#myModal4').attr('data-id', id).modal('show');
                // console.log(id);
            } else {
                var status = 0;
                if (action == "set_active") {
                    status = 1;
                }
                action = "change_status";
            }
            $.each($(".select:checked"), function (k, v) {
                $.ajax({
                    url: "action.php",
                    method: "POST",
                    data: {
                        id: $(v).val(),
                        status: status,
                        action: action
                    },
                });
            })
            load_data();
        }
    });

});