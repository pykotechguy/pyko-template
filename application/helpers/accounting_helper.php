<?php 
function load_datas( $path ){
	require( dirname( __FILE__ ) . "/datas/" . trim( $path ) . ".php" );
	return $datas;
}

function listIndustries( $selected = false ) {
    $industries = load_datas( 'industries' );
    asort( $industries );
    
	$html = "";
	
    foreach( $industries as $industry ) {
		if( $industry == $selected ) 
			$html .= "<option value='{$industry}' selected='selected'>{$industry}</option>";
		else
			$html .= "<option value='{$industry}'>{$industry}</option>";
	}
	
	echo $html;
}

function listCountries( $selected = false ) {
       
    $countries 	= load_datas( 'countries' );
	$html 		= "";
	
    foreach( $countries as $country ) {
        $country = (object)$country;
       
	   	if( $selected == $country->country )
			$html .= "<option value='{$country->country}' selected='selected'>{$country->country}</option>";
        else
			$html .= "<option value='{$country->country}'>{$country->country}</option>";
    }
	
	echo $html;
}

function listCurrencies( $selected = false ) {
	
    $currencies = load_datas( 'currencies' );
	$html		= "";
    foreach( $currencies as $currency ) {
       	list( $ccode ) = explode(" ", $currency);
        
        if( $selected == $ccode )
            $html .= "<option value='{$ccode}' selected='selected'>{$currency}</option>";
		else
			$html .= "<option value='{$ccode}'>{$currency}</option>";	
    }
    
	echo $html;
}

function getRecommendedCurrency( $countrySelected, $currencyOnly = false ) {
  	$countries 	= load_datas( 'countries' );
    $currencies = load_datas( 'currencies' );
	
    $currency = false;
    
    if( !empty($countrySelected) ) {
    
        foreach( $countries as $country ) {
            $country = (object) $country;
            if( strcmp($country->country, $countrySelected) == 0 ) {
                $currency = $currencies[ $country->currency ];
                break;
            }
        }
    
    }
    
    //if the currency has been found
    if( !empty($currency) ) {
        
        if( $currencyOnly ) {    
            return $currency;
        } else {
            $split = explode( " ", $currency );
            $optionString = "<option value=\"$split[0]\">$currency</option>";
            return $optionString;
        }
    
    //if no valid recommended currency
    } else {
        if( $currencyOnly ) {
            return "N/A - You have not set your country.";
        } else {
            $optionString = "<option value=\"\">N/A - You have not set your country.</option>";
            return $optionString;
        }
    }
    
    
    
}

