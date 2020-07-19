function load_filter_options(blockId) {
    let inProgress = false;
    if (!inProgress) {
        $.ajax({
            url: 'filter_options.php',
            method: 'POST',
            data: {
                "blockID": blockId
            },
            beforeSend: function () {
                inProgress = true;
            }
        }).done(function (data) {
            data = JSON.parse(data);
            if (data.length > 0) {
                $.each(data, function (index, data) {
                    $("#" + blockId).append("<option>" + data + "</option>");
                });
                inProgress = false;
            }
        });
    }
}