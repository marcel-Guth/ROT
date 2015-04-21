$(function(){$("#soort").change(soortSelectionChanged);});
function soortSelectionChanged(){
    var val;
    try{
        val = $(this).val();
    }
    catch(err)
    {
        val = "zeiler";
    }
    
    if(val === "medewerker")
    {
        var elements = document.getElementsByClassName('medewerker');
        for(i=0; i<elements.length; i++) {
            elements[i].style.display="table-row";
        }  
        elements = document.getElementsByClassName('zeiler');
        for(i=0; i<elements.length; i++) {
            elements[i].style.display="none";
        }
        soortMedewerkerSelectionChanged();
    }       
    else
    {
        var elements = document.getElementsByClassName('medewerker');
        for(i=0; i<elements.length; i++) {
            elements[i].style.display="none";
        }  
        elements = document.getElementsByClassName('zeiler');
        for(i=0; i<elements.length; i++) {
            elements[i].style.display="table-row";
        }
    }  
}

$(function(){$("#soortMedewerker").change(soortMedewerkerSelectionChanged);});
function soortMedewerkerSelectionChanged(){
    var val;
    try{
        val = $(this).val();
    }
    catch(err)
    {
        val = "vrijwilliger";
    }
     
    if(val  === "vrijwilliger")
    {
        var elements = document.getElementsByClassName('vrijwilliger');
        for(i=0; i<elements.length; i++) {
            elements[i].style.display="table-row";
        }  
        elements = document.getElementsByClassName('perssponsor');
        for(i=0; i<elements.length; i++) {
            elements[i].style.display="none";
        }
        elements = document.getElementsByClassName('vergunning');
        for(i=0; i<elements.length; i++) {
            elements[i].style.display="none";
        }
    }
    else if(val === "pers/sponsor")
    {
        var elements = document.getElementsByClassName('vrijwilliger');
        for(i=0; i<elements.length; i++) {
            elements[i].style.display="none";
        }  
        elements = document.getElementsByClassName('perssponsor');
        for(i=0; i<elements.length; i++) {
            elements[i].style.display="table-row";
        }
        elements = document.getElementsByClassName('vergunning');
        for(i=0; i<elements.length; i++) {
            elements[i].style.display="none";
        }
    }
    else if(val === "strandhuisje")
    {
        var elements = document.getElementsByClassName('vrijwilliger');
        for(i=0; i<elements.length; i++) {
            elements[i].style.display="none";
        }  
        elements = document.getElementsByClassName('perssponsor');
        for(i=0; i<elements.length; i++) {
            elements[i].style.display="none";
        }
        elements = document.getElementsByClassName('vergunning');
        for(i=0; i<elements.length; i++) {
            elements[i].style.display="none";
        }
    }
    else //vergunning
    {
        var elements = document.getElementsByClassName('vrijwilliger');
        for(i=0; i<elements.length; i++) {
            elements[i].style.display="none";
        }  
        elements = document.getElementsByClassName('perssponsor');
        for(i=0; i<elements.length; i++) {
            elements[i].style.display="none";
        }
        elements = document.getElementsByClassName('vergunning');
        for(i=0; i<elements.length; i++) {
            elements[i].style.display="table-row";
        }
    }
}

function print(printbool)
{
    var errorMessage = checkInputValid();
    if(errorMessage !== null)
        return errorMessage;
    
    if(printbool === true)
    {
        var labelXml;
        if(soort.value === 'zeiler')
        {
            labelXml = getZeilerXML();
        }
        else
        {
            labelXml = getMedewerkerXML();
        }

        var label = dymo.label.framework.openLabelXml(labelXml);

        var printers = dymo.label.framework.getPrinters();
        if (printers.length === 0)
            return 'No DYMO printers are installed. Install DYMO printers.';

        var printerName = "";
        for (var i = 0; i < printers.length; ++i)
        {
            var printer = printers[i];
            if (printer.printerType === "LabelWriterPrinter")
            {
                printerName = printer.name;
                break;
            }
        }
        label.print(printerName);
    }
    document.getElementById("hidden1").value = loadedZeilerId;
    document.inputFields.submit();
    loadedZeilerId = -1;
    resetForm();
    if(printbool === true)
    {
        return "Printing...";
    }
    else
    {
        return "Parkeerkaart opgeslagen."
    }
}

