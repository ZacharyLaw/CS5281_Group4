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

    <!-- Breadcrumb Start -->
    <!-- <div class="container-fluid">
        <div class="row px-xl-5">
            <div class="col-12">
                <nav class="breadcrumb bg-light mb-30">
                    <a class="breadcrumb-item text-dark" href="#">register</a>
                 
                </nav>
            </div>
        </div>
    </div> -->
    <!-- Breadcrumb End -->


    <!-- Shop Detail Start -->

    <div class="container-fluid pb-5 px-xl-5">
        <div class="col-12 mb-30 px-xl-3">
            <div class="bg-light p-30 mb-5">
              <form name = "Reg" method= "get" onsubmit="return validation()">

                Customer Name:   <input type="text" name="userName" id = "userName">  <br><br>
                Email:   <input type="email" name="userEmail" id = "userEmail"> <br><br>
                Password:   <input type="password" name="userPassword" id = "userPassword"> <br><br>
                Password Confirm:   <input type="password" name="userPasswordConfirm" id = "userPasswordConfirm"> <br><br>
                Date of Birth: <input type="date" id="userDateOfBirth" name="userDateOfBirth" value="2000-01-01"  min="1900-01-01" max="2023-01-01" > <br><br>
                Mobile Number:   <input type="number" name="userMobile" id="userMobile"> <br><br>
                Address:   <input type="text" name="userAddress" id="userAddress"> <br><br>
            	<br>
            <input type="submit" value="Register" onclick = "">
            <script type ="text/javascript">
                  function saveFile() {
                     
                      <?php
                        $path = 'userinformation.json';
                        // JSON data as an array
                        $jsonData = [
                                "userName" => $_GET['userName'],
                                "userEmail" => $_GET['userEmail'],
                                "userPassword" => $_GET['userPassword'],
                                "userDateOfBirth" => $_GET['userDateOfBirth'],
                                "userMobile" => $_GET['userMobile'],
                                "userAddress" => $_GET['userAddress'],
                        ];
                 
                        $data[] = $_POST[$jsonData];
                        
                        $inp = file_get_contents('userinformation.json');
                        $tempArray = json_decode($inp);
                        array_push($tempArray, $jsonData);
                        $jsonDataEncoded = json_encode($tempArray);
                        file_put_contents('userinformation.json', $jsonDataEncoded);
                        
                        //$jsonString = json_encode($jsonData);
                        //$fp = fopen($path, 'w');
                        //fwrite($fp, $jsonString);
                        //fclose($fp);
                        
                         
                        ?>
              } 
              </script>
                </form>
                <script>
                 function validation(){
                    if(document.Reg.userPassword.value != document.Reg.userPasswordConfirm.value)
                    {window.alert("Password is not match!");return false;}
                        
                    else if(document.Reg.userName.value == "" ||document.Reg.userEmail.value == ""||document.Reg.userPassword.value == "")
                    {window.alert("Customer Name, Email and Password cannot be empty!");return false;}
                    
                    else if(document.Reg.userPassword.value = document.Reg.userPasswordConfirm.value && document.Reg.userName.value != "" && document.Reg.userEmail.value != "" && document.Reg.userPassword.value != "")
                    { saveFile();return true};
                }
                </script>
            </div>
     
        </div>
    </div>
    <!-- Shop Detail End -->

<script>

var data=<?php echo file_get_contents('./testfile.txt', true);?>;
console.log(data)


    $.ajax({
            url : "items.json",dataType: "text",
            success : function (data) {main(data)}
    })
    function main(data){
        var name=prompt("Please enter your name","Harry Potter");
        console.log(items)
    }
</script>


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