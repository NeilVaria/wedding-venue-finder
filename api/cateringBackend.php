<?php
//collecting values from html file 
$min = ($_REQUEST["min"]);
$max = ($_REQUEST["max"]);
$c1 = ($_REQUEST["c1"]);
$c2 = ($_REQUEST["c2"]);
$c3 = ($_REQUEST["c3"]);
$c4 = ($_REQUEST["c4"]);
$c5 = ($_REQUEST["c5"]);

//create table using the values from the file
echo "<table border='1' width='300' cellspacing ='0'>";

echo "<tr>";
echo "<td>cost per person → <br>
↓ party size</td>";
echo "<td>$c1</td>";
echo "<td>$c2</td>";
echo "<td>$c3</td>";
echo "<td>$c4</td>";
echo "<td>$c5</td>";
echo "</tr>";

for ($x = $min; $x <= $max; $x+=5) {
    echo "<tr>";
    echo "<td> $x </td>";
    echo "<td>" .$x*$c1. "</td>";
    echo "<td>" .$x*$c2. "</td>";
    echo "<td>" .$x*$c3. "</td>";
    echo "<td>" .$x*$c4. "</td>";
    echo "<td>" .$x*$c5. "</td>";
    echo "</tr>";
}

echo "</table>";
