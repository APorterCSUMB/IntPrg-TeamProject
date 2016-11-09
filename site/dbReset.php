<!DOCTYPE HTML>
<html>
    <head>
        <title>SQL Data, Lab 3</title>
    </head>
    <body>
        <?php
            include_once'SQL_PDO.php';
            
            $products = Array();
            $products[] = Array('id'=>1002358879,'name'=>'Chicken Nuggets',
                                'desc'=>'Five of the best white-meat chicken nuggets you\'ve ever had!',
                                'cost'=>2.5,'cals'=>350,'hlth'=>0,'prdid'=>10100);
            $products[] = Array('id'=>1612476231,'name'=>'Taquitos',
                                'desc'=>'Three delicious beef taquitos that taste straight from the street corners of Mexico.',
                                'cost'=>3.25,'cals'=>450,'hlth'=>1,'prdid'=>10300);
            $products[] = Array('id'=>1764853125,'name'=>'Onion Rings',
                                'desc'=>'A small basket of our delicious, perfectly golden onion rings.',
                                'cost'=>3,'cals'=>350,'hlth'=>0,'prdid'=>10100);
            $products[] = Array('id'=>1248796582,'name'=>'Fries',
                                'desc'=>'A small basket of our delicious, perfectly golden french fries.',
                                'cost'=>2,'cals'=>300,'hlth'=>1,'prdid'=>10100);
            $products[] = Array('id'=>1574632891,'name'=>'Chocolate Milkshake',
                                'desc'=>'A small chocolate milkshake.',
                                'cost'=>2,'cals'=>250,'hlth'=>0,'prdid'=>10200);
            $products[] = Array('id'=>1578245689,'name'=>'Strawberry Milkshake',
                                'desc'=>'A small strawberry milkshake.',
                                'cost'=>2,'cals'=>250,'hlth'=>0,'prdid'=>10200);
            $products[] = Array('id'=>1678511235,'name'=>'Vanilla Milkshake',
                                'desc'=>'A small vanilla milkshake.',
                                'cost'=>2,'cals'=>250,'hlth'=>0,'prdid'=>10200);
            $products[] = Array('id'=>1223484687,'name'=>'Garlic Fries',
                                'desc'=>'A small basket of our delicious, perfectly seasoned garlic fries.',
                                'cost'=>3,'cals'=>350,'hlth'=>0,'prdid'=>10100);
            $products[] = Array('id'=>1466853210,'name'=>'Fried Cheese Sticks',
                                'desc'=>'Five fried mozarella sticks, with a dash of marinara on the side.',
                                'cost'=>3.5,'cals'=>425,'hlth'=>0,'prdid'=>10100);
            $products[] = Array('id'=>1678234687,'name'=>'Fountain Soda',
                                'desc'=>'A small fountain soda.',
                                'cost'=>1.5,'cals'=>200,'hlth'=>0,'prdid'=>10900);
            $products[] = Array('id'=>1523874568,'name'=>'Yogurt','desc'=>
                                'A tube of gogurt in strawberry or banana or blue-razz flavors.',
                                'cost'=>1,'cals'=>150,'hlth'=>1,'prdid'=>10800);
            $products[] = Array('id'=>1657985246,'name'=>'Taco Plate',
                                'desc'=>'Three soft tacos, one each of chicken, beef, and pork.',
                                'cost'=>3.75,'cals'=>450,'hlth'=>1,'prdid'=>10300);

            if($flag){
                echo '
                <h1>CONNECTION OK!</h1>
                <div>
                    <form method="POST" action="">
                        <input type="submit" value="RESET THE DB">
                    </form>
                </div>';
                if($_SERVER["REQUEST_METHOD"] == "POST"){
                    echo '<br><br><h1>Resetting the DB...</h1><br>';
                    $stmt = $sql->prepare("DELETE FROM Products");
                    $stmt = $stmt->execute();
                    $stmt = $sql->prepare("INSERT INTO Products VALUES (:id, :name, :description, :cost, :cals, :hlth, :prdid)");
                    $id = $name = $description = $cost = $calories = $health = $productID = "";
                    $stmt->bindParam(':id', $id);
                    $stmt->bindParam(':name', $name);
                    $stmt->bindParam(':description', $description);
                    $stmt->bindParam(':cost', $cost);
                    $stmt->bindParam(':cals', $calories);
                    $stmt->bindParam(':hlth', $health);
                    $stmt->bindParam(':prdid', $productID);
                    foreach($products as $product){
                        $id = $product['id'];
                        $name = $product['name'];
                        $description = $product['desc'];
                        $cost = $product['cost'];
                        $calories = $product['cals'];
                        $health = $product['hlth'];
                        $productID = $product['prdid'];
                        try{
                            $stmt -> execute();
                            print_r($product);
                            echo '<div style="color:green;font-weight:bold;">--> Stored object in SQL DB!</div>';
                        } catch(PDOException $x){
                            echo '<div style="color:green;font-weight:bold;">--> Unable to store object in SQL DB!</div>';
                        }
                        echo '<br>';
                    }

                }
            }else{echo '<h1>NO CONNECTION!</h1>';}
        ?>
    </body>
</html>