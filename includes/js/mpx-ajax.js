jQuery(document).ready(function($) {
    $("#mpx-table-refresh").click(function() {
        $.ajax({
            url: mpx_ajax_var.url,
            type: 'post',
            data: { 
                action: 'refresh_table' ,
                nonce: mpx_ajax_var.nonce
            },
            success: function(data) {
                $("#mpx-container").html(data);
            }
        });
    });
});