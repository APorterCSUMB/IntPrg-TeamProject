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
            if(array_search ('Empty Cart', $_POST)){
                unset($_SESSION['cart']);
                header( 'Location: ./index.php') ;
                return;
            }
            // CLEAN UP INCOMING DATA IF NECESSARY
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                
            }
            echo'
            <h1>OTTER EXPRESS MENU</h1>
            <table class="sortFilter">
            <tr>
            <td>
            <form method="GET" action="index.php" style="text-align:center;margin:20px;"><input type="submit" value="Back To Menu"></form>
            </td>
            <td>
            <form method="POST" action="cart.php" style="text-align:center;margin:20px;"><input type="submit" name="true" value="Empty Cart"></form>
            </td>
            </tr>
            </table>
            ';
            if($flag){ // DB CONNECTION IS MANDATORY
                if($_SERVER["REQUEST_METHOD"] == "POST"){
                    $stmt = "SELECT * FROM Products NATURAL JOIN ProductType WHERE productID=".array_search ('Add to Cart', $_POST);
                    $stmt = $sql->prepare($stmt);
                    $flag = $stmt->execute();
                    if(!isset($_SESSION['cart'])){
                        $_SESSION['cart'] = Array();
                    }
                    $_SESSION['cart'][]=$stmt->fetch();
                }
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
                        </tr>
                
                ';
                $price = 0.00;
                $count = 0;
                if(isset($_SESSION['cart'])){
                    foreach($_SESSION['cart'] as $product){
                        $price += $product['price'];
                        $count++;
                        echo '<tr class="product">';
                            echo'<td class="info">'.$product['productName'].'</td>
                            <td class="info desc"><div class="clicker" tabindex="1">Description</div><div class="hiddendiv">'.$product['productDesc'].'</div></td>
                            <td class="info">'.money_format('$%.2n', $product['price']).'</td>
                            <td class="info">'.$product['calories'].'</td>';
                            if($product['healthyChoice']){
                                echo '<td class="info"><img src="happy.png"></td>';
                            } else{echo '<td class="info"><img src="sad.png"></td>';}
                            echo '<td class="info">'.$product['TypeDesc'].'</td>';
                        echo '</tr>';
                    }
                }
                echo '
                </table>
                <table>
                    <tr>
                        <td>
                            Items in Basket: '.$count.'
                        </td>
                        <td>
                            Cost of Basket: '.$price.'
                        </td>
                    </tr>
                </table>';
            }else{echo '<h1>NO CONNECTION!</h1>';}
        ?>
    </body>
</html>