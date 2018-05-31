<?php

/**
 * Created by PhpStorm.
 * User: Adewale Toluwani
 * Date: 19/11/2017
 * Time: 01:09 AM
 */
class send_email extends pdo_dbconnections
{
    public $from = 'kelvinvip8@gmail.com';

    /**
     * @return string
     */
    public function email($subject, $msg)
    {
        $done = $this->select('subscribers', '*', NULL);
        foreach ($done as $done_send) {
            $e_mail = $done_send['email'];
//            $e_mail[] = $e_mail;

            $action = mail($e_mail, $subject, $msg, 'From:' . $this->from);
            if ($action) {
                echo '<b>Bulk action performed</b>';
            } else {
                echo '<b>Error</b> Could not successfully perform bulk action';
            }
        }
    }
}