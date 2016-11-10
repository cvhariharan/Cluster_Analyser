<?php
require "cluster_analyser.php";
$test = explode("\n",file_get_contents("testdata.csv"));

for($i=0;$i<count($test);$i++)
{
	$testdata[$i] = explode(",",$test[$i]);
}
$point = Array();
$m=0;
for($i=0;$i<count($testdata);$i++)
{
	$dis = $testdata[$i][8];
unset($testdata[$i][8]);
$val = algo("DiabetesDiagnosis",$testdata[$i],8,20,0);
if($val==$dis)
	$m++;
}
$t=count($testdata);
$c = ($m/$t)*100;
$w = $t-$m;
echo "Correct: $m<br>Wrong: $w<br>Accuracy: $c<br>"
?>
