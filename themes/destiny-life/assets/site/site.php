<?php
// ************************************************************************************//
// * User Control Panel ( UCP )
// ************************************************************************************//
// * Author: DerStr1k3r
// ************************************************************************************//
// * Version: 1.0
// * 
// * Copyright (c) 2020 DerStr1k3r. All rights reserved.
// ************************************************************************************//
// * License Typ: Creative Commons licenses
// ************************************************************************************//
  ob_start ("ob_gzhandler");
  ob_start("compress");
  header("Content-type: text/css;charset: UTF-8");
  header("Cache-Control: must-revalidate");
  $offset = 60 * 60 ;
  $ExpStr = "Expires: " . gmdate("D, d M Y H:i:s",time() + $offset) . " GMT";
  header($ExpStr);
  function compress($buffer) {
    $buffer = preg_replace('!/\*[^*]*\*+([^/][^*]*\*+)*/!', '', $buffer);
    $buffer = str_replace(array("\r\n","\r","\n","\t",'  ','    ','    '),'',$buffer);
    $buffer = str_replace('{ ', '{', $buffer);
    $buffer = str_replace(' }', '}', $buffer);
    $buffer = str_replace('; ', ';', $buffer);
    $buffer = str_replace(', ', ',', $buffer);
    $buffer = str_replace(' {', '{', $buffer);
    $buffer = str_replace('} ', '}', $buffer);
    $buffer = str_replace(': ', ':', $buffer);
    $buffer = str_replace(' ,', ',', $buffer);
    $buffer = str_replace(' ;', ';', $buffer);
    $buffer = str_replace(';}', '}', $buffer);
    return $buffer;
  }
?>

.tim-row {
  margin-bottom: 20px;
}

.tim-white-buttons {
  background-color: #777777;
}

.typography-line {
  padding-left: 25%;
  margin-bottom: 35px;
  position: relative;
  display: block;
  width: 100%;
}

.typography-line span {
  bottom: 10px;
  color: #c0c1c2;
  display: block;
  font-weight: 400;
  font-size: 13px;
  line-height: 13px;
  left: 0;
  position: absolute;
  width: 260px;
  text-transform: none;
}

.tim-row {
  padding-top: 60px;
}

.tim-row h3 {
  margin-top: 0;
}

.offline-doc .page-header {
  display: flex;
  align-items: center;
}

.offline-doc .footer {
  position: absolute;
  width: 100%;
  background: transparent;
  bottom: 0;
  color: #fff;
  z-index: 1;
}

@media all and (min-width: 992px) {
  .sidebar .nav>li.active-pro {
    position: absolute;
    width: 100%;
    bottom: 10px;
  }
}

.card.card-upgrade .card-category {
  max-width: 530px;
  margin: 0 auto;
}