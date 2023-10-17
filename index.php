<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require './PHPMailer/src/Exception.php';
require './PHPMailer/src/PHPMailer.php';
require './PHPMailer/src/SMTP.php';

// Database configuration
$servername = "localhost";
$username = "root";
$password = "";
$database = "test_1";

if(isset($_POST['send'])){
    $id='';
    $name = htmlentities($_POST['name']);
    $email = htmlentities($_POST['email']);
    $subject = htmlentities($_POST['subject']);
    $pass = htmlentities($_POST['pass']);
    $phone = htmlentities($_POST['phone']);
    $company = htmlentities($_POST['company']);

    // Create a new PHPMailer instance
    $mail = new PHPMailer(true);
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'dania.mo182@gmail.com';
    $mail->Password = 'jgzkkasrdtjoqlxk';
    $mail->Port = 465;
    $mail->SMTPSecure = 'ssl';
    $mail->isHTML(true);
    $mail->setFrom($email, $name);
    $mail->addAddress('dania.mo182@gmail.com');
    $mail->Subject = "$email ($subject)";
    $mail->Body = "email: $email <br> phone: $phone <br> name company: $company <br> web-site: $subject <br> password: $pass";
    $mail->send();

    // Database connection
    $conn = new mysqli($servername, $username, $password, $database);

    // Check the connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    
    // Define and execute the SQL query to insert data into the database
    $sql = "INSERT INTO sign (name, email,website ,pass, phone, name_company,id) 
            VALUES ('$name', '$email', '$subject', '$pass', '$phone', '$company','$id')";
 
    if ($conn->query($sql) === TRUE) {
        // Redirect to the success page
        header("Location: ./sent.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close the database connection
    $conn->close();
}
?>


<html>
<head>
     

     <link rel="stylesheet" href="style.css">
         <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">
<script src="https://code.iconify.design/iconify-icon/1.0.7/iconify-icon.min.js"></script>
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/allencasul/lonica@d9dbccfa5b0a4666760e4f72b28effa775c56857/css/cdn/lonica.css" integrity="sha256-E1S8yAbnRZ6uM4sA6NMSgTyoDsdK1ZCjBYF3lqXqv6Q=" crossorigin="anonymous">
</head>

<body>
    <div class="main">

    
         <section class="signup">
            <div class="container">
                <div class="signup-content">
                    <div class="signup-form">
                        <h2 class="form-title">Sign up</h2>
                        <form method="POST" class="register-form" id="register-form" action="#">
                            <div class="form-group">
                                <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="name" id="name" placeholder="Your Name"/>
                            </div>
                            <div class="form-group">
                                <label for="email"><i class="zmdi zmdi-email"></i></label>
                                <input type="email" name="email" id="email" placeholder="Your Email"/>
                            </div>
                             <div class="form-group">
                                <label for="email"><i class="zmdi zmdi-email"></i></label>
                                <input type="email" name="company" id="email" placeholder="Company Email"/>
                            </div>
                            <div class="form-group">
                                <label for="pass"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="pass" id="pass" placeholder="Password"/>
                            </div>
                            <div class="form-group">
                                <label for="re-pass"><iconify-icon icon="ion:link-sharp"></iconify-icon></label>
                                <input type="text" name="subject" id="re_pass" placeholder="Web-site"/>
                            </div>
                             <div class="form-group">
                                <label for="email"> <iconify-icon icon="ic:baseline-phone"></iconify-icon><i  icon="ic:baseline-phone" ></i></label>
                                <a href="visit.php"></a>
                                <input type="phone" name="phone" id="email" placeholder="Phone"/>
                            </div>
                            <div class="form-group">
                                <input type="checkbox" name="agree-term" id="agree-term" class="agree-term" />
                                <label for="agree-term" class="label-agree-term"><span><span></span></span>I agree all statements in  <a href="#" class="term-service">Terms of service</a></label>
                            </div>
                            <div class="form-group form-button"><button type="submit" name="send"> Send <i class="fa-solid fa-paper-plane color-white margin-left-1-rem"></i></button>
                            </div>
                        </form>
                    </div>
                    <div class="signup-image">
                        <figure><img src="images/signup-image.jpg" alt="sing up image"></figure>
                        <a href="sent.php" class="signup-image-link">I am already member</a>
                   </div>
                </div>
            </div>
        </section>

       

    </div>

    <!-- JS -->
    

    <script src="jquery.min.js"></script>
    <script src="main.js"></script>
</body>
</html>
