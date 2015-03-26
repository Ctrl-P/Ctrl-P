<?php
/**
 * Fuel is a fast, lightweight, community driven PHP5 framework.
 *
 * @package    Fuel
 * @version    1.7
 * @author     Fuel Development Team
 * @license    MIT License
 * @copyright  2010 - 2014 Fuel Development Team
 * @link       http://fuelphp.com
 */

/**
 * The Welcome Controller.
 *
 * A basic controller example. Has examples of how to set the
 * response body and status.
 *
 * @package app
 *          @extends Controller
 */

class Controller_Account extends Controller
{
	public function action_index()
	{
		$head = View::forge ( 'head' );
		$head->title = "Account";
		
		// account dashboard takes place here
		$account_info = new Model_User ();
		
		$ac = $account_info->get_info ( Session::get ( "userid" ) );
		
		$view = View::forge ( 'account' );
		$view->role = $ac [0] ['role'];
		
		$view->balance = $ac [0] ['balance'];
		$view->head = $head;
		
		return $view;
	}
	
	public function action_manage()
	{
		
		
		
		$head = View::forge ( 'head' );
		$head->title = "Manage Account";
		
		// account dashboard takes place here
		$account_info = new Model_User ();
		$account_info->resetDates();
		$ac = $account_info->get_info ( Session::get ( "userid" ) );
		
		$view = View::forge ( 'manageaccount' );
		$view->role = $ac [0] ['role'];
		
		$view->balance = $ac [0] ['balance'];
		$view->head = $head;
		$view->msg = "";
		if(isset($_POST['dob-d']))
		{
			
			if($_POST['dob-d'] == "")
			{
				$dofbb = "";
			}
			else
			{
				$dofbb = $_POST['dob-d']."-".$_POST['dob-m']."-".$_POST['dob-y'];
			}
			Model_User::updateDOB( Session::get ( "userid" ), $dofbb);
			$view->msg = "User information Updated Successfully!";
				
		}
		
		
		$ac = $account_info->get_info ( Session::get ( "userid" ) );
		
		
		$view->role = $ac [0] ['role'];
		
		$view->balance = $ac [0] ['balance'];
		$view->head = $head;
		
		
		$view->dob =  $ac [0] ['dob'];
		$view->email =  $ac [0] ['user_id'];
		$view->graddate =  $ac [0] ['graduate_date'];
		$view->gender =  $ac [0] ['gender'];
		
		$view->program =  $ac [0] ['program'];
		
		if($ac [0] ['country']!="")
			$view->country = $this->getCountry($ac [0] ['country']);
		else
			$view->country = "N/A";
		
		
	
		
	
		
		
		return $view;
	}
	public function action_notoken()
	{
		$head = View::forge ( 'notoken' );
		return $head;
	}
	public function action_ads()
	{
		
		
		
		
		$head = View::forge ( 'head' );
		$head->title = "Manage Ads";
		
		// account dashboard takes place here
		$account_info = new Model_User ();
		$account_info->resetDates();
		$ac = $account_info->get_info ( Session::get ( "userid" ) );
		
		$view = View::forge ( 'ads' );
		$view->role = $ac [0] ['role'];
		
		$view->balance = $ac [0] ['balance'];
		$view->head = $head;
		
		
		
		$ads = $account_info->getAds();
		
		$add = array ();
		for($ii = 0; $ii < count ( $ads ); $ii ++)
		{
			$add [] = $ads [$ii];
		}
		
		$view->ads = $add;
		
		
		return $view;
		
		
		
		
		
	}
	public function get_num_pages_docx($filename)
	{
		$zip = new ZipArchive ();
		
		if ($zip->open ( $filename ) === true)
		{
			if (($index = $zip->locateName ( 'docProps/app.xml' )) !== false)
			{
				$data = $zip->getFromIndex ( $index );
				$zip->close ();
				
				$xml = new SimpleXMLElement ( $data );
				
				return $xml;
			}
			
			$zip->close ();
		}
		
		return false;
	}
	
	public function getCountry($country)
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
	
	public function action_manage_user()
	{
		
		if(isset($_POST['user_sel']) && $_POST['pages'] > 0)
		{
			if(count($_POST['user_sel'])>0)
			{
				for($i =0; $i <count($_POST['user_sel']); $i++)
				{
					$dd = new Model_User();
					$dd->addBalance($_POST['user_sel'][$i], $_POST['pages']);
				}
			}
		}
		
		$head = View::forge ( 'head' );
		$head->title = "View Users";
		
		// account dashboard takes place here
		$account_info = new Model_User ();
		$account_info->resetDates();
		$ac = $account_info->get_info ( Session::get ( "userid" ) );
		
		$view = View::forge ( 'manage_user' );
		$view->role = $ac [0] ['role'];
		
		$view->balance = $ac [0] ['balance'];
		$view->head = $head;
		
		$accounts = $account_info->getAllAccounts ();
		$acc = array ();
		
		
		for($ii = 0; $ii < count ( $accounts ); $ii ++)
		{
			
			$acc [$ii] = $accounts [$ii];
			// get account totals
			$acc[$ii]['prints'] = count($account_info->getAccountPrints($acc[$ii]['email']));
			$totalpages = $account_info->getAccountPrints($acc[$ii]['email']);
			$acc[$ii]['pagess'] = 0;
			for($i4 = 0; $i4 < count($totalpages); $i4++)
			{
				$acc[$ii]['pagess'] += $totalpages[$i4]['pages'];
			}
			if($acc[$ii]['country']!="")
			$acc[$ii]['country'] = $this->getCountry($acc[$ii]['country']);
		}
		
		$view->accounts = $acc;
		
		return $view;
	}
	
