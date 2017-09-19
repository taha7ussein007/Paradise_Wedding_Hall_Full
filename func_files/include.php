<?php

function require_all_once(){
    ////////////////////////////////////////////////////////////////
    foreach (glob("../func_files/*.php") as $filename)
    {
        if($filename != '../func_files/logout.php' && $filename != '../func_files/closew.html')
        {
           require_once $filename;
        }
    }
    ////////////////////////////////////////////////////////////////
    foreach (glob("../func_classes/*.php") as $filename)
    {       
        require_once $filename;     
    }
    ////////////////////////////////////////////////////////////////
    foreach (glob("../pers_classes/*.php") as $filename)
    {
        require_once $filename;
    }
    ////////////////////////////////////////////////////////////////
}
