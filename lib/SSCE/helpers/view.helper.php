<?php
namespace SSCE\H;

function date2ru($string, $bTime = false) {
    $aMonths    = array(1 => 'января', 'февраля', 'марта', 'апреля', 'мая', 'июня', 'июля', 'августа', 'сентября', 'октября', 'ноября', 'декабря');
    $iTime      = strtotime($string);
    return ($bTime?date('H:i', $iTime).', ':'').date('j ', $iTime).$aMonths[ (int)date('n', $iTime) ].' '.(int)date('Y', $iTime).'г.';
}

function getChapterIcon($chapter) {
	switch ($chapter) {
		case 'work':
			return 'fa fa-desktop';
		case 'travel':
			return 'fa fa-plane';
		case 'games':
			return 'fa fa-gamepad';
	}
}
