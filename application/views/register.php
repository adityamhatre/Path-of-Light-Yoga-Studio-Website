<?php
    if(isset($_POST['name'])){
        $name=$_POST['name'];
    }
    if(isset($_POST['address'])){
        $address=$_POST['address'];
    }
    if(isset($_POST['phone'])){
        $phone=$_POST['phone'];
    }
    if(isset($_POST['email'])){
        $email=$_POST['email'];
    }
    if(isset($_POST['password'])){
        $password=$_POST['password'];
    }
    if(isset($_POST['c_password'])){
        $c_password=$_POST['c_password'];
    }
    if(isset($_POST['class'])){
        $class= $_POST['class'];
    }
    if(isset($_POST['day'])){
        $day= $_POST['day'];
    }
    if(isset($_POST['time'])){
        $time=$_POST['time'];   
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
            <h1>
                    Path of Light Yoga Studio
                </h1>
        </header>
                    <?php include "menu.php" ?>

        <main>
            <h2>Contact Path of Light Yoga Studio</h2>
            <p>Required information is marked with an asterisk (*).</p>
            <br>
            <br>
            <table style="border-spacing: 0 1em">
                <?php echo form_open('register');?>
                <!-- <form method="post" action="register.php"> -->
                
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
                        <td align="right"><b>* Password:&nbsp;&nbsp;</b></td>
                        <td>
                            <!-- <input type="password" name="password"> -->
                            <?php echo form_password(array('name'=>'password'));?>
                        </td>
                        <td>
                            <?php echo form_error('password'); ?>
                        </td>
                    </tr>
                    <tr>
                        <td align="right"><b>* Confirm Password:&nbsp;&nbsp;</b></td>
                        <td>
                            <!-- <input type="password" name="c_password"> -->
                            <?php echo form_password(array('name'=>'c_password'));?>
                        </td>
						<td>
                            <?php echo form_error('c_password'); ?>
						<!-- <?php
						 if(isset($password) && isset($c_password)){
							if($password==$c_password){
                                if(preg_match("/^[A-Z0-9a-z_]{8,16}/", $password)){
									$password_validated = true;
								}else{
									echo "Passwords should be greater than or equal to 8 characters and less than 16<br>";
								}
							}else{
								echo "Passwords do not match<br>";
							}
						}
						?> -->
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
                        <td align="right"><b>* Phone:&nbsp;&nbsp;</b></td>
                        <td>
                            <?php echo form_input(array('name'=>'phone'));?>
                        </td>
						<td>
                            <?php echo form_error('phone'); ?>
						<!-- <?php
						if(isset($phone)){
							if(strlen(trim($phone))==0){
								echo "Invalid phone<br>";
							}else{
                                if(preg_match("/^[2-9]{1}[0-9]{2}-[0-9]{3}-[0-9]{4}$/", $phone) ||
                                    preg_match("/^[2-9]{1}[0-9]{2}.[0-9]{3}.[0-9]{4}$/", $phone) ||
                                    preg_match("/^[2-9]{1}[0-9]{2} [0-9]{3} [0-9]{4}$/", $phone) ||
                                    preg_match("/^[(][2-9]{1}[0-9]{2}[)] [0-9]{3}-[0-9]{4}$/", $phone) ||
                                    preg_match("/^[2-9]{1}[0-9]{2}[0-9]{7}$/", $phone)){
                                    $phone_validated = true;
                                }else{
                                    echo "Phone number is invaliid";
                                }
							}
						}
						?> -->
						</td>
                    </tr>
                    <tr>
                        <td align="right" valign="top"><b>* Address:&nbsp;&nbsp;</b></td>
                        <td>
                            <!-- <textarea name="address"></textarea> -->
                            <?php echo form_textarea(array('name'=>'address'));?>
                        </td>
						<td>
                            <?php echo form_error('address'); ?>
						<!-- <?php
						 if(isset($address)){
							if(strlen(trim($address))==0){
								echo "Invalid address<br>";
							}else{
								$address_validated = true;
							}
						}
						?> -->
						</td>
                    </tr>
                    <tr>
                        <td align="right"><b>* Type of class:&nbsp;&nbsp;</b></td>
                        <td>
                            <?php 
                                foreach($class_data->result() as $cl){
                                     $options[$cl->classID]=$cl->class_name;
                                }
                                echo form_dropdown('class',$options);
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td align="right"><b>* Schedule:&nbsp;&nbsp;</b></td>
                        <td>
                            <?php 
                                foreach($days_data->result() as $d){
                                     $options_days[$d->daysID]=$d->days_name;
                                }
                                echo form_dropdown('day',$options_days);
                            ?>
                        </td>
                    </tr>
					<tr>
                        <td align="right"><b>* Time:&nbsp;&nbsp;</b></td>
                        <td>
                             <?php 
                                foreach($time_data->result() as $t){
                                     $options_time[$t->timeID]=$t->time;
                                }
                                echo form_dropdown('time',$options_time);

                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" align="center">
                            <!-- <input type="submit" value="Send Now"> -->
                            <?php echo form_submit('', 'Send Now');?>
                        </td>
                    </tr>
					<tr>
						<td colspan="2">
                    <?php
                     echo form_error('schedule_validation'); 
                     if($inserted=='true'){
                        echo "Inserted in database";
                     }
                    ?>

							<!-- <?php
                            
                            if(isset($time) && isset($class) && isset($day)){
                            $q="SELECT * FROM `schedule` WHERE `timeID`='{$time}' AND `classID`='{$class}' AND `daysID`='{$day}'";
                            $r=mysqli_query($con,$q);
                            $c=0;
                            while($rr=mysqli_fetch_array($r)){
                                $c++;
                            }
                            if($c==0){
                                $showThis="Selected class timings are invalid<br>Timings available are as follows: <br>";
                                $q="SELECT * FROM `schedule` WHERE `classID`='{$class}'";
                                $r=mysqli_query($con,$q);
                                while($rr=mysqli_fetch_array($r)){
                                    $tID=$rr['timeID'];
                                    $dID=$rr['daysID'];
                                    $q="SELECT t.time,d.days_name FROM (SELECT * FROM `time` WHERE timeID='$tID') as t, (SELECT * FROM `days` WHERE daysID='${dID}') as d";
                                    $rt=mysqli_query($con,$q);
                                    while($rrt=mysqli_fetch_array($rt)){
                                        $showThis=$showThis."{$rrt['days_name']}: {$rrt['time']}<br>";
                                    }
                                }
                                echo "{$showThis}";
                            }else{
                                if(isset($name_validated) && isset($email_validated) && isset($password_validated) && isset($phone_validated) && isset($address_validated))
                                if($name_validated && $email_validated && $password_validated && $phone_validated && $address_validated){
                                    $query = "INSERT INTO `client`(name,email,password,phone,address) VALUES('{$name}','{$email}','{$password}','{$phone}','{$address}')";
                                    mysqli_query($con,$query);
                                    $asdf=mysqli_query($con,"SELECT * FROM `client` ORDER BY `clientID` DESC LIMIT 1");
                                    while($aa=mysqli_fetch_array($asdf) ){
                                        $cID=$aa['clientID'];
                                        mysqli_query($con,"INSERT INTO `client_schedule`(clientID,timeID,classID,daysID) VALUES('{$cID}','{$time}','{$class}','{$day}')");
                                    }
                                    echo "Inserted in database";
                                    
                                    
                                   
                                }
                            }
                        }
												
						?> -->
						</td>
					</tr>
                    <!-- <?php echo form_input(array('name'=>'schedule_validation'));?> -->
                <?php echo form_close();?>
            </table>
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