<?php
function bmCheck($str, $search_str) {
    $length = strlen($str);
    $search_length = strlen($search_str);
    $complete = false;
    if (empty($str) || empty($search_str)) {
        return false;
    }
    if ($search_length > $length) {
        return false;
    }
    $search_str_place = 0;
    do {
        $check = true;
        $word_exist_place_bad = -1;
        $bad_word_place = 0;
        $good_word_place = 0;
        $word_exist_place_good = -1;
        $has_check_good = false;
        $has_check_bad = false;
        for ($i = ($search_str_place + $search_length - 1), $j = ($search_length - 1); $i >= $search_str_place; $i--, $j--) {
            //坏字符
            if ($search_str[$j] !== $str[$i] && $has_check_bad == false) {
                for ($k = ($search_str_place + $search_length - 1), $l = ($search_length - 1); $l >= 0; $l--) {
                    if ($search_str[$l] == $str[$k]) {
                        $word_exist_place_bad = $l;
                    }
                }
                $check = false;
                $bad_word_place = $j;
                $has_check_bad = true;
            }
            //好字符
            if ($search_str[$j] == $str[$i] && $has_check_good == false) {
                for ($k = ($search_str_place + $search_length - 1), $l = ($search_length - 1); $l >= 0; $l--) {
                    if ($search_str[$l] == $str[$k]) {
                        $word_exist_place_good = $l;
                    }
                }
                $good_word_place = $j;
                $has_check_good = true;
            }
            if ($has_check_bad == false && $has_check_good == false) {
                break;
            }
        }
        if ($search_str_place >= ($length - $search_length)) {
            $complete = true;
        }
        echo '循环：' . $count . '次' . PHP_EOL;
        echo 'search_str_place=' . $search_str_place . PHP_EOL;
        echo 'bad_word_place=' . $bad_word_place . PHP_EOL;
        echo 'good_word_place=' . $good_word_place . PHP_EOL;
        echo 'word_exist_place_bad=' . $word_exist_place_bad . PHP_EOL;
        echo 'word_exist_place_good=' . $word_exist_place_good . PHP_EOL;
        echo 'complete=' . ($complete ? 1 : 0) . PHP_EOL;
        echo 'check=' . ($check ? 1 : 0) . PHP_EOL;
        if ($complete == false && $check == false) {
            $search_str_place += max(($bad_word_place - $word_exist_place_bad), ($good_word_place - $word_exist_place_good));
        }
    } while ($complete == false && $check == false);
    if ($check == true) {
        echo sprintf('匹配位置在第%d位起', $search_str_place) . PHP_EOL;
        return null;
    } else {
        echo '未匹配' . PHP_EOL;
        return null;
    }
}
echo bmCheck($argv[1], $argv[2]);
