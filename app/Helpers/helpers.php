<?php

if (! function_exists('formatPrice')) {
    function formatPrice($price)
    {
        return 'Rp. '. number_format($price, 0, '', '.');
    }
}
