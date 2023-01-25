<?php
    require_once("autoload.php");

    $pages = array("details");
    $page = isset($_GET["view"]) && in_array($_GET["view"],$pages)?$_GET["view"]:0;

    $items = new MYSQLHandler("items");
    $first_record = ((isset($_GET["start"]) && is_numeric($_GET["start"]) && $_GET["start"]>=0))?$_GET["start"]:5;
    $common = "index.php?view=index.php&start=";
    $next = ($first_record + NUMBER_OF_RECORDS)<20?$first_record + NUMBER_OF_RECORDS:20;
    $next = $common.$next;

    $prev = ($first_record-NUMBER_OF_RECORDS)>= 5?$first_record-NUMBER_OF_RECORDS:5;
    $prev = $common.$prev;
    $columns = array("id,product_name");
    $glasses = $items->get_data($columns,$first_record);
    echo"<table>
            <thead>
                <tr>
                    <th>Item ID</th>
                    <th>Name</th>
                    <th>Details</th>
                </tr>
            </thead>
            <tbody>";
    foreach ($glasses as $glass) {
        foreach ($glass as $item) {
            echo"
            
                <tr>
                    <td>$item[0]</td>
                    <td>$item[1]</td>
                    <td><a href='views/details.php?view=details.php&id=$item[0]'>more</a></td>
                </tr>";
        }      
    }

    echo"</tbody>
        </table>";


    echo "<br> <a href='$prev'>Previous</a> | <a href='$next'>Next</a>";

    if ($page === "details")
        require_once("details.php");
    else
        require_once("index.php");

   $items->disconnect();