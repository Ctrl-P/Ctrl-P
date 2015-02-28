<?php
mysql_connect("localhost","hecncit_project","p123456");
mysql_select_db("hecncit_project");

$q = "select * from login_users ";
$data = mysql_query($q);



function getCountry($country)
{
	$countries = array();
	$countries['AF'] = "Afghanistan";
	$countries['AX'] = "Aland Islands";
	$countries['AL'] = "Albania";
	$countries['DZ'] = "Algeria";
	$countries['AS'] = "American Samoa";
	$countries['AD'] = "Andorra";
	$countries['AO'] = "Angola";
	$countries['AI'] = "Anguilla";
	$countries['AQ'] = "Antarctica";
	$countries['AG'] = "Antigua and Barbuda";
	$countries['AR'] = "Argentina";
	$countries['AM'] = "Armenia";
	$countries['AW'] = "Aruba";
	$countries['AU'] = "Australia";
	$countries['AT'] = "Austria";
	$countries['AZ'] = "Azerbaijan";
	$countries['BS'] = "Bahamas";
	$countries['BH'] = "Bahrain";
	$countries['BD'] = "Bangladesh";
	$countries['BB'] = "Barbados";
	$countries['BY'] = "Belarus";
	$countries['BE'] = "Belgium";
	$countries['BZ'] = "Belize";
	$countries['BJ'] = "Benin";
	$countries['BM'] = "Bermuda";
	$countries['BT'] = "Bhutan";
	$countries['BO'] = "Bolivia";
	$countries['BQ'] = "Bonaire";
	$countries['BA'] = "Bosnia and Herzegovina";
	$countries['BW'] = "Botswana";
	$countries['BV'] = "Bouvet Island";
	$countries['BR'] = "Brazil";
	$countries['IO'] = "British Indian Ocean Territory";
	$countries['BN'] = "Brunei";
	$countries['BG'] = "Bulgaria";
	$countries['BF'] = "Burkina Faso";
	$countries['BI'] = "Burundi";
	$countries['CV'] = "Cabo Verde";
	$countries['KH'] = "Cambodia";
	$countries['CM'] = "Cameroon";
	$countries['CA'] = "Canada";
	$countries['KY'] = "Cayman Islands";
	$countries['CF'] = "Central African Republic";
	$countries['TD'] = "Chad";
	$countries['CL'] = "Chile";
	$countries['CN'] = "China";
	$countries['CX'] = "Christmas Island";
	$countries['CC'] = "Cocos (Keeling) Islands";
	$countries['CO'] = "Colombia";
	$countries['KM'] = "Comoros";
	$countries['CG'] = "Congo";
	$countries['CD'] = "Congo (DRC)";
	$countries['CK'] = "Cook Islands";
	$countries['CR'] = "Costa Rica";
	$countries['HR'] = "Croatia";
	$countries['CU'] = "Cuba";
	$countries['CW'] = "Curacao";
	$countries['CY'] = "Cyprus";
	$countries['CZ'] = "Czech Republic";
	$countries['DK'] = "Denmark";
	$countries['DJ'] = "Djibouti";
	$countries['DM'] = "Dominica";
	$countries['DO'] = "Dominican Republic";
	$countries['EC'] = "Ecuador";
	$countries['EG'] = "Egypt";
	$countries['SV'] = "El Salvador";
	$countries['GQ'] = "Equatorial Guinea";
	$countries['ER'] = "Eritrea";
	$countries['EE'] = "Estonia";
	$countries['ET'] = "Ethiopia";
	$countries['FK'] = "Falkland Islands";
	$countries['FO'] = "Faroe Islands";
	$countries['FJ'] = "Fiji Islands";
	$countries['FI'] = "Finland";
	$countries['FR'] = "France";
	$countries['GF'] = "French Guiana";
	$countries['PF'] = "French Polynesia";
	$countries['TF'] = "French Southern and Antarctic Lands";
	$countries['GA'] = "Gabon";
	$countries['GM'] = "Gambia, The";
	$countries['GE'] = "Georgia";
	$countries['DE'] = "Germany";
	$countries['GH'] = "Ghana";
	$countries['GI'] = "Gibraltar";
	$countries['GR'] = "Greece";
	$countries['GL'] = "Greenland";
	$countries['GD'] = "Grenada";
	$countries['GP'] = "Guadeloupe";
	$countries['GU'] = "Guam";
	$countries['GT'] = "Guatemala";
	$countries['GG'] = "Guernsey";
	$countries['GN'] = "Guinea";
	$countries['GW'] = "Guinea-Bissau";
	$countries['GY'] = "Guyana";
	$countries['HT'] = "Haiti";
	$countries['HM'] = "Heard Island and McDonald Islands";
	$countries['VA'] = "Holy See (Vatican City)";
	$countries['HN'] = "Honduras";
	$countries['HK'] = "Hong Kong SAR";
	$countries['HU'] = "Hungary";
	$countries['IS'] = "Iceland";
	$countries['IN'] = "India";
	$countries['ID'] = "Indonesia";
	$countries['IR'] = "Iran";
	$countries['IQ'] = "Iraq";
	$countries['IE'] = "Ireland";
	$countries['IM'] = "Isle of Man";
	$countries['IL'] = "Israel";
	$countries['IT'] = "Italy";
	$countries['JM'] = "Jamaica";
	$countries['SJ'] = "Jan Mayen";
	$countries['JP'] = "Japan";
	$countries['JE'] = "Jersey";
	$countries['JO'] = "Jordan";
	$countries['KZ'] = "Kazakhstan";
	$countries['KE'] = "Kenya";
	$countries['KI'] = "Kiribati";
	$countries['KR'] = "Korea";
	$countries['KW'] = "Kuwait";
	$countries['KG'] = "Kyrgyzstan";
	$countries['LA'] = "Laos";
	$countries['LV'] = "Latvia";
	$countries['LB'] = "Lebanon";
	$countries['LS'] = "Lesotho";
	$countries['LR'] = "Liberia";
	$countries['LY'] = "Libya";
	$countries['LI'] = "Liechtenstein";
	$countries['LT'] = "Lithuania";
	$countries['LU'] = "Luxembourg";
	$countries['MO'] = "Macao SAR";
	$countries['MK'] = "Macedonia, Former Yugoslav Republic of";
	$countries['MG'] = "Madagascar";
	$countries['MW'] = "Malawi";
	$countries['MY'] = "Malaysia";
	$countries['MV'] = "Maldives";
	$countries['ML'] = "Mali";
	$countries['MT'] = "Malta";
	$countries['MH'] = "Marshall Islands";
	$countries['MQ'] = "Martinique";
	$countries['MR'] = "Mauritania";
	$countries['MU'] = "Mauritius";
	$countries['YT'] = "Mayotte";
	$countries['MX'] = "Mexico";
	$countries['FM'] = "Micronesia";
	$countries['MD'] = "Moldova";
	$countries['MC'] = "Monaco";
	$countries['MN'] = "Mongolia";
	$countries['ME'] = "Montenegro";
	$countries['MS'] = "Montserrat";
	$countries['MA'] = "Morocco";
	$countries['MZ'] = "Mozambique";
	$countries['MM'] = "Myanmar";
	$countries['NA'] = "Namibia";
	$countries['NR'] = "Nauru";
	$countries['NP'] = "Nepal";
	$countries['NL'] = "Netherlands";
	$countries['NC'] = "New Caledonia";
	$countries['NZ'] = "New Zealand";
	$countries['NI'] = "Nicaragua";
	$countries['NE'] = "Niger";
	$countries['NG'] = "Nigeria";
	$countries['NU'] = "Niue";
	$countries['NF'] = "Norfolk Island";
	$countries['KP'] = "North Korea";
	$countries['MP'] = "Northern Mariana Islands";
	$countries['NO'] = "Norway";
	$countries['OM'] = "Oman";
	$countries['PK'] = "Pakistan";
	$countries['PW'] = "Palau";
	$countries['PS'] = "Palestinian Authority";
	$countries['PA'] = "Panama";
	$countries['PG'] = "Papua New Guinea";
	$countries['PY'] = "Paraguay";
	$countries['PE'] = "Peru";
	$countries['PH'] = "Philippines";
	$countries['PN'] = "Pitcairn Islands";
	$countries['PL'] = "Poland";
	$countries['PT'] = "Portugal";
	$countries['PR'] = "Puerto Rico";
	$countries['QA'] = "Qatar";
	$countries['CI'] = "Republic of Cote d'Ivoire";
	$countries['RE'] = "Reunion";
	$countries['RO'] = "Romania";
	$countries['RU'] = "Russia";
	$countries['RW'] = "Rwanda";
	$countries['XS'] = "Saba";
	$countries['SH'] = "Saint Helena, Ascension and Tristan da Cunha";
	$countries['WS'] = "Samoa";
	$countries['SM'] = "San Marino";
	$countries['ST'] = "Sao Tome and Principe";
	$countries['SA'] = "Saudi Arabia";
	$countries['SN'] = "Senegal";
	$countries['RS'] = "Serbia";
	$countries['SC'] = "Seychelles";
	$countries['SL'] = "Sierra Leone";
	$countries['SG'] = "Singapore";
	$countries['XE'] = "Sint Eustatius";
	$countries['SX'] = "Sint Maarten";
	$countries['SK'] = "Slovakia";
	$countries['SI'] = "Slovenia";
	$countries['SB'] = "Solomon Islands";
	$countries['SO'] = "Somalia";
	$countries['ZA'] = "South Africa";
	$countries['GS'] = "South Georgia and the South Sandwich Islands";
	$countries['ES'] = "Spain";
	$countries['LK'] = "Sri Lanka";
	$countries['BL'] = "St. Barthelemy";
	$countries['KN'] = "St. Kitts and Nevis";
	$countries['LC'] = "St. Lucia";
	$countries['MF'] = "St. Martin";
	$countries['PM'] = "St. Pierre and Miquelon";
	$countries['VC'] = "St. Vincent and the Grenadines";
	$countries['SD'] = "Sudan";
	$countries['SR'] = "Suriname";
	$countries['SZ'] = "Swaziland";
	$countries['SE'] = "Sweden";
	$countries['CH'] = "Switzerland";
	$countries['SY'] = "Syria";
	$countries['TW'] = "Taiwan";
	$countries['TJ'] = "Tajikistan";
	$countries['TZ'] = "Tanzania";
	$countries['TH'] = "Thailand";
	$countries['TL'] = "Timor-Leste";
	$countries['TG'] = "Togo";
	$countries['TK'] = "Tokelau";
	$countries['TO'] = "Tonga";
	$countries['TT'] = "Trinidad and Tobago";
	$countries['TN'] = "Tunisia";
	$countries['TR'] = "Turkey";
	$countries['TM'] = "Turkmenistan";
	$countries['TC'] = "Turks and Caicos Islands";
	$countries['TV'] = "Tuvalu";
	$countries['UG'] = "Uganda";
	$countries['UA'] = "Ukraine";
	$countries['AE'] = "United Arab Emirates";
	$countries['UK'] = "United Kingdom";
	$countries['US'] = "United States";
	$countries['UM'] = "United States Minor Outlying Islands";
	$countries['UY'] = "Uruguay";
	$countries['UZ'] = "Uzbekistan";
	$countries['VU'] = "Vanuatu";
	$countries['VE'] = "Venezuela";
	$countries['VN'] = "Vietnam";
	$countries['VG'] = "Virgin Islands, British";
	$countries['VI'] = "Virgin Islands, U.S.";
	$countries['WF'] = "Wallis and Futuna";
	$countries['YE'] = "Yemen";
	$countries['ZM'] = "Zambia";
	$countries['ZW'] = "Zimbabwe";

	return $countries[$country];
}
header('Content-type: text/csv');
header('Content-Disposition: attachment; filename="accounts.csv"');

echo "First Name,".
		"Last Name,".
		"Email,".
		"Program,".
		"Country,".
		"Balance,".
		"Total Pages Printed\r\n";

while($d = mysql_fetch_assoc($data))
{
	$sum = mysql_fetch_array(mysql_query("select sum(pages) as pgs from file_queue where user_name = '{$d['email']}' and printed = 1"));
	
	echo $d['fname'].",".
			$d['lname'].",".
			$d['email'].",".
			$d['program'].",".
			getCountry($d['country']).",".
			$d['balance'].",".
			$sum['pgs']."\r\n";
	
			
			
	
}

