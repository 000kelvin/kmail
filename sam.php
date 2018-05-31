<?php
/**
 * Created by PhpStorm.
 * User: Adewale Toluwani
 * Date: 21/11/2017
 * Time: 01:03 PM
 */
    $pyscript = 'task_1_1.py';
    $python = 'C:\python27\pythons.exe';

    $cmd = '$pyscript $python';
    $python = `python task_1_1.py`;
    echo $python;

    exec($cmd, $output);
//    $act = system('python first.py', $retval);

   print_r($output);
//    print_r($retval);
