function toggleTable(tablename) {
    var table = document.getElementById(tablename);
    table.style.display = (table.style.display == "table") ? "none" : "table";
    return false;
}

$(document).ready(function() 
    { 
        $('.dataTables_wrapper>div').remove(); //hide the export stuff
    } 
); 