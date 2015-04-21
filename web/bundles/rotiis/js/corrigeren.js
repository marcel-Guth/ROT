function herberekenGecorrigeerdeFinishtijd(id, correctiefactor, correctie)
{
    var posting = $.post( "corrigeren", {id: id, correctiefactor: correctiefactor, correctie: correctie});
    posting.done(function(data){
        alert(data + "");
    });
    return false; //no navigation
}