function checkInputValid()
{
    var error = "";
    if(document.getElementById("naam").value === "")
    {
        error += "Naam moet ingevuld zijn.\n";
    }
    
    if(document.getElementById("soort").value === "zeiler")
    {
        if(loadedZeilerId === -1)
        {
            error += "Zeiler moet m.b.v. de zoekfunctie geladen worden.\n";
        }
        else
        {
            //check db for id
        }
    }
    else
    {
        var requires06 = false;
        if(document.getElementById("soortMedewerker").value === "vrijwilliger")
        {
            requires06 = true;
        }
        else if(document.getElementById("soortMedewerker").value === "pers/sponsor")
        {
            requires06 = true;
            if(document.getElementById("bedrijfsnaam").value === "")
            {
                error += "Bedrijfsnaam moet ingevuld zijn.\n";
            }
        }
        else if(document.getElementById("soortMedewerker").value === "vergunning")
        {
            requires06 = true;
        }
        if(getDays().length === 0)
        {
            error += "Er moet ten minste 1 dag gekozen worden.\n";
        }
        if(requires06 && (document.getElementById("06nummer").value === ""))
        {
            error += "06-nummer moet ingevuld zijn.\n";
        }
    }
    
    if(error !== "")
        return error;
    return null;
}

function getDays()
{
    var days = '';
    var seperation = '   ';
    if(don.checked)
    {
        days += 'Don';
        if(vrij.checked || zat.checked)
        {
            days += seperation;
        }
    }
    if(vrij.checked)
    {
        days += 'Vrij';
        if(zat.checked)
        {
            days += seperation;
        }
    }
    if(zat.checked)
    {
        days += 'Zat';
    }
    return days;
}

function filterResultaten(input)
{
    var searchString = input.trim().toLowerCase().replace(/-/,'');
    $(".resultRow").each(function() {
        var rowContents = $(this).find("#startnummer").text() + $(this).find("#stuurmanNaam").text() + $(this).find("#fokkemaatNaam").text() + $(this).find("#kenteken").text();
        rowContents = rowContents.trim().toLowerCase().replace(/-/,'');
        
        if (rowContents.indexOf(searchString) === -1)
        {
            $(this).css("display", "none");
        }
        else
        {
            $(this).css("display", "table-row");
        }
    });
}

var loadedZeilerId = -1;
var dataQRCode = '';
function loadLabelData(dataId, dataNaam, dataKenteken, dataTelefoon, dataQRCodeData)
{
    loadedZeilerId = dataId;
    document.getElementById("naam").value = dataNaam;
    document.getElementById("kenteken").value = dataKenteken;
    document.getElementById("06nummer").value = dataTelefoon;
    generateQRCode(dataQRCodeData);
    dataQRCode = document.getElementById("QRIMAGE").src;
    dataQRCode = dataQRCode.substring(dataQRCode.lastIndexOf(",") + 1);
    $('#soort').val('zeiler');
    soortSelectionChanged();
}

var qrcode;
function generateQRCode(data)
{
    if(!qrcode)
    {
        qrcode = new QRCode("qrcodeElement");
    }
    qrcode.makeCode(data);
}

function resetForm()
{
    document.getElementById("bedrijfsnaam").value = "";
    document.getElementById("naam").value = "";
    document.getElementById("kenteken").value = "";
    document.getElementById("06nummer").value = "";
    document.getElementById("don").checked = true;
    document.getElementById("vrij").checked = true;
    document.getElementById("zat").checked = true;
    loadedZeilerId = -1;
}

