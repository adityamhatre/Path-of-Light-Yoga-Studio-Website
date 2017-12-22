<html>

<head>
    <title>Path of Light Yoga</title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="<?php echo asset_url();?>css/yoga.css" />
</head>

<body>
    <div id="wrapper">
        <header>
            <h1>
                    Path of Light Yoga Studio
                </h1>
        </header>
                    <?php include "menu.php" ?>

        <main>
            <img src="<?php echo asset_url();?>img/yogalounge.jpg" alt="yogalounge" height="350" widht="350">
            <h2>Yoga Schedule</h2>
            <p>Mats, blocks, and blankets provided. Please arrive 10 minutes before your class begins. Relax in our Security Lounge before or after your class.</p>
            <?php

                $days_name="";
                $c=0;
                foreach ($final as $f) {
                    if($days_name!=$f['days_name']){
                        $days_name = $f['days_name'];
                        if($c!=0){
                            echo "</ul><h3>".$f['days_name']."</h3><ul>";    
                        }
                        else{
                            $c++;
                            echo "<h3>".$f['days_name']."</h3><ul>";    
                        }
                        
                    }
                    echo "<li>".$f[$days_name]['time']."  ".$f[$days_name]['class_name']."</li>";                   
                }
                echo "</ul>";

            ?>
        </main>
        <br>
        <footer>
            Copyright&copy; 2016 Path of Light Yoga Studio
            <br>
            <a href="mailto:aditya@mhatre.com">aditya@mhatre.com</a>
        </footer>
    </div>
</body>

</html>