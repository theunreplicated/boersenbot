<?php
//require 'includes/validators.php';
//require './includes/errorHandler.php';
require './includes/NetConnection/netconnection.php';
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
//validator::__init(new ErrorHandler());
//validator::assertEquals('fsdfds','ds');
$net=  NetConnection::init();
echo $net->request('http://www.google.com');
?>
