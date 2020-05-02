<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <style type="text/css">
		hr {
			height: 1px;
			overflow: hidden;
			font-size: 0;
			line-height: 0;
			background: #ccc;
			margin: 50px 0;
			border: 0;
		}

		/* css for calendar */
		.b-calendar {
			font: 14px/1.2 Arial, sans-serif;
			background: #f2f2f2;
		}
		.b-calendar--along {
			width: 300px;
			padding: 30px 40px;
			margin: 50px auto;
		}
		.b-calendar--many {
			padding: 20px;
			width: 250px;
			display: inline-block;
			vertical-align: top;
			margin: 0 20px 20px;
		}
		.b-calendar__title {
			text-align: center;
			margin: 0 0 20px;
		}
		.b-calendar__year {
			font-weight: bold;
			color: #333;
		}
		.b-calendar__tb {
			width: 100%;
		}
		.b-calendar__head {
			font: bold 14px/1.2 Arial, sans-serif;
			padding: 5px;
			text-align: left;
			border-bottom: 1px solid #c0c0c0;
		}
		.b-calendar__np {
			padding: 5px;
		}
		.b-calendar__day {
			font: 14px/1.2 Arial, sans-serif;
			padding: 8px 5px;
			text-align: left;
		}
		.b-calendar__weekend {
			color: red;
		}
	</style>
</head>
<body>
<?php

function draw_calendar($month, $year, $action = 'none') {
	$calendar = '<table cellpadding="0" cellspacing="0" class="b-calendar__tb">';
	
	$headings = array('Пн','Вт','Ср','Чт','Пт','Сб','Вс');
	$calendar.= '<tr class="b-calendar__row">';
	for($head_day = 0; $head_day <= 6; $head_day++) {
		$calendar.= '<th class="b-calendar__head';
		if ($head_day != 0) {
			if (($head_day % 5 == 0) || ($head_day % 6 == 0)) {
				$calendar .= ' b-calendar__weekend';
			}
		}
		$calendar .= '">';
		$calendar.= '<div class="b-calendar__number">'.$headings[$head_day].'</div>';
		$calendar.= '</th>';
	}
	$calendar.= '</tr>';

	$running_day = date('w',mktime(0,0,0,$month,1,$year));
	$running_day = $running_day - 1;
	if ($running_day == -1) {
		$running_day = 6;
	}
	
	$days_in_month = date('t',mktime(0,0,0,$month,1,$year));
	$day_counter = 0;
	$days_in_this_week = 1;
	$dates_array = array();
	
	$calendar.= '<tr class="b-calendar__row">';
	
	for ($x = 0; $x < $running_day; $x++) {
		$calendar.= '<td class="b-calendar__np"></td>';
		$days_in_this_week++;
	}
	
	for($list_day = 1; $list_day <= $days_in_month; $list_day++) {
		$calendar.= '<td class="b-calendar__day';

		if ($running_day != 0) {
			if (($running_day % 5 == 0) || ($running_day % 6 == 0)) {
				$calendar .= ' b-calendar__weekend';
			}
		}
		$calendar .= '">';

		$calendar.= '<div class="b-calendar__number">'.$list_day.'</div>';
		$calendar.= '</td>';

		if ($running_day == 6) {
			$calendar.= '</tr>';
			if (($day_counter + 1) != $days_in_month) {
				$calendar.= '<tr class="b-calendar__row">';
			}
			$running_day = -1;
			$days_in_this_week = 0;
		}

		$days_in_this_week++; 
		$running_day++; 
		$day_counter++;
	}

	if ($days_in_this_week < 8) {
		for($x = 1; $x <= (8 - $days_in_this_week); $x++) {
			$calendar.= '<td class="b-calendar__np"> </td>';
		}
	}
	$calendar.= '</tr>';
	$calendar.= '</table>';

	return $calendar;
}

?>
<div class="b-calendar b-calendar--along">
	<div class="b-calendar__title"><span class="b-calendar__month">Январь</span> <span class="b-calendar__year">'16</span></div>
	<?php
		echo draw_calendar(2,2016);
	?>
</div>
</body>
</html>