<?php
function array_to_csv($array) {
    if (count($array) == 0) {
        return null;
    }
    $lines = array();
    foreach ($array as $row) {
        $lines[] = implode(',', $row);
    }
    return implode("\n", $lines);
}

?>