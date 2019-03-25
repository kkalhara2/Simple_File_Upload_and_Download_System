$("#submitSearch").click(function() {
    $('table tbody tr').append('<img src="images/ajax-loading.gif" style="width: 50%;">');
    $.ajax({
        url: 'downloadProcess.php',
        type: 'POST',
        data: $('#browse-notes').serialize(),
        async:true,
        success: function(response){
            $('table tbody tr').remove();
            $('table tbody').append(response);
        }
    });
});
