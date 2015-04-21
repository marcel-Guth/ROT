$(function(){
    $("#soort").change(function(){
        if($(this).val() === "medewerker")
        {
            soortMedewerkerRow.style.display="table-row";
            bedrijfsnaamRow.style.display="none";
        }
        else if ($(this).val() === "perssponsor")
        {
            soortMedewerkerRow.style.display="none";
            bedrijfsnaamRow.style.display="table-row";
        }
        else
        {
            soortMedewerkerRow.style.display="none";
            bedrijfsnaamRow.style.display="none";
        }
    });
});

function print()
{
    var inputValid = checkInputValid();
    if(inputValid !== null)
        return inputValid;
    
    var numplaat = nummerplaat.value;    
    
    var labelXml = '\
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
                    <String>' + numplaat + '</String> \
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
        <Bounds X="322" Y="225" Width="4613" Height="765" /> \
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
            <HorizontalAlignment>Center</HorizontalAlignment> \
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
        <Bounds X="322" Y="920" Width="4613" Height="210" /> \
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
        <Bounds X="322" Y="1100" Width="4613" Height="435" /> \
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
                    <String>Bas de Haan - Zeiler</String> \
                    <Attributes> \
                        <Font Family="Arial" Size="12" Bold="False" Italic="False" Underline="False" Strikeout="False" /> \
                        <ForeColor Alpha="255" Red="0" Green="0" Blue="0" /> \
                    </Attributes> \
                </Element> \
            </StyledText> \
        </TextObject> \
        <Bounds X="322" Y="1580" Width="4613" Height="165" /> \
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
                    <String>06-12345678</String> \
                    <Attributes> \
                        <Font Family="Arial" Size="12" Bold="False" Italic="False" Underline="False" Strikeout="False" /> \
                        <ForeColor Alpha="255" Red="0" Green="0" Blue="0" /> \
                    </Attributes> \
                </Element> \
            </StyledText> \
        </TextObject> \
        <Bounds X="322" Y="1745" Width="4613" Height="195" /> \
    </ObjectInfo> \
</DieCutLabel>';
    
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
    return 'Printing...';
}

function checkInputValid()
{
    if(true)
        return "no printing for now";
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
    var searchString = input.trim().toLowerCase();
    $(".resultRow").each(function() {
        var rowContents = $(this).find("#stuurmanNaam").text() + $(this).find("#fokkemaatNaam").text();
        rowContents = rowContents.trim().toLowerCase();
        
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

function loadLabelData(data)
{
    document.getElementById("naam").value = data;
}