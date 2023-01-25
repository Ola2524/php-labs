<?php 
    require_once("../config.php");
    require_once("../Models/DbHandler.php");
    require_once("../Models/MYSQLHandler.php");
    $item_id = (isset($_GET["id"]) && is_numeric($_GET["id"]))?$_GET["id"]:0;
    $items = new MYSQLHandler("items");
    $columns = array("*");
    $item = $items->get_record_by_id($item_id);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <p style="text-align: center;">Type:<?php echo $item["product_name"];?></p>
    <table border="2" style="margin: auto">
        <thead>
            <th>Type:<?php echo $item["product_name"];?></th>
            <th>Price:<?php echo $item["list_price"];?></th>
        </thead>
        <tbody>
            <td>
                <b>Details</b><br>
                code:<?php echo $item["PRODUCT_code"];?><br>
                item id:<?php echo $item["id"];?><br>
                rating:<?php echo $item["Rating"];?>
            </td>
            <td><img src="../images/<?php echo $item["Photo"];?>" alt=""></td>
        </tbody>
    </table>
</body>
</html>