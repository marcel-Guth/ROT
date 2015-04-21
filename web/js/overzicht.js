jQuery(document).ready(function(){
    (function(){
        update();
        color();
        setTimeout(arguments.callee,10000);
    })();
});

function update()
{
    jQuery.ajax({
        url: "bloemencorso/get-vehicles.php",
        success: function (data) {
            var tabel = "<table><thead><th width=100>voertuig id</th><th width=100>volgnummer</th><th width=400>titel</th><th width=100>lat</th><th width=100>long</th><th width=100>koers</th><th width=100>snelheid</th><th width=100>voltage</th><th width=200>laatste update</th></thead>";
            data = jQuery.parseJSON(data);
            for (var v = 0; v < data.vehicles.length; v++) {
                for (var d = 0; d < data.data.length; d++) {
                    if (data.data[d].imei.substr(1) === data.vehicles[v].imei) {
                        for (var l = 0; l < data.location.length; l++) {
                            if (data.location[l].data_id === data.data[d].id) {
                                    tabel += "<tr><td>"+ data.vehicles[v].id +"</td><td>"+ data.vehicles[v].volgorde +"</td><td>"+ data.vehicles[v].title +"</td><td>"+ data.location[l].lat +"</td><td>"+ data.location[l].lon +"</td><td>"+ data.location[l].course +"</td><td>"+ data.location[l].speed +"</td><td>"+ data.data[d].volt +"</td><td>"+ data.vehicles[v].last_update +" GMT</td></tr>";
                            }
                        }
                    }
                }
            }
            tabel += "</table>";
            document.getElementById("tabel").innerHTML = tabel;
            if(data.vehicles != null)
            {
                color(data);   
            }
        }
    });
    console.log("bijna");
    
}

function color(data){
    if(data != null)
    {
        tr = jQuery('tbody tr');
                jQuery(tr).each(function(index){
                    if(index < data.vehicles.length)
                    {
                        var sqlDate = Date.parse(data.vehicles[index].last_update);
                        var local = new Date();
                        var diff = local+local.getTimezoneOffset()*60 - sqlDate+sqlDate.getTimezoneOffset()*60;

                        if(diff > 300){ console.log(index); jQuery(this).css({"background-color": "red", color: "white", "text-shadow": "2px 2px 2px black"});}
                        else{jQuery(this).css({"background-color": "white", color: "black", "text-shadow": "none"});}
                    }
                });
    
    }
    
    /*
    jQuery.ajax({
        url: "bloemencorso/getDif.php",
        success: function (times) {
            times = jQuery.parseJSON(times);
            tr = jQuery('tbody tr');
            jQuery(tr).each(function(index){
                if(times[index] > 300){ console.log(index); jQuery(this).css({"background-color": "red", color: "white", "text-shadow": "2px 2px 2px black"});}
                else{jQuery(this).css({"background-color": "white", color: "black", "text-shadow": "none"});}
            });
        },
        fail: function(e){
            console.log(e);
        }
    });
    */
}