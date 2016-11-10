<?php
//Developed by C.V.Hariharan
//$file: Name of the labelled data in csv without the csv extension.
//$point: The point to be categorised.
//$element: Index of the label element in the labelled data array. The default value is the number of elements in points array.
//$num: Number of values to be printed. Increasing this can increase the accuracy significantly.
function algo($file,$points,$element,$num,$show)
{
	if(!isset($elements))
$element = count($points);
error_reporting(0);
$data = file_get_contents("$file.csv");
$lines = explode("\n",$data);
array_splice($lines,0,1);
//print_r($lines);
$blank =array_search("",$lines);
unset($lines[$blank]);
for($i=0;$i<count($lines);$i++)
{
	$acc[$i] = explode(",",$lines[$i]);//Array of arrays containing each table data for each row.
}
$m=0;
for($i=0;$i<count($lines);$i++)
{   
    $da=0;
	for($j=0;$j<count($points);$j++)
	$da = $da + abs($acc[$i][$j]-$points[$j]); //The more important parameter can be multiplied with a number to make it influence the results more.
	$fl = $acc[$i][$element]; //Label
	if(!in_array($fl,$vals))
	{
		$vals[$m] = $fl; //Array of all detected labels
		$m++;
	}
	$diffs[$i]["dist"] = $da;
	$diffs[$i]["val"] = $fl;
}
//print_r($vals); //Detected Labels
array_multisort($diffs); //Array Multisort function sorts a multidimensional array based on the first values of arrays within them.
echo "<pre>";
$tally = array_fill(0,count($val),0);
for($i=0;$i<$num;$i++)
{
	//print_r($diffs[$i]); 
	for($j=0;$j<count($vals);$j++)
	{
	if($diffs[$i]["val"]==$vals[$j])
	{
		$tally["$vals[$j]"]=$tally["$vals[$j]"]+1;
	}
	}
}
$i=0;
if(isset($show) && $show==1)
	echo "<h3>Prediction</h3>";
$g = 0.0;
for($i=0;$i<count($vals);$i++)
{
	$tally["$vals[$i]"]=($tally["$vals[$i]"]/$num)*100;
	if($tally["$vals[$i]"]>$g)
	{
		$g = $tally["$vals[$i]"];
		$gval=$vals[$i];
	}
	if(isset($show) && $show==1)
	echo "$vals[$i]: ".$tally["$vals[$i]"]."%<br>";
}

//print_r($tally);
echo "</pre>";
return $gval; //Final outcome irrespective of the percentage.
}

?>