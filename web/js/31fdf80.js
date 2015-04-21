var finishtijden = new Array();
function setFinishtijd(deelnameId)
{
      finishtijd = getFinishtijd();
      finishtijden[deelnameId] = finishtijd;
      document.getElementById("finishtijd" + deelnameId).innerHTML = timeToString(finishtijden[deelnameId]);
      commitFinishtijd(deelnameId, finishtijd);
      return false; //no navigation after clicking
}

function commitFinishtijd(deelnameId, finishtijd)
{
    var posting = $.post( "commit", {id: deelnameId, finishtijd: finishtijd});
    return false; //no navigation
}

function timeToString(timeInSec)
    {
        sec = timeInSec % 60;
        timeInSec -= sec;
        sec = sec.toFixed(0);
        min = timeInSec % 3600;
        timeInSec -= min;
        min /= 60;
        hour = timeInSec;
        hour /= 3600;
        return hour + ":" + (min < 10 ? "0" : "") + min + ":" + (sec < 10 ? "0" : "") + sec;
    }

function saveToDatabase()
{
    var posting = $.post( "finish/save", {finishtijden: finishtijden});
    posting.done(function(data){
        alert(data + "");
    });
    return false;
}

function filterDeelnames(input)
{
    var searchString = input.trim().toLowerCase();
    $(".startnummer").each(function() {
        var startnummercontent = $(this).text().trim().toLowerCase();
        var zeilnummercontent = $("#zeilnummer" + startnummercontent).text().trim().toLowerCase();
        //alert(zeilnummercontent);
        if (contains(startnummercontent, searchString) || contains(zeilnummercontent, searchString))
        {
            $(this).parent().css("display", "table-row");
        }
        else
        {
            $(this).parent().css("display", "none");
        }
    });
}

function contains(content, searchString)
{
    if (searchString === "")
    {
        return true;
    }
    if (searchString.indexOf("+") > -1)
    {
        var searchStrings = searchString.split("+");
        var searchStringInAny = false;
        for(var s in searchStrings)
        {
            searchStringInAny = contains(content, s) || searchStringInAny;
        }
        return searchStringInAny;
    }
    return content.indexOf(searchString) > -1;
}

function getFinishtijd()
{
    var dateAndTime = $("#startRace").text().split(" ");
    var startDate = dateAndTime[0].split("-");
    var startTime = dateAndTime[1].split(":");
    var timeStartRace = getStartRaceTime(startDate, startTime);
    var currentTime = new Date().getTime();
    var secondsPast = null;
    if (timeStartRace < currentTime)
    {
        secondsPast = (currentTime - timeStartRace) / 1000;
    }
    return secondsPast;
}

function getStartRaceTime(startDate, startTime)
{
    return new Date(
            parseInt(startDate[2]),
            parseInt(startDate[1]) - 1,
            parseInt(startDate[0]),
            parseInt(startTime[0]),
            parseInt(startTime[1]),
            parseInt(startTime[2])).getTime();
}