function getSymbol( $tmp ) {
    
    $currency = null;
    
    switch( $tmp ) {

		case ($tmp=='INR' || $tmp=='MUR' || $tmp=='NPR' || $tmp=='PKR' || $tmp=='SCR' || $tmp=='LKR') : $currency = 'Rs'; break;
		case ($tmp=='USD' || $tmp=='ARS' || $tmp=='AUD' || $tmp=='BSD' || $tmp=='BBD' || $tmp=='BMD' || $tmp=='BND' || $tmp=='CAD' || $tmp=='KYD' || $tmp=='CLP' || $tmp=='COP' || $tmp=='FJD' || $tmp=='GYD' || $tmp=='HKD' || $tmp=='LRD' || $tmp=='MXN' || $tmp=='NAD' || $tmp=='NZD' || $tmp=='SGD' || $tmp=='SBD' || $tmp=='SRD' || $tmp=='TVD') : $currency = '&#36;'; break;
		case ($tmp=='ALL') : $currency = '&#76;&#101;&#107;'; break;
		case ($tmp=='AFN') : $currency = 'AFN'; break;
		case ($tmp=='AWG' || $tmp=='ANG') : $currency = '&#402;'; break;
		case ($tmp=='AZN') : $currency = '&#1084;&#1072;&#1085;'; break;
		case ($tmp=='BYR') : $currency = '&#112;&#46;'; break;
 		case ($tmp=='EUR') : $currency = "&#8364;"; break;
		case ($tmp=='BZD') : $currency = '&#66;&#90;&#36;'; break;
		case ($tmp=='BOB') : $currency = '&#36;&#98;'; break;
	  	case ($tmp=='BAM') : $currency = '&#75;&#77;'; break;
		case ($tmp=='BWP') : $currency = '&#80;'; break;
		case ($tmp=='BGN' || $tmp=='KZT' || $tmp=='KGS' || $tmp=='UZS') : $currency = '&#1083;&#1074;'; break;
 		case ($tmp=='GBP' || $tmp=='EGP' || $tmp=='FKP' || $tmp=='GIP' || $tmp=='GGP' || $tmp=='IMP' || $tmp=='JEP' || $tmp=='LBP' || $tmp=='SHP' || $tmp=='SYP' || $tmp=='SDG') : $currency = '&#163;'; break; 		
		case ($tmp=='BRL') : $currency = '&#82;&#36;'; break; 		
		case ($tmp=='KHR') : $currency = 'KHR'; break; 		
		case ($tmp=='CNY' || $tmp=='JPY') : $currency = '&#165;'; break; 		 		
		case ($tmp=='CRC' || $tmp=='SVC') : $currency = '&#8353;';break;
		case ($tmp=='HRK') : $currency = '&#107;&#110;';break;
		case ($tmp=='CUP') : $currency = '&#8369;'; break;
		case ($tmp=='CZK') : $currency = '&#75;&#269;'; break;
		case ($tmp=='DKK' || $tmp=='NOK' || $tmp=='EEK' || $tmp=='ISK' || $tmp=='SEK') : $currency = '&#107;&#114;';break; 	
		case ($tmp=='DOP') : $currency = '&#82;&#68;&#36;';break;
		case ($tmp=='GHS') : $currency = '&#162;'; break;
		case ($tmp=='GTQ') : $currency = '&#81;'; break;
		case ($tmp=='HNL') : $currency = '&#76;'; break;
		case ($tmp=='HUF') : $currency = '&#70;&#116;'; break;
 		case ($tmp=='IDR') : $currency = '&#82;&#112;'; break;
		case ($tmp=='IRR' || $tmp=='OMR' || $tmp=='QAR' || $tmp=='SAR' || $tmp=='YER') : $currency = '&#65020;';break;
		case ($tmp=='ILS') : $currency = '&#8362;'; break;
		case ($tmp=='JMD') : $currency = '&#74;&#36;'; break;
		case ($tmp=='KPW' || $tmp=='KRW') : $currency = '&#8361;'; break;
		case ($tmp=='LAK') : $currency = '&#8365;'; break;
		case ($tmp=='LVL') : $currency = '&#76;&#115;'; break;
		case ($tmp=='CHF') : $currency = 'Fr'; break; // &#67;&#72;&#70;
		case ($tmp=='LTL') : $currency = '&#76;&#116;'; break;
		case ($tmp=='MKD') : $currency = '&#1076;&#1077;&#1085;'; break;
		case ($tmp=='MYR') : $currency = '&#82;&#77;'; break;
		case ($tmp=='MNT') : $currency = '&#8366'; break;
		case ($tmp=='MZN') : $currency = '&#77;&#84;'; break;
		case ($tmp=='NIO') : $currency = '&#67;&#36;'; break;
		case ($tmp=='NGN') : $currency = '&#8358;'; break;
		case ($tmp=='PAB') : $currency = '&#66;&#47;&#46;'; break;
		case ($tmp=='PYG') : $currency = '&#71;&#115;'; break;
		case ($tmp=='PEN') : $currency = '&#83;&#47;&#46;'; break;
		case ($tmp=='PHP') : $currency = '&#80;&#104;&#112;'; break;
		case ($tmp=='PLN') : $currency = '&#122;&#322;'; break;
		case ($tmp=='RON') : $currency = '&#108;&#101;&#105;'; break;
		case ($tmp=='RUB') : $currency = '&#1088;&#1091;&#1073;'; break;
 		case ($tmp=='RSD') : $currency = '&#1044;&#1080;&#1085;&#46;'; break;
 		case ($tmp=='SOS' || $tmp=='SLSH') : $currency = 'Sh'; break;
		case ($tmp=='ZAR') : $currency = '&#82;'; break;
		case ($tmp=='TWD') : $currency = 'NT$'; break;	
		case ($tmp=='THB') : $currency = '&#3647;'; break;
		case ($tmp=='TTD') : $currency = '&#84;&#84;&#36;'; break;
		case ($tmp=='TRY') : $currency = '&#84;&#76;'; break;
		case ($tmp=='TRL') : $currency = '&#8356;'; break;
		case ($tmp=='UAH') : $currency = '&#8372;'; break;
		case ($tmp=='UYU') : $currency = '&#36;&#85;'; break;
		case ($tmp=='VEF') : $currency = '&#66;&#115;'; break; 			
		case ($tmp=='VND') : $currency = '&#8363;'; break;
		case ($tmp=='ZWD') : $currency = '&#90;&#36;'; break;	
		case ($tmp=='XPF*') : $currency = 'F'; break;
		case ($tmp=='XPF') : $currency = 'Fr'; break;
		case ($tmp=='DZD') : $currency = 'DA'; break;
		case ($tmp=='AOA') : $currency = 'Kz'; break;
		case ($tmp=='XCD') : $currency = 'EC$'; break;
		case ($tmp=='AMD') : $currency = 'AMD'; break;
		case ($tmp=='BHD') : $currency = 'BHD'; break;
		case ($tmp=='BDT') : $currency = 'BDT'; break;
		case ($tmp=='XOF') : $currency = 'Fr'; break;
		case ($tmp=='BTN') : $currency = 'BTN'; break;
		case ($tmp=='BIF') : $currency = 'Fr'; break;
		case ($tmp=='XAF') : $currency = 'Fr'; break;
		case ($tmp=='KMF') : $currency = 'Fr'; break;
		case ($tmp=='CDF') : $currency = 'Fr'; break;
		case ($tmp=='DJF') : $currency = 'Fr'; break;
		case ($tmp=='ERN') : $currency = 'Nfk'; break;
		case ($tmp=='ETB') : $currency = 'Br'; break;
		case ($tmp=='GMD') : $currency = 'D'; break;
		case ($tmp=='GEL') : $currency = 'GEL'; break;
		case ($tmp=='DKK*'): $currency = 'Kr'; break;
		case ($tmp=='GNF') : $currency = 'Fr'; break;
		case ($tmp=='HTG') : $currency = 'G'; break;
		case ($tmp=='IQD') : $currency = 'IQD'; break;
		case ($tmp=='JOD') : $currency = 'JOD'; break;	
		case ($tmp=='KES') : $currency = 'Sh'; break;	
		case ($tmp=='KWD') : $currency = 'KWD'; break;	
		case ($tmp=='LSL') : $currency = 'L'; break;
		case ($tmp=='LYD') : $currency = 'LYD'; break;
		case ($tmp=='MGA') : $currency = 'MGA'; break;
		case ($tmp=='MWK') : $currency = 'MWK'; break;
		case ($tmp=='MVR') : $currency = 'MVR'; break;
		case ($tmp=='MRO') : $currency = 'UM'; break;
		case ($tmp=='MDL') : $currency = 'MDL'; break;
		case ($tmp=='MAD') : $currency = 'MAD'; break;
		case ($tmp=='PGK' || $tmp=='MMK') : $currency = 'K'; break;
		case ($tmp=='RWF') : $currency = 'RF'; break;		
		case ($tmp=='STD') : $currency = 'Db'; break;
		case ($tmp=='SLL') : $currency = 'SLL'; break;
		case ($tmp=='SDD') : $currency = 'SDD'; break;
		case ($tmp=='SZL') : $currency = 'SZL'; break;
		case ($tmp=='TJS') : $currency = 'TJS'; break;	
		case ($tmp=='TZS') : $currency = 'Sh'; break;	
		case ($tmp=='TOP') : $currency = 'TOP'; break;				
		case ($tmp=='TND') : $currency = 'TND'; break;	
		case ($tmp=='TMM') : $currency = 'm'; break;						
		case ($tmp=='AED') : $currency = 'AED'; break;	
		case ($tmp=='VUV') : $currency = 'Vt'; break;	
		case ($tmp=='ZMK') : $currency = 'ZMK'; break;	
		case ($tmp=='UGX') : $currency = 'Sh'; break;
		case ($tmp=='CVE') : $currency = 'CVE'; break;
		case ($tmp=='RUB(Abk)' || $tmp=='PRB') : $currency ='p.'; break;
		case ($tmp=='CUC') : $currency = 'CUC'; break;
		case ($tmp=='MOP') : $currency = 'P'; break;
		case ($tmp=='TRY*') : $currency = 'TRY'; break;	
		case ($tmp=='WST') : $currency = 'T'; break;
        
        default : $currency = '';		
	}
    
    return $currency;
}

