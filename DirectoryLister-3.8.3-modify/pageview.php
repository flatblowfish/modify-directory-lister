<?php
// page view 计数
$pageview_file = "pageview.dat";
if(!file_exists($pageview_file)){
    $pv_counter = 0;
    $pvf = fopen($pageview_file,"w");
    fputs($pvf,'0');
    fclose($pvf);
} else{
    $pvf = fopen($pageview_file,"r");
    $pv_counter = trim(fgets($pvf));
    fclose($pvf);
}
$pv_counter = bcadd($pv_counter,1);
$pvf = fopen($pageview_file,"w");
fputs($pvf,$pv_counter);
fclose($pvf);