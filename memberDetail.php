<!DOCTYPE html>
<html lang="en">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
  <script src='https://ajax.googleapis.com/ajax/libs/jqueryui/1.13.2/jquery-ui.min.js'></script>
  <script src = "https://cdnjs.cloudflare.com/ajax/libs/FileSaver.js/2.0.0/FileSaver.min.js" integrity="sha512-csNcFYJniKjJxRWRV1R7fvnXrycHP6qDR21mgz1ZP55xY5d+aHLfo9/FcGDQLfn2IfngbAHd8LdfsagcCqgTcQ==" crossorigin = "anonymous" referrerpolicy = "no-referrer"> </script>

<head>
    <title>E-People</title>


    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">  

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
<?php include 'top.php'?>
   <div class="container-fluid pb-5 px-xl-5">
        <div class="col-12 mb-30 px-xl-3">
            <div class="bg-light p-30 mb-5">
<?php
    $isLogin = false;
    $userName = $_POST['userEmail'];
    $userPassword = $_POST['userPassword'];
   
    $inp = file_get_contents('userinformation.json');
    $tempArray = json_decode($inp);
    
    
    
    foreach($tempArray as $array) {
        if($userName == $array->userEmail && $userPassword == $array->userPassword)
            {
                $isLogin = true;
                echo 'Hello ';
                echo $array->userName;
                echo ',';
                echo '<br>';
                echo 'Your information is :';
                echo '<br>';
                echo 'Password: ';
                echo $array->userPassword;
                echo '<br>';
                echo 'Date of Birth: ' ;
                echo $array->userDateOfBirth;
                echo '<br>';
                echo 'Mobile: ';
                echo $array->userMobile;
                echo '<br>';
                echo 'Address: ' ;
                echo $array->userAddress;

            }
    }
    if(!$isLogin) {
                echo '<p>Email and Password Incorrect</p>';
                echo '<p><a href="javascript:history.go(-1)" title="Return to previous page">« Go back</a></p>';
            }
    
?>
</div>
</div>
</div>


<?php include 'bottom.php'?>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Contact Javascript File -->
    <script src="mail/jqBootstrapValidation.min.js"></script>
    <script src="mail/contact.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>


</html>