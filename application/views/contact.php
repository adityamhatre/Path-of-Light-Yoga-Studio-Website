<?php
    include "connection.php";
    if(isset($_POST['name'])){
        $name=$_POST['name'];
    }
    if(isset($_POST['email'])){
        $email=$_POST['email'];
    }
    if(isset($_POST['comments'])){
        $comments=$_POST['comments'];
    }
   
   

?>

<html>

<head>
    <title>Path of Light Yoga</title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="<?php echo asset_url();?>css/yoga.css" />
</head>

<body>
    <div id="wrapper">
        <header>
            <h1>Path of Light Yoga Studio</h1>
        </header>
        <?php include "menu.php" ?>
        <main>
            <!-- <img src="img/yogalounge.jpg" alt="yogalounge" height="350" widht="350"> -->
            <h2>Contact Path of Light Yoga Studio</h2>
            <p>Required information is marked with an asterisk (*).</p>
            <br>
            <br>
            <table style="border-spacing: 0 1em">
                <!-- <form method="post" action=contact.php> -->
                    <?php echo form_open('contact');?>
                    <tr>
                        <td align="right"><b>* Name:&nbsp;&nbsp;</b></td>
                       <td>
                            <!-- <input type="text" name="name"> -->
                            <?php echo form_input(array('name'=>'name'));?>
                        </td>
                        <td>
                            <?php echo form_error('name'); ?>
                        </td>
                    </tr>
                    <tr>
                        <td align="right"><b>* E-mail:&nbsp;&nbsp;</b></td>
                        <td>
                            <!-- <input name="email"> -->
                            <?php echo form_input(array('name'=>'email'));?>
                        </td>
                        <td>
                            <?php echo form_error('email'); ?>
                        <!-- <?php
                         if(isset($email)){
                            if (!preg_match("/^[A-Z0-9._%-]+@[A-Z0-9][A-Z0-9.-]{0,61}[A-Z0-9]\.[A-Z]{2,6}$/i",$email)) {
                                echo "Invalid email format<br>"; 
                            }else{
                                $email_validated = true;
                            }
                        }
                        ?> -->
                        </td>
                    </tr>
                    <tr>
                        <td align="right" valign="top"><b>* Comments:&nbsp;&nbsp;</b></td>
                        <td>
                            <!-- <textarea name="address"></textarea> -->
                            <?php echo form_textarea(array('name'=>'comments'));?>
                        </td>
                        <td>
                            <?php echo form_error('comments'); ?>
                        <!-- <?php
                         if(isset($address)){
                            if(strlen(trim($address))==0){
                                echo "Invalid comments<br>";
                            }else{
                                $address_validated = true;
                            }
                        }
                        ?> -->
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" align="center">
                            <!-- <input type="submit" value="Send Now"> -->
                            <?php echo form_submit('', 'Send Now');?>
                        </td>
                    </tr>
					<tr>
                       <?php 
                       if($inserted=="true"){
                        echo "inserted in database";
                       }
    
						?>
                    </tr>
					
                </form>
            </table>
            <br><br><br><br><br><br><br><br><br><br>
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