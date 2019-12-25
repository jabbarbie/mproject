<?php
/**
 * Untuk mengkonvert tanggal english ke indo
 * Butuh language 
 * 
 */

/**
 * @params : unix date.. misalnya 1575910800
 * dari strtotime($tanggal)
 */
function tanggalLengkap(int $unix)
{
    $tanggal = new DateTime('@'.$unix);
    return  lang('bahasa.'.$tanggal->format('D')).', '.
            $tanggal->format('d').' '.
            lang('bahasa.'.$tanggal->format('M')).' '.
            $tanggal->format('Y');
}

function bulansaja(int $unix)
{
    
}
?>