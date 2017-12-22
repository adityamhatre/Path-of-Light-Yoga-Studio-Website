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
                <img src="<?php echo asset_url();?>img/yogamat.jpg">
                <h2>Yoga Classes</h2>
                
                <dl>
                    <?php
                    // $query = $this->db->query("SELECT * FROM `class`");
                    foreach ($query_result->result() as $row)
                    {
                            echo "<dt><strong>".$row->class_name."</strong></dt>";
                            echo "<dd>".$row->description."</dd>";
                    }
                    ?>
                </dl>
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