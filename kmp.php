<?php
function kmpCheck($str, $search_str) {
    $str_length = strlen($str);
    $search_str_length = strlen($search_str);
    if (empty($str) || empty($search_str) || ($search_str > $str_length)) {
        return false;
    }
    $next = [];
    $next[0] = -1;
    $search_str_place = 0;
    $str_place = 0;
    $complete = false;
    $match = false;
    $k = 0;
    $l = -1;
    while ($k < $search_str_length - 1) {
        if ($l == -1 || $search_str[$k] == $search_str[$l]) {
            $k++;
            $l++;
            $next[$k] = $l;
        } else {
            $l = $next[$l];
        }
    }
    $count = 0;
    do {
        $count++;
        if ($str[$str_place] == $search_str[$search_str_place]) {
            $str_place++;
            $search_str_place++;
        } else {
            if ($next[$search_str_place] == -1) {
                $str_place++;
                $search_str_place = 0;
            } else {
                $search_str_place = $next[$search_str_place];
            }
        }
        if ($str_place >= ($str_length)) {
            $complete = true;
        }
        if ($search_str_place >= ($search_str_length)) {
            $match = true;
        }
        if ($count > 20) {
            break;
        }
    } while ($complete == false && $match == false);
    if ($match == false) {
        echo '未匹配';
    } else {
        echo '匹配检测字符串位置第' . ($str_place - $search_str_place) . '起';
    }
}
echo kmpCheck($argv[1], $argv[2]);
