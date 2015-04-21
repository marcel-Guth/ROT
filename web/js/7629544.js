var tableToExcel = (function () {
    var uri = 'data:application/vnd.ms-excel;base64,',
        template = '<html xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:x="urn:schemas-microsoft-com:office:excel" xmlns="http://www.w3.org/TR/REC-html40"><head><!--[if gte mso 9]><xml><x:ExcelWorkbook><x:ExcelWorksheets><x:ExcelWorksheet><x:Name>{worksheet}</x:Name><x:WorksheetOptions><x:DisplayGridlines/></x:WorksheetOptions></x:ExcelWorksheet></x:ExcelWorksheets></x:ExcelWorkbook></xml><![endif]--></head><body><table>{table}</table></body></html>',
        base64 = function (s) {
            return window.btoa(unescape(encodeURIComponent(s)));
        }, format = function (s, c) {
            return s.replace(/{(\w+)}/g, function (m, p) {
                return c[p];
            });
        };
        
    return function (table, name) {
        if (!table.nodeType) table = document.getElementById(table);
        var ctx = {
            worksheet: name || 'Worksheet',
            table: table.innerHTML
        };
        window.location.href = uri + base64(format(template, ctx));
    };
})();

//$(function(){$("#tableSelect").change(showHideTable);});
function showHideTable()
{
    var val;
    try{
        val = document.getElementById("tableSelect").value;
    }
    catch(err)
    {
        val = "NAWExportTable";
    }
    if(val === "NAWExportTable")
    {
        document.getElementById("NAWExportTable").style.display="table";
        document.getElementById("NAWExportTableButton").style.display="";
        document.getElementById("StartbewijzenTable").style.display="none";
        document.getElementById("StartbewijzenTableButton").style.display="none";
        document.getElementById("DiversenTable").style.display="none";
        document.getElementById("DiversenTableButton").style.display="none";
    } else if(val === "StartbewijzenTable")
    {
        document.getElementById("NAWExportTable").style.display="none";
        document.getElementById("NAWExportTableButton").style.display="none";
        document.getElementById("StartbewijzenTable").style.display="table";
        document.getElementById("StartbewijzenTableButton").style.display="";
        document.getElementById("DiversenTable").style.display="none";
        document.getElementById("DiversenTableButton").style.display="none";
    } else //diversen
    {
        document.getElementById("NAWExportTable").style.display="none";
        document.getElementById("NAWExportTableButton").style.display="none";
        document.getElementById("StartbewijzenTable").style.display="none";
        document.getElementById("StartbewijzenTableButton").style.display="none";
        document.getElementById("DiversenTable").style.display="table";
        document.getElementById("DiversenTableButton").style.display="";
    }
}