<?php
require "cluster_analyser.php";
$points = array(5,147,83,15,0,28,0.223,50);
$val = algo("DiabetesDiagnosis",$points,8,20,1);
echo $val;
?>