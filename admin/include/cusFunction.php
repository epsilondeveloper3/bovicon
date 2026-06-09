<?php
	function getNowDt() {
		return date("Y-m-d H:i:s");
	}
	
	function getCusDt($frmt = "Y-m-d H:i:s") {
		return date($frmt);
	}

	function chkDbDt($nDt,$frmt = "",$rtnVal = "") {
		if($nDt==NULL)
			return $rtnVal;
		else if($nDt == '0000-00-00 00:00:00')
			return $rtnVal;
		else if($nDt == '0000-00-00')
			return $rtnVal;
		else if($nDt == '1970-01-01')
			return $rtnVal;
		else {
			if($frmt != "")
				return date($frmt,strtotime($nDt));
			else
				return $nDt;
		}
	}

	function formatDate($date, $withTime = false) {
		if (!$date || $date == '0000-00-00' || $date == '0000-00-00 00:00:00' || $date == '1970-01-01') return '-';
		return date("d-m-Y", strtotime($date));
	}
	function sernum() {
		$template   = 'XX999X';
		$k = strlen($template);
		$sernum = '';
		for ($i=0; $i<$k; $i++) {
			switch($template[$i]) {
				case 'X': $sernum .= chr(rand(65,90)); break;
				case '9': $sernum .= rand(0,9); break;
			}
		}
		return $sernum;
  	}

	  function JCBNumber() {
		$template   = 'XX999XXX999XXX';
		$k = strlen($template);
		$JCBNum = '';
		for ($i=0; $i<$k; $i++) {
			switch($template[$i]) {
				case 'X': $JCBNum .= chr(rand(65,90)); break;
				case '9': $JCBNum .= rand(0,9); break;
			}
		}
		return $JCBNum;
  	}

	function renderDropdown($name, $id, $label, $multiple = false, $extraClass = '', $options = []) {
		$multipleAttr = $multiple ? 'multiple="multiple"' : '';
		$placeholder = "Select " . $label;
		$class = "form-control " . $extraClass;
		
		echo '<label class="form-label">' . $label . '</label>';
		echo '<select name="' . $name . '" id="' . $id . '" class="' . $class . '" ' . $multipleAttr . ' data-placeholder="' . $placeholder . '" style="width: 100%;">';
		if (!$multiple) {
			echo '<option value="">' . $placeholder . '</option>';
		}
		if (!empty($options)) {
			foreach ($options as $val => $text) {
				if (is_int($val)) $val = $text;
				echo '<option value="' . $val . '">' . $text . '</option>';
			}
		}
		echo '</select>';
	}

	function renderMultiSelectWithSearch($name, $id, $label, $extraClass = '') {
		$placeholder = "Select " . $label;
		$class = "form-control select2-checklist " . $extraClass;
		
		echo '<label class="form-label">' . $label . '</label>';
		echo '<select name="' . $name . '" id="' . $id . '" class="' . $class . '" multiple="multiple" data-placeholder="' . $placeholder . '" style="width: 100%;">';
		echo '</select>';
	}
?>