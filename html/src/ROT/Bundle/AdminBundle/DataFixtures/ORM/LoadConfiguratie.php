<?php

namespace ROT\Bundle\AdminBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use ROT\Bundle\AdminBundle\Entity\Configuratie;

class LoadConfiguratie implements FixtureInterface {
    public function load(ObjectManager $manager) {
        $configuraties = array(
            array('id' => '1','contenttarget' => 'registrationstep1','content' => '','nederlands' => '0'),
            array('id' => '2','contenttarget' => 'registrationstep1','content' => '','nederlands' => '1'),
            array('id' => '3','contenttarget' => 'registrationstep2','content' => '','nederlands' => '0'),
            array('id' => '4','contenttarget' => 'registrationstep2','content' => '','nederlands' => '1'),
            array('id' => '5','contenttarget' => 'registrationstep3','content' => '<p>
	<strong>Sailor type</strong></p>
<div>
	You can choose to participate in either the <strong>Gold Fleet </strong>or in the <strong>Silver Fleet</strong>:</div>
<div>
	&nbsp;</div>
<div>
	The <strong>Gold Fleet</strong> is the race class for competing sailors. Participants in the <strong>Gold Fleet</strong> can also take part in the races for the Zwitserleven Open Dutch Championship (Texel Dutch Open en het Nacra Infusion World Championship) and in the Horstocht.</div>
<div>
	Participants with the Dutch nationality must be member of a sailing club which is associated with the Dutch Watersportverbond; they must have a personal starting license and (if required by their boat&#39;s Class Association) a measurement certificate for the boat. If they want to display advertising on boat and/or sails, they must also have an advertising license and can only participate in the <strong>Gold Fleet</strong>.</div>
<div>
	Further details in the Notice of Race.</div>
<div>
	&nbsp;</div>
<div>
	The Silver Fleet is the endurance challenge for recreational sailors. Participants in the <strong>Silver Fleet</strong> can also take part in the Horstocht.</div>
<div>
	There are no further requirements for participants with the Dutch nationality. If they want to display advertising on boat and/or sails, they cannot participate in the <strong>Silver Fleet.</strong></div>
<div>
	&nbsp;</div>
<div>
	Further details in the Notice of Race.</div>
<div>
	&nbsp;</div>
','nederlands' => '0'),
            array('id' => '6','contenttarget' => 'registrationstep3','content' => '<p>
	<strong>Keuze deelname</strong></p>
<p>
	U kunt er voor kiezen deel te nemen in de <strong>Gold Fleet</strong> of in de <strong>Silver Fleet</strong>:</p>
<p>
	De <strong>Gold Fleet</strong> is de wedstrijdklasse voor de wedstrijdzeilers. Deelnemers in de <strong>Gold Fleet</strong> mogen ook deelnemen aan de wedstrijden van het Zwitserleven Open Nederlands Kampioenschap (Texel Dutch Open en het Nacra Infusion World Championship) en de Horstocht. Deelnemers met de Nederlandse nationaliteit moeten lid zijn van een bij het Watersportverbond aangesloten watersportvereniging, een persoonlijke startlicentie en een meetbrief voor hun boot hebben (indien van toepassing voor betreffende klasse). Indien u reclame op boot en/of zeilen voert, dient u bovendien te beschikken over een reclamecertificaat van het Watersportverbond en kunt u uitsluitend deelnemen in de <strong>Gold Fleet</strong>.</p>
<p>
	De <strong>Silver Fleet</strong> is de prestatie-/toertocht voor de recreatieve zeilers. Deelnemers in de <strong>Silver Fleet</strong> mogen ook deelnemen aan de Horstocht. Er zijn geen verdere vereisten voor deelnemers met de Nederlandse nationaliteit. Indien u reclame op boot en/of zeilen voert, kunt u niet deelnemen in de <strong>Silver Fleet</strong>.</p>
<p>
	Verdere details vindt u in de Notice of Race.</p>
','nederlands' => '1'),
            array('id' => '7','contenttarget' => 'registrationstep4','content' => '','nederlands' => '1'),
            array('id' => '8','contenttarget' => 'registrationstep4','content' => '','nederlands' => '0'),
            array('id' => '9','contenttarget' => 'registrationstep5','content' => '','nederlands' => '1'),
            array('id' => '10','contenttarget' => 'registrationstep5','content' => '','nederlands' => '0'),
            array('id' => '11','contenttarget' => 'registrationstep6','content' => '','nederlands' => '1'),
            array('id' => '12','contenttarget' => 'registrationstep6','content' => '','nederlands' => '0'),
            array('id' => '13','contenttarget' => 'registrationstep7','content' => '<p>
	<strong>Overzicht</strong></p>
<p>
	Controleer de informatie die u heeft ingevoerd en verander deze indien nodig.</p>
','nederlands' => '1'),
            array('id' => '14','contenttarget' => 'registrationstep7','content' => '<p>
	<strong>Overview</strong></p>
<p>
	Please check the information you entered and adapt if necessary.</p>
','nederlands' => '0'),
            array('id' => '15','contenttarget' => 'registrationstep8','content' => '<p>
	<strong>Akkoord</strong></p>
<p>
	Als u op &#39;Volgende&#39; klikt verklaart u geheel voor eigen rekening en risico aan de Zwitserleven Ronde Om Texel mee te doen. Het wedstrijdcomit&eacute;&nbsp;is niet aansprakelijk voor enige schade, welke dan ook, waaronder begrepen schade aan schip, aan de opvarende (incl. dodelijk ongeval) en aan boord aanwezige goederen, welke direct of indirect in verband met de deelneming aan de wedstrijd zou kunnen ontstaan. Door het versturen van het inschrijfformulier verklaart de deelnemer zich te onderwerpen aan: de Notice of Race, het wedstrijdreglement van de ISAF, de wedstrijdbepalingen Zwitserleven Ronde om Texel, de Texel-Rating reglementen en aan de Klassenvoorschriften.</p>
','nederlands' => '1'),
            array('id' => '16','contenttarget' => 'registrationstep8','content' => '<p>
	<strong>Agree</strong></p>
<p>
	When you click the &#39;next&#39; button on this form the competitor declares to take part in the Zwitserleven Ronde om Texel at their own risk. The Organising Authority or any party of person involved in the organisation of the Zwitserleven Ronde om Texel 2012 will not accept any liability whatsoever for any injury (including death) personal or material damage, loss or claim sustained by a competitor, or prior to, during or after the Zwitserleven Ronde om Texel. Competitors agree to be bound by the Notice of Race, the Racing Rules of Sailing of the ISAF, the Class Rules, the Texel-Rating rules and by the Sailing Instructions.</p>
','nederlands' => '0'),
            array('id' => '17','contenttarget' => 'registrationstep9','content' => '<p>
	<strong>Verzonden</strong></p>
<p>
	Het formulier is succesvol verzonden!<br />
	Je staat nu ingeschreven voor de Ronde van Texel.</p>
<p>
	U ontvangt binnen 10 minuten een mail met extra informatie.<br />
	Indien u de mail niet ontvangt, kijk dan in uw map met ongewenste mail.</p>
<p>
	&lt;&lt;&lt;#Indien de registratie fout is gegaan -Deze regel niet verwijderen-#&gt;&gt;&gt;</p>
<p>
	<strong>Mislukt</strong></p>
<p>
	Er is een fout opgetreden tijdens het aanmaken van uw deelname.<br />
	Probeer het later opnieuw of neem contact op met de RoT.</p>
','nederlands' => '1'),
            array('id' => '18','contenttarget' => 'registrationstep9','content' => '<p>
	<strong>Sent</strong></p>
<p>
	The form is sent successfully!<br />
	You are now registered for the Round of Texel.</p>
<p>
	You will receive a mail within the next 10 minutes with additional information.<br />
	When you don&#39;t receive the mail, check your unwanted mail folder.</p>
<p>
	&lt;&lt;&lt;#Indien de registratie fout is gegaan -Deze regel niet verwijderen- #&gt;&gt;&gt;</p>
<p>
	<strong>Failed</strong></p>
<p>
	An error occured during the process of creating your registration.<br />
	Try again later or contact the RoT crew.</p>
','nederlands' => '0'),
            array('id' => '19','contenttarget' => 'aanmeldingmailhtml','content' => '<p>
	<strong>Beste [aanmelder],</strong></p>
<p>
	Hartelijk dank voor uw aanmelding voor de Zwitserleven Ronde om Texel. Hiermee bevestigen wij de ontvangst van uw aanvraag.<br />
	Uw aanvraag wordt behandeld als uw betaling op onze rekening staat.<br />
	Uw reserveringscode is: [reserveringscode] en u bent ingeschreven in de [fleetchoice] Fleet.</p>
<p>
	<strong>Inschrijfgeld</strong></p>
<table border="1" cellpadding="1" cellspacing="1">
	<thead>
		<tr>
			<th scope="row">
				GOLD FLEET (wedstrijd)</th>
			<th scope="col">
				Een-mansboot</th>
			<th scope="col">
				Twee-mansboot</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<th scope="row">
				Inschrijvingen voor 15 mei</th>
			<td>
				&euro; 105,-</td>
			<td>
				&euro; 115,-</td>
		</tr>
		<tr>
			<th scope="row">
				Inschrijvingen op of na 15 mei</th>
			<td>
				&euro; 145,-</td>
			<td>
				&euro; 155,0</td>
		</tr>
	</tbody>
</table>
<br />
<table border="1" cellpadding="1" cellspacing="1">
	<thead>
		<tr>
			<th scope="row">
				SILVER FLEET (recreatief)</th>
			<th scope="col">
				Een-mansboot</th>
			<th scope="col">
				Twee-mansboot</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<th scope="row">
				Inschrijvingen voor 15 mei</th>
			<td>
				&euro; 95,-</td>
			<td>
				&euro; 115,-</td>
		</tr>
		<tr>
			<th scope="row">
				Inschrijvingen op of na 15 mei</th>
			<td>
				&euro; 135,-</td>
			<td>
				&euro; 145,-</td>
		</tr>
	</tbody>
</table>
<p>
	De ontvangst van uw betaling geldt als officieÌˆle datum van inschrijving.U dient het bedrag voor 6 juni over te maken op:<br />
	Rekeningnummer: 36 25 85 733 Ten name van &quot;Stichting Ronde om Texel&quot;, Den Burg</p>
<p>
	Rabobank Noord-Holland Noord Postbus 106<br />
	1780 AC Den Helder<br />
	Holland</p>
<p>
	*Voor betalingen vanuit het buitenland:<br />
	*BIC-code: RABONL2U<br />
	*IBAN nummer: NL61RABO 0362585733<br />
	<br />
	Gelieve bij uw betaling te vermelden: RESERVERINGSCODE, BOOTTYPE EN ZEILNUMMER</p>
<p>
	Betalingen, die door ons niet kunnen worden herleid, worden teruggeboekt.</p>
<p>
	Zodra wij uw betaling hebben ontvangen, zullen wij uw inschrijving in behandeling nemen.<br />
	Rond 26 mei wordt een bevestiging gestuurd naar alle inschrijvers waarvan op dat moment het inschrijfgeld is ontvangen.<br />
	Overige bevestigingen worden verstuurd zodra het inschrijfgeld is ontvangen, of zullen worden overhandigd op Texel.</p>
<p>
	Betalingen na 6 juni dienen bij het inschrijfbureau op het strand te worden voldaan.</p>
<p>
	<strong>Informatie over Inschrijvingen</strong><br />
	Marie-Christine Pijnenburg<br />
	E-mail: info@roundtexel.com<br />
	Telefoon: +31.222.32 70 79<br />
	Fax: +31.222.32 04 20</p>
','nederlands' => '1'),
            array('id' => '20','contenttarget' => 'aanmeldingmailhtml','content' => '<p>
	<strong>Dear [aanmelder],</strong></p>
<p>
	Hartelijk dank voor uw aanmelding voor de Zwitserleven Ronde om Texel. Hiermee bevestigen wij de ontvangst van uw aanvraag.<br />
	Uw aanvraag wordt behandeld als uw betaling op onze rekening staat.<br />
	Uw reserveringscode is: [reserveringscode] en u bent ingeschreven in de [fleetchoice] Fleet.</p>
<p>
	<strong>Inschrijfgeld</strong></p>
<table border="1" cellpadding="1" cellspacing="1">
	<thead>
		<tr>
			<th scope="row">
				GOLD FLEET (wedstrijd)</th>
			<th scope="col">
				Een-mansboot</th>
			<th scope="col">
				Twee-mansboot</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<th scope="row">
				Inschrijvingen voor 15 mei</th>
			<td>
				&euro; 105,-</td>
			<td>
				&euro; 115,-</td>
		</tr>
		<tr>
			<th scope="row">
				Inschrijvingen op of na 15 mei</th>
			<td>
				&euro; 145,-</td>
			<td>
				&euro; 155,0</td>
		</tr>
	</tbody>
</table>
<br />
<table border="1" cellpadding="1" cellspacing="1">
	<thead>
		<tr>
			<th scope="row">
				SILVER FLEET (recreatief)</th>
			<th scope="col">
				Een-mansboot</th>
			<th scope="col">
				Twee-mansboot</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<th scope="row">
				Inschrijvingen voor 15 mei</th>
			<td>
				&euro; 95,-</td>
			<td>
				&euro; 115,-</td>
		</tr>
		<tr>
			<th scope="row">
				Inschrijvingen op of na 15 mei</th>
			<td>
				&euro; 135,-</td>
			<td>
				&euro; 145,-</td>
		</tr>
	</tbody>
</table>
<p>
	De ontvangst van uw betaling geldt als officieÌˆle datum van inschrijving.U dient het bedrag voor 6 juni over te maken op:<br />
	Rekeningnummer: 36 25 85 733 Ten name van &quot;Stichting Ronde om Texel&quot;, Den Burg</p>
<p>
	Rabobank Noord-Holland Noord Postbus 106<br />
	1780 AC Den Helder<br />
	Holland</p>
<p>
	*Voor betalingen vanuit het buitenland:<br />
	*BIC-code: RABONL2U<br />
	*IBAN nummer: NL61RABO 0362585733<br />
	<br />
	Gelieve bij uw betaling te vermelden: RESERVERINGSCODE, BOOTTYPE EN ZEILNUMMER</p>
<p>
	Betalingen, die door ons niet kunnen worden herleid, worden teruggeboekt.</p>
<p>
	Zodra wij uw betaling hebben ontvangen, zullen wij uw inschrijving in behandeling nemen.<br />
	Rond 26 mei wordt een bevestiging gestuurd naar alle inschrijvers waarvan op dat moment het inschrijfgeld is ontvangen.<br />
	Overige bevestigingen worden verstuurd zodra het inschrijfgeld is ontvangen, of zullen worden overhandigd op Texel.</p>
<p>
	Betalingen na 6 juni dienen bij het inschrijfbureau op het strand te worden voldaan.</p>
<p>
	<strong>Informatie over Inschrijvingen</strong><br />
	Marie-Christine Pijnenburg<br />
	E-mail: info@roundtexel.com<br />
	Telefoon: +31.222.32 70 79<br />
	Fax: +31.222.32 04 20</p>
','nederlands' => '0'),
            array('id' => '21','contenttarget' => 'aanmeldingmailplain','content' => 'Beste [aanmelder],

Hartelijk dank voor uw aanmelding voor de Zwitserleven Ronde om Texel. Hiermee bevestigen wij de ontvangst van uw aanvraag.
Uw aanvraag wordt behandeld als uw betaling op onze rekening staat.
Uw reserveringscode is: [reserveringscode] en u bent ingeschreven in de [fleetchoice] Fleet.

Inschrijfgeld
GOLD FLEET (wedstrijd)	Een-mansboot	Twee-mansboot
Inschrijvingen voor 15 mei	Euro 105,-	Euro 115,-
Inschrijvingen op of na 15 mei	Euro 145,-	Euro 155,0
SILVER FLEET (recreatief)	Een-mansboot	Twee-mansboot
Inschrijvingen voor 15 mei	Euro 95,-	Euro 115,-
Inschrijvingen op of na 15 mei	Euro 135,-	Euro 145,-

De ontvangst van uw betaling geldt als officieÌˆle datum van inschrijving.U dient het bedrag voor 6 juni over te maken op:
Rekeningnummer: 36 25 85 733 Ten name van "Stichting Ronde om Texel", Den Burg

Rabobank Noord-Holland Noord Postbus 106
1780 AC Den Helder
Holland

*Voor betalingen vanuit het buitenland:
*BIC-code: RABONL2U
*IBAN nummer: NL61RABO 0362585733

Gelieve bij uw betaling te vermelden: RESERVERINGSCODE, BOOTTYPE EN ZEILNUMMER

Betalingen, die door ons niet kunnen worden herleid, worden teruggeboekt.

Zodra wij uw betaling hebben ontvangen, zullen wij uw inschrijving in behandeling nemen.
Rond 26 mei wordt een bevestiging gestuurd naar alle inschrijvers waarvan op dat moment het inschrijfgeld is ontvangen.
Overige bevestigingen worden verstuurd zodra het inschrijfgeld is ontvangen, of zullen worden overhandigd op Texel.

Betalingen na 6 juni dienen bij het inschrijfbureau op het strand te worden voldaan.

Informatie over Inschrijvingen
Marie-Christine Pijnenburg
E-mail: info@roundtexel.com
Telefoon: +31.222.32 70 79
Fax: +31.222.32 04 20','nederlands' => '1'),
            array('id' => '22','contenttarget' => 'aanmeldingmailplain','content' => 'Dear [aanmelder],

Hartelijk dank voor uw aanmelding voor de Zwitserleven Ronde om Texel. Hiermee bevestigen wij de ontvangst van uw aanvraag.
Uw aanvraag wordt behandeld als uw betaling op onze rekening staat.
Uw reserveringscode is: [reserveringscode] en u bent ingeschreven in de [fleetchoice] Fleet.

Inschrijfgeld
GOLD FLEET (wedstrijd)	Een-mansboot	Twee-mansboot
Inschrijvingen voor 15 mei	Euro 105,-	Euro 115,-
Inschrijvingen op of na 15 mei	Euro 145,-	Euro 155,0
SILVER FLEET (recreatief)	Een-mansboot	Twee-mansboot
Inschrijvingen voor 15 mei	Euro 95,-	Euro 115,-
Inschrijvingen op of na 15 mei	Euro 135,-	Euro 145,-

De ontvangst van uw betaling geldt als officieÌˆle datum van inschrijving.U dient het bedrag voor 6 juni over te maken op:
Rekeningnummer: 36 25 85 733 Ten name van "Stichting Ronde om Texel", Den Burg

Rabobank Noord-Holland Noord Postbus 106
1780 AC Den Helder
Holland

*Voor betalingen vanuit het buitenland:
*BIC-code: RABONL2U
*IBAN nummer: NL61RABO 0362585733

Gelieve bij uw betaling te vermelden: RESERVERINGSCODE, BOOTTYPE EN ZEILNUMMER

Betalingen, die door ons niet kunnen worden herleid, worden teruggeboekt.

Zodra wij uw betaling hebben ontvangen, zullen wij uw inschrijving in behandeling nemen.
Rond 26 mei wordt een bevestiging gestuurd naar alle inschrijvers waarvan op dat moment het inschrijfgeld is ontvangen.
Overige bevestigingen worden verstuurd zodra het inschrijfgeld is ontvangen, of zullen worden overhandigd op Texel.

Betalingen na 6 juni dienen bij het inschrijfbureau op het strand te worden voldaan.

Informatie over Inschrijvingen
Marie-Christine Pijnenburg
E-mail: info@roundtexel.com
Telefoon: +31.222.32 70 79
Fax: +31.222.32 04 20','nederlands' => '0'),
            array('id' => '23','contenttarget' => 'aanmeldingmailsubject','content' => 'Bevestiging inschrijving Ronde Om Texel','nederlands' => '1'),
            array('id' => '24','contenttarget' => 'aanmeldingmailsubject','content' => 'Confirmation registration Round of Texel','nederlands' => '0'),
            array('id' => '25','contenttarget' => 'bevestigingmailhtml','content' => '<p>
	Beste [aanmelder],</p>
<p>
	Wij hebben uw inschrijving en betaling ontvangen. Tot ons genoegen kunnen wij u mededelen dat u definitief bent ingeschreven. Rond 20 mei ontvangt u ter bevestiging het nieuwe &quot;Zwitserleven Ronde om TexeL&quot;- boekje en de wedstrijdbepaling.</p>
<p>
	Met vriendelijke groet,</p>
<p>
	Marie Christine Pijnenburg (inschrijvingen Ronde om Texel)</p>
<p>
	Email: info@roundtexel.com<br />
	Telefoon: 0222-327079<br />
	&nbsp;</p>
','nederlands' => '1'),
            array('id' => '26','contenttarget' => 'bevestigingmailhtml','content' => '<p>
	Dear [aanmelder],</p>
<p>
	We received your entry-form and payment. We are happy to inform you that your entry is complete. By May 20th we will send you the &quot;Zwitserleven Ronde om Texel&quot; booklet and the sailing instructions.</p>
<p>
	Kind regards,</p>
<p>
	Marie Christine Pijnenburg (Registration Office)</p>
<p>
	Email: info@roundtexel.com<br />
	Telefoon: 0222-327079<br />
	&nbsp;</p>
','nederlands' => '0'),
            array('id' => '27','contenttarget' => 'bevestigingmailplain','content' => 'Beste [aanmelder],

Wij hebben uw inschrijving en betaling ontvangen. Tot ons genoegen kunnen wij u mededelen dat u definitief bent ingeschreven. Rond 20 mei ontvangt u ter bevestiging het nieuwe "Zwitserleven Ronde om TexeL"- boekje en de wedstrijdbepaling.

Met vriendelijke groet,

Marie Christine Pijnenburg (inschrijvingen Ronde om Texel)

Email: info@roundtexel.com
Telefoon: 0222-327079

','nederlands' => '1'),
            array('id' => '28','contenttarget' => 'bevestigingmailplain','content' => 'Dear [aanmelder],

We received your entry-form and payment. We are happy to inform you that your entry is complete. By May 20th we will send you the "Zwitserleven Ronde om Texel" booklet and the sailing instructions.

Kind regards,

Marie Christine Pijnenburg (Registration Office)

Email: info@roundtexel.com
Telefoon: 0222-327079

','nederlands' => '0'),
            array('id' => '29','contenttarget' => 'bevestigingmailsubject','content' => 'Bevestiging deelname Ronde om Texel','nederlands' => '1'),
            array('id' => '30','contenttarget' => 'bevestigingmailsubject','content' => 'Confirmation participation Round of Texel','nederlands' => '0'),
            array('id' => '31','contenttarget' => 'sitetitel','content' => 'Ronde om Texel','nederlands' => '1'),
            array('id' => '32','contenttarget' => 'sitetitel','content' => 'Round of Texel','nederlands' => '0'),
            array('id' => '33','contenttarget' => 'siteondertitel','content' => 'Zwitserleven Ronde om Texel op 9 juni 2012','nederlands' => '1'),
            array('id' => '34','contenttarget' => 'siteondertitel','content' => 'Zwitserleven Round of Texel on 9 June 2012','nederlands' => '0'),
            array('id' => '35','contenttarget' => 'siteregistratietitel','content' => 'Inschrijfformulier','nederlands' => '1'),
            array('id' => '36','contenttarget' => 'siteregistratietitel','content' => 'Registrationform','nederlands' => '0')
        );

        foreach ($configuraties as $configuratie) {
            $u = new Configuratie();
            $u->setContenttarget($configuratie['contenttarget']);
            $u->setContent($configuratie['content']);
            $u->setNederlands($configuratie['nederlands']);
            $manager->persist($u);
        }

        $manager->flush();
    }
}