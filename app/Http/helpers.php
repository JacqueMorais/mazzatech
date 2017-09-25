<?php

class helpers
{
	public static function date_format($date, $formart)
	{
		$date = new DateTime($date);

		if($formart == 'horas') {
			return date_format($date, 'H:i');
		} elseif ($formart == 'data') {
			return date_format($date, 'd/m/Y');
		} elseif ($formart == 'birth') {
			return date_format($date, 'd/m');
		} elseif ($formart == 'completa') {
			return  date_format($date, 'd/m/Y').' às '.date_format($date, 'H:i');
		} elseif($formart == 'hash') {
			return date_format($date, 'Ymdhi');
		}
	}

	public static function dateBrToEn($date)
	{
		if($date == ""){
			return null;
		}

		if(strlen($date) == 10){
			$date = date_create_from_format('d/m/Y', $date)->format('Y-m-d');
		}

		return $date;
	}

}
