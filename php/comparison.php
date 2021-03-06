<!-- 
    #######################################################
    FILENAME: comparison.php
    OVERVIEW: PHP for 5 cloest neighborhood
    PURPOSE: Passes db info to closest.php for closest ratio.
    #######################################################
-->
<!-- PHP FOR NORM COMP -->
<?php include "graph.php" ?>
<?php
  $connection = mysqli_connect($DBservername, $DBusername, $DBpassword);
  @mysqli_select_db($connection, $DBname);
//NORMAL COMP AVG
$neighborq = "SELECT N1, N2, N3, N4, N5 FROM Houses WHERE House = '".$house."'";
$fetchneighbor = mysqli_query($connection, $neighborq);
$row = mysqli_fetch_row($fetchneighbor);
			   
	$N1ID = $row[0];
	$N2ID = $row[1];
	$N3ID = $row[2];
	$N4ID = $row[3];
	$N5ID = $row[4];
	
	$_SESSION["N1"] = $N1ID;
    $_SESSION["N2"] = $N2ID;
    $_SESSION["N3"] = $N3ID;
    $_SESSION["N4"] = $N4ID;
    $_SESSION["N5"] = $N5ID;
	
$neighbor1add = "SELECT Address FROM Houses WHERE House = '".$N1ID."'";
$fetchneighbor1 = mysqli_query($connection, $neighbor1add);
$row1 = mysqli_fetch_row($fetchneighbor1);
$N1add = $row1[0];

$neighbor2add = "SELECT Address FROM Houses WHERE House = '".$N2ID."'";
$fetchneighbor2 = mysqli_query($connection, $neighbor2add);
$row2 = mysqli_fetch_row($fetchneighbor2);
$N2add = $row2[0];

$neighbor3add = "SELECT Address FROM Houses WHERE House = '".$N3ID."'";
$fetchneighbor3 = mysqli_query($connection, $neighbor3add);
$row3 = mysqli_fetch_row($fetchneighbor3);
$N3add = $row3[0];

$neighbor4add = "SELECT Address FROM Houses WHERE House = '".$N4ID."'";
$fetchneighbor4 = mysqli_query($connection, $neighbor4add);
$row4 = mysqli_fetch_row($fetchneighbor4);
$N4add = $row4[0];

$neighbor5add = "SELECT Address FROM Houses WHERE House = '".$N5ID."'";
$fetchneighbor5 = mysqli_query($connection, $neighbor5add);
$row5 = mysqli_fetch_row($fetchneighbor5);
$N5add = $row5[0];

//ADDRESS
$_SESSION["N1add"] = $N1add;
$_SESSION["N2add"] = $N2add;
$_SESSION["N3add"] = $N3add;
$_SESSION["N4add"] = $N4add;
$_SESSION["N5add"] = $N5add;
/*
 while ($query_data = mysqli_fetch_row($fetchneighbor)){
    $N1ID = (int)$query_data[0];
    $N2ID = (int)$query_data[1];
    $N3ID = (int)$query_data[2];
    $N4ID = (int)$query_data[3];
    $N5ID = (int)$query_data[4];

    $_SESSION["N1"] = $N1ID;
    $_SESSION["N2"] = $N2ID;
    $_SESSION["N3"] = $N3ID;
    $_SESSION["N4"] = $N4ID;
    $_SESSION["N5"] = $N5ID;
 }
*/
 $comparison = "SELECT (
                  SELECT SUM( BinWeight )
                  FROM Weights
                  WHERE (
                        Wk = (
                              SELECT Wk
                              FROM Weights
                              ORDER BY Wk DESC
                              LIMIT 1 )
                        AND BinID = '$bin1'
                        )
                      ) /
                      (
                  SELECT SUM( BinWeight )
                  FROM Weights
                  WHERE (
                        Wk = (
                              SELECT Wk
                              FROM Weights
                              ORDER BY Wk DESC
                              LIMIT 1 )
                        AND BinID = '$bin1' )
                        OR (
                            Wk = (
                                  SELECT Wk
                                  FROM Weights
                                  ORDER BY Wk DESC
                                  LIMIT 1 )
                            AND BinID = '$bin2'
                            )
                        )AS Comparison";

    $housecomp = mysqli_query($connection, $comparison);
    $housecomprow = mysqli_fetch_row($housecomp);
    $housecomparison = $housecomprow[0];
	if($housecomparison == 1){
		$housecompare = 0;
	}
	else{
		$housecompare = $housecomparison*100;
		}
	//$housecompare = number_format($housecompare,0);
    $housecompare = floor($housecompare);//We were off by 1% probably though rounding


    $_SESSION["HouseCompare"] = $housecompare;


          $getN5Bins = "SELECT Bin
                      FROM Bins
                      WHERE HouseID = (
                        SELECT House
                        FROM Houses
                        WHERE House = '$N5ID')";

           $fetchN5Bins = mysqli_query($connection, $getN5Bins);
           $n5BinArray = Array();
           while($row = mysqli_fetch_array($fetchN5Bins)){
               $n5BinArray[] = $row[0];
           }

           $n5Bin1 = $n5BinArray[0];
           $n5Bin2 = $n5BinArray[1];



