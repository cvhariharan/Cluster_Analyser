
Using the cluster_analyser is very easy.
The training data should be labelled for training and it should be in csv format. 

## How To Use?
Include the "cluster_analyser.php" in your script and call the "algo" function.
```
<?php
require "cluster_analyser.php";
$testdata=array(4,5,1,2,3,4);
$val = algo("Trainingdata",$testdata,8,20,0);
echo $val; //Returns the class where the entered point has highest probability of belonging
?>
```

`algo(filename,point,label_index,neighbours,output)`
* filename- (String) Name of the file which has the labelled training data in csv format. Do not enter the extension. 
* point- (Array) The point whose class has to be evaluated. The number of elements in point must be equal to the number of parameters in the training dataset.
* label index- (Int) The position of label in the csv file. It is the column number starting from 0.
* neighbours- (Int) The number of points in the dataset to whom the distance from the point of interest should be calculated. Adjusting neighbours can alter the accuracy of the prediction.
* output- (Int) Can be either 1 or any integer. Setting it to 1 shows the percentages of the point belonging to each class. 
