<?php

$cableQty=$_GET['cableQty'];
$chargerQty=$_GET['chargerQty'];
$switchQty=$_GET['swichQty'];

$cablePrice=300;
$chargerPrice=600;
$switchPrice=900;

echo "
    <table>
            <tr>
                <th>Item</th>
                <th>Price</th>
                <th>Quantity</th>
            </tr>
";

if($cableQty>0){
    echo "
            <tr>
                <td>Cable</td>
                <td>300</td>
                <td>$cableQty</td>
            </tr>
    ";
}
if($chargerQty>0){
    echo "
            <tr>
                <td>Charger</td>
                <td>600</td>
                <td>$chargerQty</td>
            </tr>
    ";
}
if($switchQty>0){
    echo "
            <tr>
                <td>switch</td>
                <td>900</td>
                <td>$switchQty</td>
            </tr>
    ";
}
echo "</table>";

?>