function getZeilerXML()
{
    dataKenteken = document.getElementById("kenteken").value;
    dataNaam = document.getElementById("naam").value;
    data06Nummer = document.getElementById("06nummer").value;
    
    return '\
    <DieCutLabel Version="8.0" Units="twips"> \
	<PaperOrientation>Landscape</PaperOrientation> \
	<Id>LargeAddress</Id> \
	<PaperName>30321 Large Address</PaperName> \
	<DrawCommands> \
		<RoundRectangle X="0" Y="0" Width="2025" Height="5020" Rx="270" Ry="270" /> \
	</DrawCommands> \
	<ObjectInfo> \
		<AddressObject> \
			<Name>Address</Name> \
			<ForeColor Alpha="255" Red="0" Green="0" Blue="0" /> \
			<BackColor Alpha="0" Red="255" Green="255" Blue="255" /> \
			<LinkedObjectName></LinkedObjectName> \
			<Rotation>Rotation0</Rotation> \
			<IsMirrored>False</IsMirrored> \
			<IsVariable>True</IsVariable> \
			<HorizontalAlignment>Center</HorizontalAlignment> \
			<VerticalAlignment>Middle</VerticalAlignment> \
			<TextFitMode>ShrinkToFit</TextFitMode> \
			<UseFullFontHeight>True</UseFullFontHeight> \
			<Verticalized>False</Verticalized> \
			<StyledText> \
				<Element> \
					<String>' + dataKenteken + '</String> \
					<Attributes> \
						<Font Family="Arial" Size="36" Bold="True" Italic="False" Underline="False" Strikeout="False" /> \
						<ForeColor Alpha="255" Red="0" Green="0" Blue="0" /> \
					</Attributes> \
				</Element> \
			</StyledText> \
			<ShowBarcodeFor9DigitZipOnly>False</ShowBarcodeFor9DigitZipOnly> \
			<BarcodePosition>Suppress</BarcodePosition> \
			<LineFonts> \
				<Font Family="Arial" Size="36" Bold="True" Italic="False" Underline="False" Strikeout="False" /> \
			</LineFonts> \
		</AddressObject> \
		<Bounds X="1642" Y="450" Width="3293" Height="765" /> \
	</ObjectInfo> \
	<ObjectInfo> \
		<TextObject> \
			<Name>TEKST</Name> \
			<ForeColor Alpha="255" Red="0" Green="0" Blue="0" /> \
			<BackColor Alpha="0" Red="255" Green="255" Blue="255" /> \
			<LinkedObjectName></LinkedObjectName> \
			<Rotation>Rotation0</Rotation> \
			<IsMirrored>False</IsMirrored> \
			<IsVariable>False</IsVariable> \
			<HorizontalAlignment>Right</HorizontalAlignment> \
			<VerticalAlignment>Top</VerticalAlignment> \
			<TextFitMode>ShrinkToFit</TextFitMode> \
			<UseFullFontHeight>True</UseFullFontHeight> \
			<Verticalized>False</Verticalized> \
			<StyledText> \
				<Element> \
					<String>Round Texel 2014</String> \
					<Attributes> \
						<Font Family="Arial" Size="8" Bold="False" Italic="False" Underline="False" Strikeout="False" /> \
						<ForeColor Alpha="255" Red="0" Green="0" Blue="0" /> \
					</Attributes> \
				</Element> \
			</StyledText> \
		</TextObject> \
		<Bounds X="322" Y="58" Width="4613" Height="210" /> \
	</ObjectInfo> \
	<ObjectInfo> \
		<TextObject> \
			<Name>TEKST_2</Name> \
			<ForeColor Alpha="255" Red="0" Green="0" Blue="0" /> \
			<BackColor Alpha="0" Red="255" Green="255" Blue="255" /> \
			<LinkedObjectName></LinkedObjectName> \
			<Rotation>Rotation0</Rotation> \
			<IsMirrored>False</IsMirrored> \
			<IsVariable>False</IsVariable> \
			<HorizontalAlignment>Center</HorizontalAlignment> \
			<VerticalAlignment>Top</VerticalAlignment> \
			<TextFitMode>ShrinkToFit</TextFitMode> \
			<UseFullFontHeight>True</UseFullFontHeight> \
			<Verticalized>False</Verticalized> \
			<StyledText> \
				<Element> \
					<String>' + dataNaam + '</String> \
					<Attributes> \
						<Font Family="Arial" Size="12" Bold="False" Italic="False" Underline="False" Strikeout="False" /> \
						<ForeColor Alpha="255" Red="0" Green="0" Blue="0" /> \
					</Attributes> \
				</Element> \
			</StyledText> \
		</TextObject> \
		<Bounds X="1687" Y="1250" Width="3248" Height="195" /> \
	</ObjectInfo> \
	<ObjectInfo> \
		<TextObject> \
			<Name>TEKST_3</Name> \
			<ForeColor Alpha="255" Red="0" Green="0" Blue="0" /> \
			<BackColor Alpha="0" Red="255" Green="255" Blue="255" /> \
			<LinkedObjectName></LinkedObjectName> \
			<Rotation>Rotation0</Rotation> \
			<IsMirrored>False</IsMirrored> \
			<IsVariable>False</IsVariable> \
			<HorizontalAlignment>Center</HorizontalAlignment> \
			<VerticalAlignment>Top</VerticalAlignment> \
			<TextFitMode>ShrinkToFit</TextFitMode> \
			<UseFullFontHeight>True</UseFullFontHeight> \
			<Verticalized>False</Verticalized> \
			<StyledText> \
				<Element> \
					<String>' + data06Nummer + '</String> \
					<Attributes> \
						<Font Family="Arial" Size="12" Bold="False" Italic="False" Underline="False" Strikeout="False" /> \
						<ForeColor Alpha="255" Red="0" Green="0" Blue="0" /> \
					</Attributes> \
				</Element> \
			</StyledText> \
		</TextObject> \
		<Bounds X="1657" Y="1460" Width="3278" Height="195" /> \
	</ObjectInfo> \
	<ObjectInfo> \
		<ImageObject> \
			<Name>AFBEELDING</Name> \
			<ForeColor Alpha="255" Red="0" Green="0" Blue="0" /> \
			<BackColor Alpha="0" Red="255" Green="255" Blue="255" /> \
			<LinkedObjectName></LinkedObjectName> \
			<Rotation>Rotation0</Rotation> \
			<IsMirrored>False</IsMirrored> \
			<IsVariable>False</IsVariable> \
			<Image>' + dataQRCode + '</Image> \
			<ScaleMode>Uniform</ScaleMode> \
			<BorderWidth>0</BorderWidth> \
			<BorderColor Alpha="255" Red="0" Green="0" Blue="0" /> \
			<HorizontalAlignment>Center</HorizontalAlignment> \
			<VerticalAlignment>Center</VerticalAlignment> \
		</ImageObject> \
		<Bounds X="322" Y="210" Width="1350" Height="1650" /> \
	</ObjectInfo> \
</DieCutLabel>';
}

