<?php
function preview_text($value, $limit = 300)
{
	$value = stripslashes($value);
	$value = htmlspecialchars_decode($value, ENT_QUOTES);
	$value = str_ireplace(array('<br>', '<br />', '<br/>'), ' ', $value);
	$value = strip_tags($value);
	$value = trim($value);
	if (mb_strlen($value) < $limit) {
		return $value;
	} else {
		$value   = mb_substr($value, 0, $limit);
		$length  = mb_strripos($value, ' ');
		$end     = mb_substr($value, $length - 1, 1);

		if (empty($length)) {
			return $value;
		} elseif (in_array($end, array('.', '!', '?'))) {
			return mb_substr($value, 0, $length);
		} elseif (in_array($end, array(',', ':', ';', '«', '»', '…', '(', ')', '—', '–', '-'))) {
			return trim(mb_substr($value, 0, $length - 1)) . '...';
		} else {
			return trim(mb_substr($value, 0, $length)) . '...';
		}
		return trim($value);
	}
}?>