	public function action_ads_upload()
	{
		
		
		$head = View::forge ( 'head' );
		$head->title = "Upload Ad";
	
		// account dashboard takes place here
		$account_info = new Model_User ();
		$account_info->resetDates();
		$ac = $account_info->get_info ( Session::get ( "userid" ) );
	
		$view = View::forge ( 'upload_ad' );
		$view->role = $ac [0] ['role'];
	
		$view->balance = $ac [0] ['balance'];
		$view->head = $head;

	
		if(isset($_FILES) && count ( $_FILES ) > 0)
		{
			
			$view = View::forge ( 'upload_ad_ok' );
			$view->role = $ac [0] ['role'];
			
			$view->balance = $ac [0] ['balance'];
			$view->head = $head;
			
			$config = array ('path' => DOCROOT . 'files', 'randomize' => true, 'ext_whitelist' => array ('pdf','PDF' ) );
				
			Upload::process ( $config );
				
			if (Upload::is_valid ())
			{
				// save them according to the config
				Upload::save ();
			
				$uploaded = Upload::get_files ();
			
				$ext = explode ( ".", $uploaded [0] ['saved_as'] );
				
				
				$ads = new Model_Printings();
				$res = $ads->upload_ad( $uploaded [0] ['saved_as'], $_POST['ad_name'], $_POST['max_print']);
				if($res)
				{
					$view->res = "OK";
				}
				else
				{
					$view->res = "NO";
				}
			
				//return $this->action_ads();
				return $view;
			
		
				
			}
			else
			{
				$view->res = "NOT VALID";
				return $view;
			}
				
			
			$view->res = "NO";
			return $view;
			
		}
	
		return $view;
	}
	public function action_logout()
	{
		header("Location: http://hec.ncitsolutions.com/theme/index-hec.html");
		
	}
	public function action_balance()
	{
		
		$add = "";
		
		if(isset($_POST['balance1']))
		{
			
			$dd = new Model_User();
			$dd->addBalance($this->param("id"), $_POST['balance1']);
			$add = "Added";
		}
		
		$ai = new Model_User ();
		
		$head = View::forge ( 'head' ); 
		$head->title = "Printing Queue";
		
	
		
		
		// get new account info.
		$account_info = $ai->get_info_id ( $this->param("id") );
		
		// get current Queue:
		$mp = new Model_Printings ();
		$printings = $mp->getQueueUser ($account_info [0] ['email']);
		$d = array ();
		for($i = 0; $i < count ( $printings ); $i ++)
		{
			
		$d [$i] = $printings [$i];
		$d[$i]['upload_date_time'] = date("d-m-Y H:i:s",strtotime("+6 Hours",strtotime($d[$i]['added_dt'])));
		}
		
		$view = View::forge ( 'user_queue' );
		$view->email = $account_info [0] ['email'];
		$view->add =$add;
		$view->balance = $account_info [0] ['balance'];
		$view->printings = $d;
				$view->head = $head;
				return $view;
		
	}
	public function action_toprint()
	{
		if(isset($_POST['file']) && isset($_POST['print']))
		{
			
			
			// move file from Queue to Printing Queue
			$mp = new Model_Printings ();
			$res = $mp->movetoPrint($_POST['file']);
			
			if($res == "OK")
			{
				return $this->action_queue();
			}
			else
			{
				$ai = new Model_User ();
				
				$head = View::forge ( 'head' );
				$head->title = "My Printing Queue";
				
				
				$view = View::forge ( 'insufficient-balance' );
				
					
				$view->head = $head;
				return $view;
				
			}
			
		}
		else
		{
			if(isset($_POST['file']) && isset($_POST['cancel']))
			{
				
				
				// remove from Queue
				$mp = new Model_Printings ();
				$res = $mp->removePrint($_POST['file']);
					
				if($res == "OK")
				{
					return $this->action_queue();
				}
				
				
			}
		}
	}
	public function action_queue()
	{
		$ai = new Model_User ();
		
		$head = View::forge ( 'head' );
		$head->title = "My Printing Queue";
		
// 		if (isset ( $_POST ['pages'] ))
// 		{
// 			// update balance based on uploaded document pages:
// 			$ai->updateBalance ( Session::get ( "userid" ), $_POST ['pages'] );
// 		}
		
		// get new account info.
		$account_info = $ai->get_info ( Session::get ( "userid" ) );
		
		// get current Queue:
		$mp = new Model_Printings ();
		$printings = $mp->getQueue ();
		$d = array ();
		for($i = 0; $i < count ( $printings ); $i ++)
		{
			$d [$i] = $printings [$i];
			$d[$i]['upload_date_time'] = date("d-m-Y H:i:s",strtotime("+6 Hours",strtotime($d[$i]['upload_date_time'])));
		}
		
		
		$printings_new = $mp->getQueueNew ();
		$dnew = array ();
		for($i = 0; $i < count ( $printings_new ); $i ++)
		{
		$dnew [$i] = $printings_new [$i];
		$dnew[$i]['added_dt'] = date("d-m-Y H:i:s",strtotime("+6 Hours",strtotime($dnew[$i]['added_dt'])));
		}
		
		
		$printingsh = $mp->getQueueHistory();
		$dh = array ();
		for($i = 0; $i < count ( $printingsh ); $i ++)
		{
		$dh [$i] = $printingsh [$i];
		$dh[$i]['added_dt'] = date("d-m-Y H:i:s",strtotime("+6 Hours",strtotime($dh[$i]['added_dt'])));
		}
		
		$view = View::forge ( 'queue' );
		$view->balance = $account_info [0] ['balance']; 
		$view->printings = $d;
		$view->printings_new = $dnew;
		$view->printingsH = $dh;
		$view->head = $head;
		return $view;
	}
	public function action_format()
	{
		$head = View::forge ( 'head' );
		$head->title = "Formatting Instructions";
		
		if (isset ( $_POST ['internal_file'] ))
		{
			$ai = new Model_User ();
			$account_info = $ai->get_info ( Session::get ( "userid" ) );
			
			$mp = new Model_Printings ();
			$mp->uploadfile ( Session::get ( "userid" ), $_POST ['uploaded_file'], $_POST ['internal_file'], $_POST ['pages'] );
			
			$view = View::forge ( 'upload_formatting' );
			$view->balance = $account_info [0] ['balance'];
			$view->pages = $_POST ['pages'];
			
			$view->head = $head;
			return $view;
		}
	}
	public function action_upload()
	{
		// account dashboard takes place here
		$account_info = new Model_User ();
		$account_info->resetDates();
		$ac = $account_info->get_info ( Session::get ( "userid" ) );
		
		if (isset ( $_FILES ) && count ( $_FILES ) > 0)
		{
			
			$config = array ('path' => DOCROOT . 'files', 'randomize' => true, 'ext_whitelist' => array ('docx', 'pptx', 'pdf' ) );
			
			Upload::process ( $config );
			
			if (Upload::is_valid ())
			{
				// save them according to the config
				Upload::save ();
				
				$uploaded = Upload::get_files ();
				
				$ext = explode ( ".", $uploaded [0] ['saved_as'] );
				
				$view = View::forge ( 'upload_confirm' );
				
				$view->file = $uploaded [0] ['name'];
				
				$view->uploaded = $uploaded [0] ['name'];
				$view->internal = $uploaded [0] ['saved_as'];
				
				switch (strtolower ( $ext [count ( $ext ) - 1] ))
				{
					case "docx" :
						if ($uploaded [0] ['type'] != "application/vnd.openxmlformats-officedocument.wordprocessingml.document")
						{
							$view->error = "The File you uploaded does not match with it's extension<br>";
						} else
						{
							$view->type = "Word File";
							$view->pages = $this->get_num_pages_docx ( DOCROOT . 'files/' . $uploaded [0] ['saved_as'] )->Pages;
						}
						break;
					
					case "pptx" :
						if ($uploaded [0] ['type'] != "application/vnd.openxmlformats-officedocument.presentationml.presentation")
						{
							$view->error = "The File you uploaded does not match with it's extension<br>";
						} else
						{
							$view->type = "Power Point File";
							$view->pages = $this->get_num_pages_docx ( DOCROOT . 'files/' . $uploaded [0] ['saved_as'] )->Slides;
						}
						break;
					
					case "pdf" :
						
						
							$view->type = "PDF File";
							$im = new Imagick ();
							$im->pingImage ( DOCROOT . 'files/' . $uploaded [0] ['saved_as'] );
							$view->pages = $im->getNumberImages ();
						
						break;
				}
				
				if (! isset ( $view->type ))
				{
					$notval = View::forge ( 'head' );
					$notval->title = "Not Valid File!";
					
					$view = View::forge ( 'invalid_file_type' );
					$view->head = $notval;
					
					return $view;
				} else
				{
					
					$view->balance = $ac [0] ['balance'];
					return $view;
				}
			} else
			{
				$notval = View::forge ( 'head' );
				$notval->title = "Not Valid File!";
				
				$view = View::forge ( 'invalid_file_type' );
				$view->head = $notval;
				
				return $view;
			}
		} else
		{
			$account_info = new Model_User ();
			$account_info->resetDates();
			$ac = $account_info->get_info ( Session::get ( "userid" ) );
			
			$view = View::forge ( 'upload' );
			
			$view->balance = $ac [0] ['balance'];
			return $view;
		}
	}
}