$getN5Value = "SELECT (

SELECT SUM( BinWeight )
FROM Weights
WHERE (
Wk = (
SELECT Wk
FROM Weights
ORDER BY Wk DESC
LIMIT 1 )
AND BinID = '$n5Bin1'
)
) / (
SELECT SUM( BinWeight )
FROM Weights
WHERE (
Wk = (
SELECT Wk
FROM Weights
ORDER BY Wk DESC
LIMIT 1 )
AND BinID ='$n5Bin1' )
OR (
Wk = (
SELECT Wk
FROM Weights
ORDER BY Wk DESC
LIMIT 1 )
AND BinID = '$n5Bin2'
)
)AS Comparison";

$n5comp = mysqli_query($connection, $getN5Value);
   $n5comprow = mysqli_fetch_row($n5comp);
   $n5comparison = $n5comprow[0];

   $_SESSION["N5Compare"] = $n5comparison;

$getN4Bins = "SELECT Bin
                      FROM Bins
                      WHERE HouseID = (
                        SELECT House
                        FROM Houses
                        WHERE House ='$N4ID')";

           $fetchN4Bins = mysqli_query($connection, $getN4Bins);
           $n4BinArray = Array();
           while($row = mysqli_fetch_array($fetchN4Bins)){
               $n4BinArray[] = $row[0];
           }

           $n4Bin1 = $n4BinArray[0];
           $n4Bin2 = $n4BinArray[1];


$getN4Value = "SELECT (

SELECT SUM( BinWeight )
FROM Weights
WHERE (
Wk = (
SELECT Wk
FROM Weights
ORDER BY Wk DESC
LIMIT 1 )
AND BinID = '$n4Bin1'
)
) / (
SELECT SUM( BinWeight )
FROM Weights
WHERE (
Wk = (
SELECT Wk
FROM Weights
ORDER BY Wk DESC
LIMIT 1 )
AND BinID ='$n4Bin1' )
OR (
Wk = (
SELECT Wk
FROM Weights
ORDER BY Wk DESC
LIMIT 1 )
AND BinID = '$n4Bin2'
)
)AS Comparison";

$n4comp = mysqli_query($connection, $getN4Value);
   $n4comprow = mysqli_fetch_row($n4comp);
   $n4comparison = $n4comprow[0];

   $_SESSION["N4Compare"] = $n4comparison;


$getN3Bins = "SELECT Bin
                      FROM Bins
                      WHERE HouseID = (
                        SELECT House
                        FROM Houses
                        WHERE House ='$N3ID')";

           $fetchN3Bins = mysqli_query($connection, $getN3Bins);
           $n3BinArray = Array();
           while($row = mysqli_fetch_array($fetchN3Bins)){
               $n3BinArray[] = $row[0];
           }

           $n3Bin1 = $n3BinArray[0];
           $n3Bin2 = $n3BinArray[1];

