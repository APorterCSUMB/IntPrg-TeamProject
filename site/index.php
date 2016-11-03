<?php session_start();?>
<!DOCTYPE HTML>
<html>
    <head>
        <title>SQL Data, Lab 3</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <?php
            include_once'SQL_PDO.php';
            $sort = $price = $healthy = "";
            
            // CLEAN UP INCOMING DATA IF NECESSARY
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $sortTmp = $_POST["sort"];
                $priceTmp = $_POST["price"];
                $healthyTmp = $_POST["healthy"];
                
                // ERROR BLOCK, ALL ERRORS SET CUSTOM ERROR MESSAGES
                // - SORT PARSING -
                if(empty($sortTmp)){
                    $sort = "";
                }
                else{$sort = $sortTmp;}
                // - PRICE PARSING -
                if(empty($priceTmp) || (!is_numeric($priceTmp))){
                    $price="";
                }
                else{$price = $priceTmp;}
                // - BIRTH ERRORS -
                if(!strcmp($healthyTmp, 'set')){
                    $healthy = 'set';
                }
                else{$healthy = "";}
                
                
            }
            
            if($flag){
                echo '
                <h1>OTTER EXPRESS MENU</h1>
                <table class="sortFilter">
                    <form method="POST" action="">
                    <tr>
                        <td>
                        <td>
                            SORT BY:<br><br>
                            <input type="radio" name="sort" value="productName"'.(!strcmp($sort,"productName")?'checked':'').'>Name
                            <br>
                            <input type="radio" name="sort" value="price"'.(!strcmp($sort,"price")?'checked':'').'>Price
                            <br>
                            <input type="radio" name="sort" value="TypeDesc"'.(((strcmp($sort,'productName'))&&(strcmp($sort,'price')))?'checked':'').'>Type
                        </td>
                        <td>
                            FILTER BY:<br><br>
                            Max Price: $<input type="text" name="price" style="width:50px" value='.($price?$price:'').'>
                            <br><br>
                            Healthy Choice: <input type="checkbox" name="healthy" value="set" '.(!strcmp($healthyTmp, 'set')?'checked':'').'>
                        </td>
                        <td>
                            <input type="submit" value="SORT THE MENU"></form>
                            <br><hr size=5 style="background-color:black;">
                            <form action="cart.php" method="GET"><input type="submit" value="VIEW CART"></form>
                            <hr size=2 style="background-color:black;width:66%;">
                            (# of Items: '.( isset( $_SESSION[ 'cart' ] ) ? sizeof( $_SESSION[ 'cart' ] ) : 0 ).')
                        </td>
                    </tr>
                </table>';
                $stmt = "select * from Products natural join ProductType order by price";
                $id = $name = $description = $cost = $calories = $health = $productID = "";
                if($_SERVER["REQUEST_METHOD"] == "POST"){
                    $stmt = "select * from Products natural join ProductType";
                    $flag = false;
                    // TODO - FILTER BASED ON SIMPLE CHECKBOX
                    if(!empty($price)){
                        $stmt = $stmt." WHERE price <= ".$price;
                        $flag = true;
                    }
                    if(!empty($healthy)){
                        if($flag){
                            $stmt = $stmt." AND healthyChoice=1";
                        }
                        else{
                            $stmt = $stmt." WHERE healthyChoice=1";
                        }
                    }
                    if(!empty($sort)){
                        $stmt = $stmt." ORDER BY ".$sort;
                    }
                    // TODO - SORT ASC OR DESC BASED ON RADIO BUTTON
                }
                $stmt = $sql->prepare($stmt);
                $flag = $stmt->execute();
                echo '<br><table class="displayTable">
                        <tr>
                            <td>
                                Item
                            </td>
                            <td>
                                Description
                            </td>
                            <td>
                                Price
                            </td>
                            <td>
                                Calories
                            </td>
                            <td>
                                Healthy
                            </td>
                            <td>
                                Type
                            </td>
                            <td>
                                Buy It
                            </td>
                        </tr>
                
                ';
                while($product = $stmt -> fetch()){
                    echo '<tr class="product">';
                        echo'<td class="info">'.$product['productName'].'</td>
                        <td class="info desc"><div class="clicker" tabindex="1">Description</div><div class="hiddendiv">'.$product['productDesc'].'</div></td>
                        <td class="info">'.money_format('$%.2n', $product['price']).'</td>
                        <td class="info">'.$product['calories'].'</td>';
                        if($product['healthyChoice']){
                            echo '<td class="info"><img src="happy.png"></td>';
                        } else{echo '<td class="info"><img src="sad.png"></td>';}
                        echo '<td class="info">'.$product['TypeDesc'].'</td>';
                        echo '<td class="info"><form method="POST" action="cart.php"><input type="submit" name="'.$product['productID'].'" value="Add to Cart"></form></td>';
                    echo '</tr>';
                }
                echo '</table>';
            }else{echo '<h1>NO CONNECTION!</h1>';}
        ?>
    </body>
</html>