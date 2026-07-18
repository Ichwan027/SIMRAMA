<?php

if (! function_exists('terbilang')) {

    function terbilang($angka)
    {
        $fmt = new NumberFormatter('id', NumberFormatter::SPELLOUT);

        return ucwords($fmt->format($angka));
    }

}