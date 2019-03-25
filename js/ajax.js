$("#submitSearch").click(function() {

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