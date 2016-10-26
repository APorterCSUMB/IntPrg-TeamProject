<!DOCTYPE HTML>
<html>
    <head>
        <link rel="stylesheet" href="worm.css">
        <title>
            PHP C9 Worm
        </title>
    </head>
    <body>
        <div id="supercontainer">
        <div id="menu">
            <?php
            $rings = rand(1,5);
            
            for($i=0;$i<$rings;$i++){
                echo '<div class="ring" style="border-color:rgb('.rand(20,200).','.rand(20,200).','.rand(20,200).')">';
            }
            echo '<img src="worm1.png">';
            for($i=0;$i<$rings;$i++){
                echo '</div>';
            }
            
            echo'<div>Welcome to Andrew\'s <br><b>PHP dirWorm!</b><br><br>This PHP script auto-enumerates and links all sub-folders and files in a directory for easy visual browsing.</div>';
            
            for($i=0;$i<$rings;$i++){
                echo '<div class="ring" style="border-color:rgb('.rand(20,200).','.rand(20,200).','.rand(20,200).')">';
            }
            echo '<img src="worm2.png">';
            for($i=0;$i<$rings;$i++){
                echo '</div>';
            }
            
            ?>
        </div>
        <?php
            function directoryPrinter($d, $l){
                echo '<div class="directory"><a href="'.$d.'/">'.$d.'</a>';
                $directory = array_diff(scandir($d), array('..', '.')); //ARRAY FUNCTIONS - array_diff
                sort($directory); //ARRAY FUNCTIONS - sort
                foreach($directory as $sub){ //ARRAY FUNCTIONS - foreach / LOOP #1 for DIRs
                    if(is_dir($d.DIRECTORY_SEPARATOR.$sub)&&(!strchr($sub, '.c9'))&&(!strchr($sub, '.git'))){ //CONDITIONS - check if DIR and NOT Cloud9 or Git
                        if($l>0){
                            echo directoryPrinter($d.DIRECTORY_SEPARATOR.$sub, ($l-1));
                        }
                        else{
                            echo '<br><a href="'.$d.'/'.$sub.'">(+dir /'.$sub.')</a>';
                        }
                    }
                }
                foreach($directory as $sub){ //ARRAY FUNCTIONS - foreach / LOOP #2 for FILEs
                    if(!is_dir($d.DIRECTORY_SEPARATOR.$sub)&&(!strchr($sub, '.c9'))&&(!strchr($sub, '.git'))){ //CONDITIONS - check if DIR and NOT Cloud9 or Git
                        echo '<div class="file"><a href='.$d.DIRECTORY_SEPARATOR.$sub.'>'.$sub.'</a></div>';
                    }
                }
                echo '</div>';
            }
            
            directoryPrinter('.', 3);
            
        ?>
        </div>
    </body>
</html>