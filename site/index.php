<<<<<<< HEAD
<?php session_start();?>
=======
>>>>>>> Brandon
<!DOCTYPE HTML>
<html>
    <head>
        <title>SQL Data, Lab 3</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <?php
            include_once'SQL_PDO.php';
<<<<<<< HEAD
            $sort = $price = $healthy = $ascend = "";
            
            // CLEAN UP INCOMING DATA IF NECESSARY
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $sortTmp = $_POST["sort"];
=======
            $sort = $price = $healthy = "";
            
            // CLEAN UP INCOMING DATA IF NECESSARY
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $sortTmp = ($_POST["sort"]);
>>>>>>> Brandon
                $priceTmp = $_POST["price"];
                $healthyTmp = $_POST["healthy"];
                $lowCal = $_POST["lowCal"];
                $fullMeal = $_POST["fullMeal"];
<<<<<<< HEAD
                $ascend = $_POST['ascend'];
=======
>>>>>>> Brandon
                
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
<<<<<<< HEAD
=======
                
>>>>>>> Brandon
                if(!strcmp($lowCal, 'set')){
                    $lowCal = 'set';
                }
                else{$lowCal = "";}
                
                if(!strcmp($fullMeal, 'set')){
                    $fullMeal = 'set';
                }
                else{$fullMeal = "";}
                
<<<<<<< HEAD
=======
                
>>>>>>> Brandon
            }
            
            if($flag){
                echo '
                <h1>OTTER EXPRESS MENU</h1>
                <table class="sortFilter">
                    <form method="POST" action="">
                    <tr>
                        <td>
<<<<<<< HEAD
=======
                        </td>
                        <td>
>>>>>>> Brandon
                            SORT BY:<br><br>
                            <input type="radio" name="sort" value="productName"'.(!strcmp($sort,"productName")?'checked':'').'>Name
                            <br>
                            <input type="radio" name="sort" value="price"'.(!strcmp($sort,"price")?'checked':'').'>Price
                            <br>
                            <input type="radio" name="sort" value="TypeDesc"'.(((strcmp($sort,'productName'))&&(strcmp($sort,'price')))?'checked':'').'>Type
<<<<<<< HEAD
                            <br><br>
                            ORDER BY: <select name="ascend" size=1>
                            <option value= "ASC" '.(!strcmp($ascend,"ASC")?'selected':'').'> ASC</option>
                            <option value="DESC" '.(!strcmp($ascend,"DESC")?'selected':'').'> DESC</option>
                            </select>
                        </td>
                        <td>
                            <fieldset>
                                <legend>Filter By:</legend>
                                Max Price: $<input type="text" name="price" style="width:50px" value='.($price?$price:'').'>
                                <br><br>
=======
                        </td>
                        <td>
                            FILTER BY:<br><br>
                            Max Price: $<input type="text" name="price" style="width:50px" value='.($price?$price:'').'>
                            <br><br>
                            <fieldset>
                                <legend>Filter By:</legend>
>>>>>>> Brandon
                                Healthy Choice: <input type="checkbox" name="healthy" value="set" '.(!strcmp($healthyTmp, 'set')?'checked':'').'><br>
                                Low Calorie Choice: <input type="checkbox" name="lowCal" value="set" '.(!strcmp($lowCal, 'set')?'checked':'').'><br>
                                Full Meal Choice: <input type="checkbox" name="fullMeal" value="set" '.(!strcmp($fullMeal, 'set')?'checked':'').'>
                            </fieldset>
<<<<<<< HEAD
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
                $stmt = "select * from Products natural join ProductType natural join Producer order by price";
                $id = $name = $description = $cost = $calories = $health = $productID = "";
                if($_SERVER["REQUEST_METHOD"] == "POST"){
                    $stmt = "select * from Products natural join ProductType natural join Producer";
                    $flag = false;
                    // TODO - FILTER BASED ON SIMPLE CHECKBOX
=======
                            
                        </td>
                        <td>
                            <input type="submit" value="SORT THE MENU">
                        </td>
                    </tr>
                    </form>
                </table>';
                $stmt = "select * from Products natural join ProductType order by price";
                $id = $name = $description = $cost = $calories = $health = $productID = "";
                if($_SERVER["REQUEST_METHOD"] == "POST"){
                    $stmt = "select * from Products natural join ProductType";
                    $flag = false;
>>>>>>> Brandon
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
                            $flag = true;
                        }
                    }
                    if(!empty($lowCal)){
                        if($flag){
<<<<<<< HEAD
                            $stmt = $stmt." AND calories <= 200";
                        }
                        else{
                            $stmt = $stmt." WHERE calories <= 200";
=======
                            $stmt = $stmt." AND calories < 151";
                        }
                        else{
                            $stmt = $stmt." WHERE calories < 151";
>>>>>>> Brandon
                            $flag = true;
                        }
                    }
                    if(!empty($fullMeal)){
                        if($flag){
                            $stmt = $stmt." AND TypeID=10300";
                        }
                        else{
                            $stmt = $stmt." WHERE TypeID=10300";
                        }
                    }
<<<<<<< HEAD
                    if(!empty($sort)&& $_POST["orderby"] == "ASC"){
                        $stmt = $stmt." ORDER BY ".$sort;
                         $stmt = $stmt. " ASC";
                    }
                    else{
                         $stmt = $stmt." ORDER BY ".$sort;
                        $stmt = $stmt. " DESC";
=======
                    if(!empty($sort)){
                        $stmt = $stmt." ORDER BY ".$sort;
>>>>>>> Brandon
                    }
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
<<<<<<< HEAD
                            <td>
                                Producer
                            </td>
                            <td>
                                Buy It
                            </td>
=======
>>>>>>> Brandon
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
<<<<<<< HEAD
                        echo '<td class="info">'.$product['producerName'].'</td>';
                        echo '<td class="info"><form method="POST" action="cart.php"><input type="submit" name="'.$product['productID'].'" value="Add to Cart"></form></td>';
=======
                    
>>>>>>> Brandon
                    echo '</tr>';
                }
                echo '</table>';
            }else{echo '<h1>NO CONNECTION!</h1>';}
        ?>
    </body>
</html>