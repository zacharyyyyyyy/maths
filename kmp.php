<?php
function kmpCheck($str, $search_str) {
    $str_length = count($str);
    $search_str_length = count($search_str);
    if (empty($str) || empty($search_str) || ($search_str > $str_length)) {
        return false;
    }
    $next = [];
    $search_str_place = 0;
    $complete = false;
    $match = false;
    do {
        if (($search_str_place + $search_str_length) > $str_length) {
            break;
        }
        for ($i = 0,$j = $search_str_place; $i <= ($search_str_length - 1); $i++,$j++) {
            if($search_str[$i] == $str[$j]){
                continue ;
            }else{

            }
        }
    } while ($complete == false || $match == false);
    if ($match == false) {
        echo '未匹配';
    } else {
        echo '匹配位置起' . $search_str_length . '起';
    }
}
