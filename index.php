<?php

//Check id user coming from a request

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    
    //Assign Variables
    
    $user = filter_var($_POST['username'], FILTER_SANITIZE_STRING);
    $mail =filter_var( $_POST['email'], FILTER_SANITIZE_EMAIL);
    $cell = filter_var($_POST['cellphone'], FILTER_SANITIZE_NUMBER_INT);
    $msg  = filter_var($_POST['message'], FILTER_SANITIZE_STRING);
      
    //Creating array of errors
    $formErrors = array();
    
    if (strlen($user) <3){  
        $formErrors[] ='Name Must be Larger Than <strong>2</strong>Characters';   
    }
    
    if (strlen($msg) <=3){
        $formErrors[] ='Message is very short';  
    }
    
    $headers = 'From: ' . $mail . '\r\n';
    $myEmail = 'yyyoyo69@gmail.com';
    $subject = 'test';
    // if no errors send the email
    if(empty($formErrors)){
     mail($myEmail,$subject,$msg,$headers);
        $user = '';
        $mail = '';
        $cell = '';
        $msg = '';
        
        $success = '<div class="alert alert-success">we send our question to companies</div>';
    }
    
}

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>test</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/all.min.css">
    <link rel="stylesheet" href="css/form.css">
</head>
<body>
    
    <!-- Start Form -->
    
    <div class="container">
        <h1 class="text-center">Ask Companies:</h1>
        <form class="Ask-form" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
            
            <?php
                if (! empty($formErrors)){ ?>
            <div class="alert alert-danger alert-dismissible fade show" role="start">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                <?php
                    foreach($formErrors as $error){
                        echo $error . '<br/>';
                    }
                                        ?>
            </div>
            <?php
                }
            ?>
            <?php if (isset($success){
                echo $success;
            })
            <div class="form-group">
                <span class="asterisx">*</span>
                <input 
                       class="form-control username" 
                       type="text" 
                       name="username" 
                       placeholder="Type Your Name"
                       value="<?php if (isset($user)) { echo $user; } ?>">
                <i class="fa fa-user"></i>
                <div class="alert alert-danger custom-alert">
                    Name must be larger than <strong>2 </strong> characters
                </div>
            </div>
            <div class="form-group">
                <input 
                       class="form-control email" 
                       type="email" 
                       name="email" 
                       placeholder="Type Your E-mail"
                       value="<?php if (isset($mail)) { echo $mail; } ?>">
                <i class="fa fa-envelope"></i>
                <div class="alert alert-danger custom-alert">
                    Email is very short
                </div>
            </div>
            <div class="form-group">
                <span class="asterisx">*</span>
                <input 
                       class="form-control phone" 
                       type="cellphone" 
                       name="cellphone" 
                       placeholder="Type Your Cell Phone"
                       value="<?php if (isset($cell)) { echo $user; } ?>">
                <i class="fa fa-phone"></i>
                <div class="alert alert-danger custom-alert">
                    Phone number must be <strong>10  </strong>numbers
                </div>
            </div>
            <div class="form-group">
                <span class="asterisx">*</span>
                <textarea 
                          class="form-control message" 
                          name="message" 
                          placeholder="Type Your Question"
                          value="<?php if (isset($msg)) { echo $msg; } ?>"
                          ></textarea>
                <div class="alert alert-danger custom-alert">
                    Message is very short
                </div>
        
            </div>
            <input class="btn btn-success" type="submit" value="Send">
            <i class="fas fa-paper-plane send-icon"></i>
            
        </form>
    </div>
    
    <!-- End Form -->
    
    <script src="js/jquery-3.5.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/custom.js"></script>
</body>
</html>