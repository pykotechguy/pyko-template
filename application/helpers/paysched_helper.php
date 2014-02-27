<?php 
function define_pay_term_value($term) {

	if($term==7) {
     	$value="Weekly";
    } else if($term==14) {
	  	$value="Twice A month";
	} else if($term==30) {
	   $value="Every Month";
	} else if($term==60) {
	   $value="Every Other Month";  
	} else if($term==0) {
	  $value="On the last day of each pay period";  
	} else if($term==1) {
	  $value="After the last day of each pay period"; 
	} else if($term==2) {
	   $value="Before the last day of each pay period";       
	}
	
	return $value;

}

function listPaycheckdates($selected = FALSE) {
		$paycheckdates = array(
			0	=> 'On the last day of each pay period'
			1  => 'After Last Day'
			2  => 'Before Last Day'
		);
		$html = '';
		foreach($paycheckdates as $key => $val) {
			if(  $key == $selected ) {
				$html .= '<option value="'.$key.'" selected="selected">' . $val . '</option>';
			} else  {
				$html .= '<option value="'.$key.'">' . $val . '</option>';
			}
		}
		return $html;
}

function listPaycheckDates($selected = FALSE) {
		$paycheckDates = array(
			0	=> 'On the last day of each pay period'
			1  => 'After Last Day'
			2  => 'Before Last Day'
		);
		$html = '';
		foreach($paycheckDates as $key => $val) {
			if(  $key == $selected ) {
				$html .= '<option value="'.$key.'" selected="selected">' . $val . '</option>';
			} else  {
				$html .= '<option value="'.$key.'">' . $val . '</option>';
			}
		}
		return $html;
}

function listPayIntervals($selected = FALSE) {
	$payIntervals = array(
		7 	 => "Weekly",
		14 => "Twice A Month",
		30 => "Every Month",
		60 => "Every Other Month"
	);
    $html = '';
		foreach($payIntervals as $key => $val) {
			if(  $key == $selected ) {
				$html .= '<option value="'.$key.'" selected="selected">' . $val . '</option>';
			} else  {
				$html .= '<option value="'.$key.'">' . $val . '</option>';
			}
		}
		return $html;
}

