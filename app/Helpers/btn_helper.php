<?php
/*
    @params : 
*/
function btnStatus(array $opsi):String
{
    return '<select data-id='.$opsi[3].' class="badge badge-'.$opsi[2].' border-0 px-3 status"><option value='.$opsi[0].'>'.$opsi[1].'</option></select>';
}
?>