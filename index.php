<?php

    $name_error = "";
    $email_error = "";
    $message_error = "";
    $redirect_message = "";

    if(count($_POST) > 0){
        $name = $_POST["name"];
        $email = $_POST["email"];
        $message = $_POST["message"];
        
        if (empty($name)) {
            $name_error = "Name must be not empty";
        }
        elseif(strlen($name) > 100){
            $name_error = "Name must be less than 100 character";            
        }
        if(empty($email)){
            $email_error = "Email must be not empty";
        }
        elseif (!filter_var($email,FILTER_VALIDATE_EMAIL)) {
            $email_error = "Email is not valid";   
        }
        if(empty($message)){
            $message_error = "Message must be not empty";
        }
        elseif (strlen($message) > 255) {
            $message_error = "Message must be less than 255 character";   
        }
        else{
            $redirect_message = "
            <h1>Thank you for contacting Us</h1><br>
            <p><b>Name: </b>".$name."</p>
            <p><b>Email: </b>".$email."</p>
            <p><b>Message: </b>".$message."</p>
            ";
        }
    }

    if(count($_GET) > 0 && strlen($name_error)==0 && strlen($email_error)==0 && strlen($message_error)==0){
        if(isset($_GET['page']) == "redirect"){
            echo $redirect_message . "<hr>";
        }
    }
?>

<html>
    <head>
        <title> contact form </title>
        <style>
            .error{
                color: red;
            }
        </style>
    </head>

    <body>
        <h3> Contact Form </h3>
        <div id="after_submit">
            
        </div>
        <form id="contact_form" action="index.php?page=redirect" method="POST" enctype="multipart/form-data">

            <div class="row">
                <label class="required" for="name">Your name:</label><br />
                <input id="name" class="input" name="name" type="text" value="<?php echo $name ?>" size="30" /><br />
                <p class="error"><?php echo $name_error;?></p>

            </div>
            <div class="row">
                <label class="required" for="email">Your email:</label><br />
                <input id="email" class="input" name="email" type="text" value="<?php echo $email ?>" size="30" /><br />
                <p class="error"><?php echo $email_error;?></p>

            </div>
            <div class="row">
                <label class="required" for="message">Your message:</label><br />
                <textarea id="message" class="input" name="message" rows="7" cols="30"><?php echo $message ?></textarea><br />
                <p class="error"><?php echo $message_error;?></p>

            </div>

            <input id="submit" name="submit" type="submit" value="Send email" />
            <input id="clear" name="clear" type="reset" value="clear form" />

        </form>
    </body>

</html>