$getN3Value = "SELECT (

SELECT SUM( BinWeight )
FROM Weights
WHERE (
Wk = (
SELECT Wk
FROM Weights
ORDER BY Wk DESC
LIMIT 1 )
AND BinID = '$n3Bin1'
)
) / (
SELECT SUM( BinWeight )
FROM Weights
WHERE (
Wk = (
SELECT Wk
FROM Weights
ORDER BY Wk DESC
LIMIT 1 )
AND BinID ='$n3Bin1' )
OR (
Wk = (
SELECT Wk
FROM Weights
ORDER BY Wk DESC
LIMIT 1 )
AND BinID = '$n3Bin2'
)
)AS Comparison";

    $n3comp = mysqli_query($connection, $getN3Value);
    $n3comprow = mysqli_fetch_row($n3comp);
    $n3comparison = $n3comprow[0];
    $_SESSION["N3Compare"] = $n3comparison;


$getN2Bins = "SELECT Bin
                      FROM Bins
                      WHERE HouseID = (
                        SELECT House
                        FROM Houses
                        WHERE House ='$N2ID')";

           $fetchN2Bins = mysqli_query($connection, $getN2Bins);
           $n2BinArray = Array();
           while($row = mysqli_fetch_array($fetchN2Bins)){
               $n2BinArray[] = $row[0];
           }

           $n2Bin1 = $n2BinArray[0];
           $n2Bin2 = $n2BinArray[1];

$getN2Value = "SELECT (

SELECT SUM( BinWeight )
FROM Weights
WHERE (
Wk = (
SELECT Wk
FROM Weights
ORDER BY Wk DESC
LIMIT 1 )
AND BinID = '$n2Bin1'
)
) / (
SELECT SUM( BinWeight )
FROM Weights
WHERE (
Wk = (
SELECT Wk
FROM Weights
ORDER BY Wk DESC
LIMIT 1 )
AND BinID ='$n2Bin1' )
OR (
Wk = (
SELECT Wk
FROM Weights
ORDER BY Wk DESC
LIMIT 1 )
AND BinID = '$n2Bin2'
)
)AS Comparison";

$n2comp = mysqli_query($connection, $getN2Value);
   $n2comprow = mysqli_fetch_row($n2comp);
   $n2comparison = $n2comprow[0];

   $_SESSION["N2Compare"] = $n2comparison;


$getN1Bins = "SELECT Bin
                      FROM Bins
                      WHERE HouseID = (
                        SELECT House
                        FROM Houses
                        WHERE House ='$N1ID')";

           $fetchN1Bins = mysqli_query($connection, $getN1Bins);
           $n1BinArray = Array();
           while($row = mysqli_fetch_array($fetchN1Bins)){
               $n1BinArray[] = $row[0];
           }

           $n1Bin1 = $n1BinArray[0];
           $n1Bin2 = $n1BinArray[1];

$getN1Value = "SELECT (

SELECT SUM( BinWeight )
FROM Weights
WHERE (
Wk = (
SELECT Wk
FROM Weights
ORDER BY Wk DESC
LIMIT 1 )
AND BinID = '$n1Bin1'
)
) / (
SELECT SUM( BinWeight )
FROM Weights
WHERE (
Wk = (
SELECT Wk
FROM Weights
ORDER BY Wk DESC
LIMIT 1 )
AND BinID ='$n1Bin1' )
OR (
Wk = (
SELECT Wk
FROM Weights
ORDER BY Wk DESC
LIMIT 1 )
AND BinID = '$n1Bin2'
)
)AS Comparison";

   $n1comp = mysqli_query($connection, $getN1Value);
   $n1comprow = mysqli_fetch_row($n1comp);
   $n1comparison = $n1comprow[0];

   $neighborcomparison = (($n1comparison +  $n2comparison +  $n3comparison + $n4comparison + $n5comparison)/5) *100;
   $neighborcomparison = number_format($neighborcomparison,0);

   $_SESSION["NCompare"] = $neighborcomparison;
   $_SESSION["N1Compare"] = $n1comparison;
?>