function dateFormats( $selected = false ) {
	
	$formats 	= load_datas( 'dateformats' );
	$html 		= ""; 
	
	foreach( $formats as $id => $string ){
	
		if( $id == $selected )
			$html .= "<option value='{$id}' selected='selected'>{$string}</option>";
		else
			$html .= "<option value='{$id}'>{$string}</option>";
	
	}
	
	echo $html;
}

function getMonths( $selected = false ) {

	$months 	= load_datas( 'months' );
	$html 		= ""; 
	
	foreach( $months as $id => $string ){
		
		if( $id == $selected )
			$html .= "<option value='{$id}' selected='selected'>{$string}</option>";
		else
			$html .= "<option value='{$id}'>{$string}</option>";
	}
	
	echo $html;
}
//value can be 0, 1, or 2, as selected
function listGenders( $selected = false ) {
       
    $genders = array(0=> 'Not Selected',
		1 => 'Male',
		2 => 'Female');
	$html 		= "";
	
    foreach( $genders as $key => $value ) {
        
	   	if( $key == $selected && $selected != FALSE) {
			$html .= "<option value='{$key}' selected='selected'>". $value. "1234</option>";
		} 
        else {
			$html .= "<option value='{$key}'>{$value}</option>";
		}
    }
	
	echo $html;
}


