<?php

namespace ROT\Bundle\IISBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\Persistence\ObjectManager;
use ROT\Bundle\IISBundle\Entity\Nationaliteit;

class LoadNationaliteit extends AbstractFixture {
    public function load(ObjectManager $manager) {
        $nationaliteiten = array(
            array('id' => '1','nationaliteit' => 'Afghanistan','landcode' => 'AF'),
            array('id' => '2','nationaliteit' => 'Albania','landcode' => 'AL'),
            array('id' => '3','nationaliteit' => 'Algeria','landcode' => 'DZ'),
            array('id' => '4','nationaliteit' => 'American Samoa','landcode' => 'AS'),
            array('id' => '5','nationaliteit' => 'Andorra','landcode' => 'AD'),
            array('id' => '6','nationaliteit' => 'Angola','landcode' => 'AO'),
            array('id' => '7','nationaliteit' => 'Anguilla','landcode' => 'AI'),
            array('id' => '8','nationaliteit' => 'Antarctica','landcode' => 'AQ'),
            array('id' => '9','nationaliteit' => 'Antigua and Barbuda','landcode' => 'AG'),
            array('id' => '10','nationaliteit' => 'Argentina','landcode' => 'AR'),
            array('id' => '11','nationaliteit' => 'Armenia','landcode' => 'AM'),
            array('id' => '12','nationaliteit' => 'Aruba','landcode' => 'AW'),
            array('id' => '13','nationaliteit' => 'Australia','landcode' => 'AU'),
            array('id' => '14','nationaliteit' => 'Austria','landcode' => 'AT'),
            array('id' => '15','nationaliteit' => 'Azerbaijan','landcode' => 'AZ'),
            array('id' => '16','nationaliteit' => 'Bahamas','landcode' => 'BS'),
            array('id' => '17','nationaliteit' => 'Bahrain','landcode' => 'BH'),
            array('id' => '18','nationaliteit' => 'Bangladesh','landcode' => 'BD'),
            array('id' => '19','nationaliteit' => 'Barbados','landcode' => 'BB'),
            array('id' => '20','nationaliteit' => 'Belarus','landcode' => 'BY'),
            array('id' => '21','nationaliteit' => 'Belgium','landcode' => 'BE'),
            array('id' => '22','nationaliteit' => 'Belize','landcode' => 'BZ'),
            array('id' => '23','nationaliteit' => 'Benin','landcode' => 'BJ'),
            array('id' => '24','nationaliteit' => 'Bermuda','landcode' => 'BM'),
            array('id' => '25','nationaliteit' => 'Bhutan','landcode' => 'BT'),
            array('id' => '26','nationaliteit' => 'Bolivia','landcode' => 'BO'),
            array('id' => '27','nationaliteit' => 'Bosnia and Herzegovina','landcode' => 'BA'),
            array('id' => '28','nationaliteit' => 'Botswana','landcode' => 'BW'),
            array('id' => '29','nationaliteit' => 'Bouvet Island','landcode' => 'BV'),
            array('id' => '30','nationaliteit' => 'Brazil','landcode' => 'BR'),
            array('id' => '31','nationaliteit' => 'British Indian Ocean Territory','landcode' => 'IO'),
            array('id' => '32','nationaliteit' => 'Brunei Darussalam','landcode' => 'BN'),
            array('id' => '33','nationaliteit' => 'Bulgaria','landcode' => 'BG'),
            array('id' => '34','nationaliteit' => 'Burkina Faso','landcode' => 'BF'),
            array('id' => '35','nationaliteit' => 'Burundi','landcode' => 'BI'),
            array('id' => '36','nationaliteit' => 'Cambodia','landcode' => 'KH'),
            array('id' => '37','nationaliteit' => 'Cameroon','landcode' => 'CM'),
            array('id' => '38','nationaliteit' => 'Canada','landcode' => 'CA'),
            array('id' => '39','nationaliteit' => 'Cape Verde','landcode' => 'CV'),
            array('id' => '40','nationaliteit' => 'Cayman Islands','landcode' => 'KY'),
            array('id' => '41','nationaliteit' => 'Central African Republic','landcode' => 'CF'),
            array('id' => '42','nationaliteit' => 'Chad','landcode' => 'TD'),
            array('id' => '43','nationaliteit' => 'Chile','landcode' => 'CL'),
            array('id' => '44','nationaliteit' => 'China','landcode' => 'CN'),
            array('id' => '45','nationaliteit' => 'Christmas Island','landcode' => 'CX'),
            array('id' => '46','nationaliteit' => 'Cocos (Keeling) Islands','landcode' => 'CC'),
            array('id' => '47','nationaliteit' => 'Colombia','landcode' => 'CO'),
            array('id' => '48','nationaliteit' => 'Comoros','landcode' => 'KM'),
            array('id' => '49','nationaliteit' => 'Congo','landcode' => 'CG'),
            array('id' => '50','nationaliteit' => 'Cook Islands','landcode' => 'CK'),
            array('id' => '51','nationaliteit' => 'Costa Rica','landcode' => 'CR'),
            array('id' => '52','nationaliteit' => 'Cote D\'Ivoire (Ivory Coast)','landcode' => 'CI'),
            array('id' => '53','nationaliteit' => 'Croatia (Hrvatska)','landcode' => 'HR'),
            array('id' => '54','nationaliteit' => 'Cuba','landcode' => 'CU'),
            array('id' => '55','nationaliteit' => 'Cyprus','landcode' => 'CY'),
            array('id' => '56','nationaliteit' => 'Czech Republic','landcode' => 'CZ'),
            array('id' => '57','nationaliteit' => 'Czechoslovakia (former)','landcode' => 'CS'),
            array('id' => '58','nationaliteit' => 'Denmark','landcode' => 'DK'),
            array('id' => '59','nationaliteit' => 'Djibouti','landcode' => 'DJ'),
            array('id' => '60','nationaliteit' => 'Dominica','landcode' => 'DM'),
            array('id' => '61','nationaliteit' => 'Dominican Republic','landcode' => 'DO'),
            array('id' => '62','nationaliteit' => 'Dutch','landcode' => 'NL'),
            array('id' => '63','nationaliteit' => 'East Timor','landcode' => 'TP'),
            array('id' => '64','nationaliteit' => 'Ecuador','landcode' => 'EC'),
            array('id' => '65','nationaliteit' => 'Egypt','landcode' => 'EG'),
            array('id' => '66','nationaliteit' => 'El Salvador','landcode' => 'SV'),
            array('id' => '67','nationaliteit' => 'Equatorial Guinea','landcode' => 'GQ'),
            array('id' => '68','nationaliteit' => 'Eritrea','landcode' => 'ER'),
            array('id' => '69','nationaliteit' => 'Estonia','landcode' => 'EE'),
            array('id' => '70','nationaliteit' => 'Ethiopia','landcode' => 'ET'),
            array('id' => '71','nationaliteit' => 'Falkland Islands (Malvinas)','landcode' => 'FK'),
            array('id' => '72','nationaliteit' => 'Faroe Islands','landcode' => 'FO'),
            array('id' => '73','nationaliteit' => 'Fiji','landcode' => 'FJ'),
            array('id' => '74','nationaliteit' => 'Finland','landcode' => 'FI'),
            array('id' => '75','nationaliteit' => 'France','landcode' => 'FR'),
            array('id' => '76','nationaliteit' => 'France, Metropolitan','landcode' => 'FX'),
            array('id' => '77','nationaliteit' => 'French Guiana','landcode' => 'GF'),
            array('id' => '78','nationaliteit' => 'French Polynesia','landcode' => 'PF'),
            array('id' => '79','nationaliteit' => 'French Southern Territories','landcode' => 'TF'),
            array('id' => '80','nationaliteit' => 'Gabon','landcode' => 'GA'),
            array('id' => '81','nationaliteit' => 'Gambia','landcode' => 'GM'),
            array('id' => '82','nationaliteit' => 'Georgia','landcode' => 'GE'),
            array('id' => '83','nationaliteit' => 'Germany','landcode' => 'DE'),
            array('id' => '84','nationaliteit' => 'Ghana','landcode' => 'GH'),
            array('id' => '85','nationaliteit' => 'Gibraltar','landcode' => 'GI'),
            array('id' => '86','nationaliteit' => 'Great Britain (UK)','landcode' => 'GB'),
            array('id' => '87','nationaliteit' => 'Greece','landcode' => 'GR'),
            array('id' => '88','nationaliteit' => 'Greenland','landcode' => 'GL'),
            array('id' => '89','nationaliteit' => 'Grenada','landcode' => 'GD'),
            array('id' => '90','nationaliteit' => 'Guadeloupe','landcode' => 'GP'),
            array('id' => '91','nationaliteit' => 'Guam','landcode' => 'GU'),
            array('id' => '92','nationaliteit' => 'Guatemala','landcode' => 'GT'),
            array('id' => '93','nationaliteit' => 'Guinea','landcode' => 'GN'),
            array('id' => '94','nationaliteit' => 'Guinea-Bissau','landcode' => 'GW'),
            array('id' => '95','nationaliteit' => 'Guyana','landcode' => 'GY'),
            array('id' => '96','nationaliteit' => 'Haiti','landcode' => 'HT'),
            array('id' => '97','nationaliteit' => 'Heard and McDonald Islands','landcode' => 'HM'),
            array('id' => '98','nationaliteit' => 'Honduras','landcode' => 'HN'),
            array('id' => '99','nationaliteit' => 'Hong Kong','landcode' => 'HK'),
            array('id' => '100','nationaliteit' => 'Hungary','landcode' => 'HU'),
            array('id' => '101','nationaliteit' => 'Iceland','landcode' => 'IS'),
            array('id' => '102','nationaliteit' => 'India','landcode' => 'IN'),
            array('id' => '103','nationaliteit' => 'Indonesia','landcode' => 'ID'),
            array('id' => '104','nationaliteit' => 'Iran','landcode' => 'IR'),
            array('id' => '105','nationaliteit' => 'Iraq','landcode' => 'IQ'),
            array('id' => '106','nationaliteit' => 'Ireland','landcode' => 'IE'),
            array('id' => '107','nationaliteit' => 'Israel','landcode' => 'IL'),
            array('id' => '108','nationaliteit' => 'Italy','landcode' => 'IT'),
            array('id' => '109','nationaliteit' => 'Jamaica','landcode' => 'JM'),
            array('id' => '110','nationaliteit' => 'Japan','landcode' => 'JP'),
            array('id' => '111','nationaliteit' => 'Jordan','landcode' => 'JO'),
            array('id' => '112','nationaliteit' => 'Kazakhstan','landcode' => 'KZ'),
            array('id' => '113','nationaliteit' => 'Kenya','landcode' => 'KE'),
            array('id' => '114','nationaliteit' => 'Kiribati','landcode' => 'KI'),
            array('id' => '115','nationaliteit' => 'Korea (North)','landcode' => 'KP'),
            array('id' => '116','nationaliteit' => 'Korea (South)','landcode' => 'KR'),
            array('id' => '117','nationaliteit' => 'Kuwait','landcode' => 'KW'),
            array('id' => '118','nationaliteit' => 'Kyrgyzstan','landcode' => 'KG'),
            array('id' => '119','nationaliteit' => 'Laos','landcode' => 'LA'),
            array('id' => '120','nationaliteit' => 'Latvia','landcode' => 'LV'),
            array('id' => '121','nationaliteit' => 'Lebanon','landcode' => 'LB'),
            array('id' => '122','nationaliteit' => 'Lesotho','landcode' => 'LS'),
            array('id' => '123','nationaliteit' => 'Liberia','landcode' => 'LR'),
            array('id' => '124','nationaliteit' => 'Libya','landcode' => 'LY'),
            array('id' => '125','nationaliteit' => 'Liechtenstein','landcode' => 'LI'),
            array('id' => '126','nationaliteit' => 'Lithuania','landcode' => 'LT'),
            array('id' => '127','nationaliteit' => 'Luxembourg','landcode' => 'LU'),
            array('id' => '128','nationaliteit' => 'Macau','landcode' => 'MO'),
            array('id' => '129','nationaliteit' => 'Macedonia','landcode' => 'MK'),
            array('id' => '130','nationaliteit' => 'Madagascar','landcode' => 'MG'),
            array('id' => '131','nationaliteit' => 'Malawi','landcode' => 'MW'),
            array('id' => '132','nationaliteit' => 'Malaysia','landcode' => 'MY'),
            array('id' => '133','nationaliteit' => 'Maldives','landcode' => 'MV'),
            array('id' => '134','nationaliteit' => 'Mali','landcode' => 'ML'),
            array('id' => '135','nationaliteit' => 'Malta','landcode' => 'MT'),
            array('id' => '136','nationaliteit' => 'Marshall Islands','landcode' => 'MH'),
            array('id' => '137','nationaliteit' => 'Martinique','landcode' => 'MQ'),
            array('id' => '138','nationaliteit' => 'Mauritania','landcode' => 'MR'),
            array('id' => '139','nationaliteit' => 'Mauritius','landcode' => 'MU'),
            array('id' => '140','nationaliteit' => 'Mayotte','landcode' => 'YT'),
            array('id' => '141','nationaliteit' => 'Mexico','landcode' => 'MX'),
            array('id' => '142','nationaliteit' => 'Micronesia','landcode' => 'FM'),
            array('id' => '143','nationaliteit' => 'Moldova','landcode' => 'MD'),
            array('id' => '144','nationaliteit' => 'Monaco','landcode' => 'MC'),
            array('id' => '145','nationaliteit' => 'Mongolia','landcode' => 'MN'),
            array('id' => '146','nationaliteit' => 'Montserrat','landcode' => 'MS'),
            array('id' => '147','nationaliteit' => 'Morocco','landcode' => 'MA'),
            array('id' => '148','nationaliteit' => 'Mozambique','landcode' => 'MZ'),
            array('id' => '149','nationaliteit' => 'Myanmar','landcode' => 'MM'),
            array('id' => '150','nationaliteit' => 'Namibia','landcode' => 'NA'),
            array('id' => '151','nationaliteit' => 'Nauru','landcode' => 'NR'),
            array('id' => '152','nationaliteit' => 'Nepal','landcode' => 'NP'),
            array('id' => '153','nationaliteit' => 'Netherlands','landcode' => 'NL'),
            array('id' => '154','nationaliteit' => 'Netherlands Antilles','landcode' => 'AN'),
            array('id' => '155','nationaliteit' => 'Neutral Zone','landcode' => 'NT'),
            array('id' => '156','nationaliteit' => 'New Caledonia','landcode' => 'NC'),
            array('id' => '157','nationaliteit' => 'New Zealand (Aotearoa)','landcode' => 'NZ'),
            array('id' => '158','nationaliteit' => 'Nicaragua','landcode' => 'NI'),
            array('id' => '159','nationaliteit' => 'Niger','landcode' => 'NE'),
            array('id' => '160','nationaliteit' => 'Nigeria','landcode' => 'NG'),
            array('id' => '161','nationaliteit' => 'Niue','landcode' => 'NU'),
            array('id' => '162','nationaliteit' => 'Norfolk Island','landcode' => 'NF'),
            array('id' => '163','nationaliteit' => 'Northern Mariana Islands','landcode' => 'MP'),
            array('id' => '164','nationaliteit' => 'Norway','landcode' => 'NO'),
            array('id' => '165','nationaliteit' => 'Oman','landcode' => 'OM'),
            array('id' => '166','nationaliteit' => 'Pakistan','landcode' => 'PK'),
            array('id' => '167','nationaliteit' => 'Palau','landcode' => 'PW'),
            array('id' => '168','nationaliteit' => 'Panama','landcode' => 'PA'),
            array('id' => '169','nationaliteit' => 'Papua New Guinea','landcode' => 'PG'),
            array('id' => '170','nationaliteit' => 'Paraguay','landcode' => 'PY'),
            array('id' => '171','nationaliteit' => 'Peru','landcode' => 'PE'),
            array('id' => '172','nationaliteit' => 'Philippines','landcode' => 'PH'),
            array('id' => '173','nationaliteit' => 'Pitcairn','landcode' => 'PN'),
            array('id' => '174','nationaliteit' => 'Poland','landcode' => 'PL'),
            array('id' => '175','nationaliteit' => 'Portugal','landcode' => 'PT'),
            array('id' => '176','nationaliteit' => 'Puerto Rico','landcode' => 'PR'),
            array('id' => '177','nationaliteit' => 'Qatar','landcode' => 'QA'),
            array('id' => '178','nationaliteit' => 'Reunion','landcode' => 'RE'),
            array('id' => '179','nationaliteit' => 'Romania','landcode' => 'RO'),
            array('id' => '180','nationaliteit' => 'Russian Federation','landcode' => 'RU'),
            array('id' => '181','nationaliteit' => 'Rwanda','landcode' => 'RW'),
            array('id' => '182','nationaliteit' => 'Saint Kitts and Nevis','landcode' => 'KN'),
            array('id' => '183','nationaliteit' => 'Saint Lucia','landcode' => 'LC'),
            array('id' => '184','nationaliteit' => 'Saint Vincent and the Grenadines','landcode' => 'VC'),
            array('id' => '185','nationaliteit' => 'Samoa','landcode' => 'WS'),
            array('id' => '186','nationaliteit' => 'San Marino','landcode' => 'SM'),
            array('id' => '187','nationaliteit' => 'Sao Tome and Principe','landcode' => 'ST'),
            array('id' => '188','nationaliteit' => 'Saudi Arabia','landcode' => 'SA'),
            array('id' => '189','nationaliteit' => 'Senegal','landcode' => 'SN'),
            array('id' => '190','nationaliteit' => 'Seychelles','landcode' => 'SC'),
            array('id' => '191','nationaliteit' => 'Sierra Leone','landcode' => 'SL'),
            array('id' => '192','nationaliteit' => 'Singapore','landcode' => 'SG'),
            array('id' => '193','nationaliteit' => 'Slovak Republic','landcode' => 'SK'),
            array('id' => '194','nationaliteit' => 'Slovenia','landcode' => 'SI'),
            array('id' => '195','nationaliteit' => 'Solomon Islands','landcode' => 'Sb'),
            array('id' => '196','nationaliteit' => 'Somalia','landcode' => 'SO'),
            array('id' => '197','nationaliteit' => 'South Africa','landcode' => 'ZA'),
            array('id' => '198','nationaliteit' => 'Spain','landcode' => 'ES'),
            array('id' => '199','nationaliteit' => 'Sri Lanka','landcode' => 'LK'),
            array('id' => '200','nationaliteit' => 'St. Helena','landcode' => 'SH'),
            array('id' => '201','nationaliteit' => 'St. Pierre and Miquelon','landcode' => 'PM'),
            array('id' => '202','nationaliteit' => 'Sudan','landcode' => 'SD'),
            array('id' => '203','nationaliteit' => 'Suriname','landcode' => 'SR'),
            array('id' => '204','nationaliteit' => 'Svalbard and Jan Mayen Islands','landcode' => 'SJ'),
            array('id' => '205','nationaliteit' => 'Swaziland','landcode' => 'SZ'),
            array('id' => '206','nationaliteit' => 'Sweden','landcode' => 'SE'),
            array('id' => '207','nationaliteit' => 'Switzerland','landcode' => 'CH'),
            array('id' => '208','nationaliteit' => 'Syria','landcode' => 'SY'),
            array('id' => '209','nationaliteit' => 'S. Georgia and S. Sandwich Isls.','landcode' => 'GS'),
            array('id' => '210','nationaliteit' => 'Taiwan','landcode' => 'TW'),
            array('id' => '211','nationaliteit' => 'Tajikistan','landcode' => 'TJ'),
            array('id' => '212','nationaliteit' => 'Tanzania','landcode' => 'TZ'),
            array('id' => '213','nationaliteit' => 'Texel','landcode' => 'TX'),
            array('id' => '214','nationaliteit' => 'Thailand','landcode' => 'TH'),
            array('id' => '215','nationaliteit' => 'Togo','landcode' => 'TG'),
            array('id' => '216','nationaliteit' => 'Tokelau','landcode' => 'TK'),
            array('id' => '217','nationaliteit' => 'Tonga','landcode' => 'TO'),
            array('id' => '218','nationaliteit' => 'Trinidad and Tobago','landcode' => 'TT'),
            array('id' => '219','nationaliteit' => 'Tunisia','landcode' => 'TN'),
            array('id' => '220','nationaliteit' => 'Turkey','landcode' => 'TR'),
            array('id' => '221','nationaliteit' => 'Turkmenistan','landcode' => 'TM'),
            array('id' => '222','nationaliteit' => 'Turks and Caicos Islands','landcode' => 'TC'),
            array('id' => '223','nationaliteit' => 'Tuvalu','landcode' => 'TV'),
            array('id' => '224','nationaliteit' => 'Uganda','landcode' => 'UG'),
            array('id' => '225','nationaliteit' => 'Ukraine','landcode' => 'UA'),
            array('id' => '226','nationaliteit' => 'United Arab Emirates','landcode' => 'AE'),
            array('id' => '227','nationaliteit' => 'United Kingdom','landcode' => 'UK'),
            array('id' => '228','nationaliteit' => 'United States','landcode' => 'US'),
            array('id' => '229','nationaliteit' => 'Uruguay','landcode' => 'UY'),
            array('id' => '230','nationaliteit' => 'US Minor Outlying Islands','landcode' => 'UM'),
            array('id' => '231','nationaliteit' => 'USSR (former)','landcode' => 'SU'),
            array('id' => '232','nationaliteit' => 'Uzbekistan','landcode' => 'UZ'),
            array('id' => '233','nationaliteit' => 'Vanuatu','landcode' => 'VU'),
            array('id' => '234','nationaliteit' => 'Vatican City State (Holy See)','landcode' => 'VA'),
            array('id' => '235','nationaliteit' => 'Venezuela','landcode' => 'VE'),
            array('id' => '236','nationaliteit' => 'Viet Nam','landcode' => 'VN'),
            array('id' => '237','nationaliteit' => 'Virgin Islands (British)','landcode' => 'VG'),
            array('id' => '238','nationaliteit' => 'Virgin Islands (U.S.)','landcode' => 'VI'),
            array('id' => '239','nationaliteit' => 'Wallis and Futuna Islands','landcode' => 'WF'),
            array('id' => '240','nationaliteit' => 'Western Sahara','landcode' => 'EH'),
            array('id' => '241','nationaliteit' => 'Yemen','landcode' => 'YE'),
            array('id' => '242','nationaliteit' => 'Yugoslavia','landcode' => 'YU'),
            array('id' => '243','nationaliteit' => 'Zaire','landcode' => 'ZR'),
            array('id' => '244','nationaliteit' => 'Zambia','landcode' => 'ZM'),
            array('id' => '245','nationaliteit' => 'Zimbabwe','landcode' => 'ZW')
        );

        foreach ($nationaliteiten as $nationaliteit) {
            $n = new Nationaliteit();
            $n->setNationaliteit($nationaliteit['nationaliteit']);
            $n->setLandcode($nationaliteit['landcode']);
            $manager->persist($n);
            $this->setReference('nationaliteit-' . $nationaliteit['nationaliteit'], $n);
        }

        $manager->flush();
    }
}