$(document).ready(function() {
    $('#agereport').dataTable({
        // display everything
        "aaSorting": [[ 1, "asc" ]] // Sort by first column descending
    });
    $('#prospects').dataTable({
        // display everything
        "aaSorting": [[ 1, "asc" ]] // Sort by first column descending
    });
    $('#inventory').dataTable({
        // display everything
        "aaSorting": [[ 1, "asc" ]] // Sort by first column descending
    });

    $('#customerModal').bind('show', function () {
        document.getElementById ("xlInput").value = document.title;
    });

    function closeDialog () {
        $('#customerModal').modal('hide'); 
        };

    function okClicked () {
        document.title = document.getElementById ("xlInput").value;
        closeDialog ();
        };
});