function getMedewerkerXML()
{
    dataKenteken = document.getElementById("kenteken").value;
    dataNaam = document.getElementById("naam").value;
    dataFunctie = getFunctie();
    document.getElementById("hidden2").value = dataFunctie;
    data06Nummer = document.getElementById("06nummer").value;
    
    return '\
    <DieCutLabel Version="8.0" Units="twips"> \
	<PaperOrientation>Landscape</PaperOrientation> \
	<Id>LargeAddress</Id> \
	<PaperName>30321 Large Address</PaperName> \
	<DrawCommands> \
		<RoundRectangle X="0" Y="0" Width="2025" Height="5020" Rx="270" Ry="270" /> \
	</DrawCommands> \
	<ObjectInfo> \
		<AddressObject> \
			<Name>Address</Name> \
			<ForeColor Alpha="255" Red="0" Green="0" Blue="0" /> \
			<BackColor Alpha="0" Red="255" Green="255" Blue="255" /> \
			<LinkedObjectName></LinkedObjectName> \
			<Rotation>Rotation0</Rotation> \
			<IsMirrored>False</IsMirrored> \
			<IsVariable>True</IsVariable> \
			<HorizontalAlignment>Center</HorizontalAlignment> \
			<VerticalAlignment>Middle</VerticalAlignment> \
			<TextFitMode>ShrinkToFit</TextFitMode> \
			<UseFullFontHeight>True</UseFullFontHeight> \
			<Verticalized>False</Verticalized> \
			<StyledText> \
				<Element> \
					<String>' + dataKenteken + '</String> \
					<Attributes> \
						<Font Family="Arial" Size="36" Bold="True" Italic="False" Underline="False" Strikeout="False" /> \
						<ForeColor Alpha="255" Red="0" Green="0" Blue="0" /> \
					</Attributes> \
				</Element> \
			</StyledText> \
			<ShowBarcodeFor9DigitZipOnly>False</ShowBarcodeFor9DigitZipOnly> \
			<BarcodePosition>Suppress</BarcodePosition> \
			<LineFonts> \
				<Font Family="Arial" Size="36" Bold="True" Italic="False" Underline="False" Strikeout="False" /> \
			</LineFonts> \
		</AddressObject> \
		<Bounds X="322" Y="165" Width="4613" Height="765" /> \
	</ObjectInfo> \
	<ObjectInfo> \
		<TextObject> \
			<Name>TEKST</Name> \
			<ForeColor Alpha="255" Red="0" Green="0" Blue="0" /> \
			<BackColor Alpha="0" Red="255" Green="255" Blue="255" /> \
			<LinkedObjectName></LinkedObjectName> \
			<Rotation>Rotation0</Rotation> \
			<IsMirrored>False</IsMirrored> \
			<IsVariable>False</IsVariable> \
			<HorizontalAlignment>Right</HorizontalAlignment> \
			<VerticalAlignment>Top</VerticalAlignment> \
			<TextFitMode>ShrinkToFit</TextFitMode> \
			<UseFullFontHeight>True</UseFullFontHeight> \
			<Verticalized>False</Verticalized> \
			<StyledText> \
				<Element> \
					<String>Round Texel 2014</String> \
					<Attributes> \
						<Font Family="Arial" Size="8" Bold="False" Italic="False" Underline="False" Strikeout="False" /> \
						<ForeColor Alpha="255" Red="0" Green="0" Blue="0" /> \
					</Attributes> \
				</Element> \
			</StyledText> \
		</TextObject> \
		<Bounds X="322" Y="58" Width="4613" Height="210" /> \
	</ObjectInfo> \
	<ObjectInfo> \
		<TextObject> \
			<Name>TEKST_1</Name> \
			<ForeColor Alpha="255" Red="0" Green="0" Blue="0" /> \
			<BackColor Alpha="0" Red="255" Green="255" Blue="255" /> \
			<LinkedObjectName></LinkedObjectName> \
			<Rotation>Rotation0</Rotation> \
			<IsMirrored>False</IsMirrored> \
			<IsVariable>False</IsVariable> \
			<HorizontalAlignment>Center</HorizontalAlignment> \
			<VerticalAlignment>Top</VerticalAlignment> \
			<TextFitMode>ShrinkToFit</TextFitMode> \
			<UseFullFontHeight>True</UseFullFontHeight> \
			<Verticalized>False</Verticalized> \
			<StyledText> \
				<Element> \
					<String>' + getDays() + '</String> \
					<Attributes> \
						<Font Family="Arial" Size="36" Bold="True" Italic="False" Underline="False" Strikeout="False" /> \
						<ForeColor Alpha="255" Red="0" Green="0" Blue="0" /> \
					</Attributes> \
				</Element> \
			</StyledText> \
		</TextObject> \
		<Bounds X="322" Y="860" Width="4613" Height="435" /> \
	</ObjectInfo> \
	<ObjectInfo> \
		<TextObject> \
			<Name>TEKST_2</Name> \
			<ForeColor Alpha="255" Red="0" Green="0" Blue="0" /> \
			<BackColor Alpha="0" Red="255" Green="255" Blue="255" /> \
			<LinkedObjectName></LinkedObjectName> \
			<Rotation>Rotation0</Rotation> \
			<IsMirrored>False</IsMirrored> \
			<IsVariable>False</IsVariable> \
			<HorizontalAlignment>Center</HorizontalAlignment> \
			<VerticalAlignment>Top</VerticalAlignment> \
			<TextFitMode>ShrinkToFit</TextFitMode> \
			<UseFullFontHeight>True</UseFullFontHeight> \
			<Verticalized>False</Verticalized> \
			<StyledText> \
				<Element> \
					<String>' + dataNaam + '</String> \
					<Attributes> \
						<Font Family="Arial" Size="12" Bold="False" Italic="False" Underline="False" Strikeout="False" /> \
						<ForeColor Alpha="255" Red="0" Green="0" Blue="0" /> \
					</Attributes> \
				</Element> \
			</StyledText> \
		</TextObject> \
		<Bounds X="322" Y="1295" Width="4613" Height="165" /> \
	</ObjectInfo> \
	<ObjectInfo> \
		<TextObject> \
			<Name>TEKST_3</Name> \
			<ForeColor Alpha="255" Red="0" Green="0" Blue="0" /> \
			<BackColor Alpha="0" Red="255" Green="255" Blue="255" /> \
			<LinkedObjectName></LinkedObjectName> \
			<Rotation>Rotation0</Rotation> \
			<IsMirrored>False</IsMirrored> \
			<IsVariable>False</IsVariable> \
			<HorizontalAlignment>Center</HorizontalAlignment> \
			<VerticalAlignment>Top</VerticalAlignment> \
			<TextFitMode>ShrinkToFit</TextFitMode> \
			<UseFullFontHeight>True</UseFullFontHeight> \
			<Verticalized>False</Verticalized> \
			<StyledText> \
				<Element> \
					<String>' + data06Nummer + '</String> \
					<Attributes> \
						<Font Family="Arial" Size="12" Bold="False" Italic="False" Underline="False" Strikeout="False" /> \
						<ForeColor Alpha="255" Red="0" Green="0" Blue="0" /> \
					</Attributes> \
				</Element> \
			</StyledText> \
		</TextObject> \
		<Bounds X="322" Y="1745" Width="4613" Height="195" /> \
	</ObjectInfo> \
	<ObjectInfo> \
		<TextObject> \
			<Name>TEKST_4</Name> \
			<ForeColor Alpha="255" Red="0" Green="0" Blue="0" /> \
			<BackColor Alpha="0" Red="255" Green="255" Blue="255" /> \
			<LinkedObjectName></LinkedObjectName> \
			<Rotation>Rotation0</Rotation> \
			<IsMirrored>False</IsMirrored> \
			<IsVariable>False</IsVariable> \
			<HorizontalAlignment>Center</HorizontalAlignment> \
			<VerticalAlignment>Top</VerticalAlignment> \
			<TextFitMode>ShrinkToFit</TextFitMode> \
			<UseFullFontHeight>True</UseFullFontHeight> \
			<Verticalized>False</Verticalized> \
			<StyledText> \
				<Element> \
					<String>' + dataFunctie + '</String> \
					<Attributes> \
						<Font Family="Arial" Size="12" Bold="False" Italic="False" Underline="False" Strikeout="False" /> \
						<ForeColor Alpha="255" Red="0" Green="0" Blue="0" /> \
					</Attributes> \
				</Element> \
			</StyledText> \
		</TextObject> \
		<Bounds X="322" Y="1505" Width="4613" Height="150" /> \
	</ObjectInfo> \
</DieCutLabel>';
}

function getFunctie()
{
    soortMedewerker = document.getElementById("soortMedewerker").value;
    if(soortMedewerker === 'vrijwilliger')
    {
        onderdeelVrijwilliger = document.getElementById("onderdeelVrijwilliger").value;
        return "Vrijwilliger - " + onderdeelVrijwilliger;
    }
    else if(soortMedewerker === 'pers/sponsor')
    {
        bedrijfsnaam = document.getElementById("bedrijfsnaam").value;
        return "Pers/sponsor - " + bedrijfsnaam;
    }
    else if(soortMedewerker === 'strandhuisje')
    {
        return "Strandhuisje";
    }
    else //vergunning
    {
        soortVergunning = document.getElementById("soortVergunning").value;
        onderdeelVergunning = document.getElementById("onderdeelVergunning").value;
        return "Vergunning - " + soortVergunning + " - " + onderdeelVergunning;
    }
}