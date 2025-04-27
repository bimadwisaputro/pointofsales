<?php

namespace App\Helpers;

class RoleHelper
{

    function gettotal($total, $totalcompare, $tipe)
    {
        $checkorder = $total - $totalcompare;
        if ($checkorder < 0) {
            $selisihorder = $checkorder * -1;
            if ($total == 0) {
                if ($tipe == 'orders') {
                    $return['label'] = "-";
                } else if ($tipe == 'pickups') {
                    $return['label'] = "-";
                } else if ($tipe == 'customers') {
                    $return['label'] = "active";
                }
                $return['color'] = "success";
            } else {
                if ($tipe == 'orders') {
                    $return['label'] = "decrease";
                } else if ($tipe == 'pickups') {
                    $return['label'] = "decrease";
                } else if ($tipe == 'customers') {
                    $return['label'] = "active";
                }
                $return['color'] = "danger";
            }
        } else {
            $selisihorder = $checkorder;
            if ($tipe == 'orders') {
                $return['label'] = "increase";
            } else if ($tipe == 'pickups') {
                $return['label'] = "increase";
            } else if ($tipe == 'customers') {
                $return['label'] = "active";
            }
            $return['color'] = "success";
        }
        if ($total == 0) {
            $return['percent'] = 0;
        } else {
            $val = ((($selisihorder) / $total) * 100);
            if (is_numeric($val) && floor($val) != $val) {
                $return['percent'] = number_format($val, 2, '.', '');
            } else {
                $return['percent'] =  $val;
            }
        }
        //die('((' . $selisihorder . ') / ' . $total . ') * 100');
        return $return;
    }

    function get_notactive($total, $totalcompare, $tipe)
    {

        if ($totalcompare == 0) {
            $return['label'] = "all active";
            $return['color'] = "success";
            $return['percent'] = "";
        } else {
            $return['label'] = "not active";
            $return['color'] = "danger";
            $return['percent'] = $totalcompare;
        }
        //die('((' . $selisihorder . ') / ' . $total . ') * 100');
        return $return;
    }
}
