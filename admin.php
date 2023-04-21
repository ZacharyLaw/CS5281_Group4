<!DOCTYPE html>
<html lang="en">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
<script src='https://ajax.googleapis.com/ajax/libs/jqueryui/1.13.2/jquery-ui.min.js'></script>

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
    <script src="js/main.js"></script>
    <script src="js/saveData0.js" type="text/javascript">></script>
    <script src="js/saveData.js" type="text/javascript">></script>
    <style>
        #content table {
            width: 100%;
            text-align: center;
        }

        #content table thead {
            background-color: #3D464D;
            color: white;
            border-bottom: 15px solid white;
        }

        #content table th {
            padding: 2vw;
        }

        #content table td {
            text-align: center;
        }

        #content table tbody tr {
            background-color: #F5F5F5;
            border-bottom: 15px solid white;
        }

        #content table tbody tr:hover {
            background-color: #f2f2f2;
        }

        #content table img {
            width: 5vw;
        }

        #content table tfoot tr {
            background-color: #F5F5F5;
            border-bottom: 15px solid white;
            line-height: 3;
                    }

        #content #add:hover {
            background-color: lightgreen;
            cursor: pointer;
        }

        #content #save:hover {
            background-color: lightblue;
            cursor: pointer;
        }

        #content #save{
            position: relative;

        &:before {
    content: '';
    position: absolute;
    right: 40%;
    top: 60%;
    margin-top: -12px;
    width: 24px;
    height: 24px;
    border: 2px solid;
    border-left-color: transparent;
    border-right-color: transparent;
    border-radius: 50%;
    opacity: 0;
    transition: opacity 0.5s;
    animation: 0.8s linear infinite rotate;
  }
  &.sending{
    pointer-events: none;
    cursor: not-allowed;
    
    &:before {
      transition-delay: 0.5s;
      transition-duration: 1s;
      opacity: 1;
    }
  }
}
@keyframes rotate {
  0% {
    transform: rotate(0deg);
  }
  100% {
    transform: rotate(360deg);
  }
}
    </style>
</head>

<body>
    <?php include 'top.php' ?>
    <!-- Breadcrumb Start -->
    <div class="container-fluid">
        <div class="row px-xl-5">
            <div class="col-12">
                <nav class="breadcrumb bg-light mb-30">
                    <a class="breadcrumb-item text-dark" href="#">Home</a>
                    <span class="breadcrumb-item active">Admin</span>
                </nav>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->
    <!-- Shop Detail Start -->
    <div class="container-fluid pb-5 px-xl-5">
        <div class="col-12 mb-30 px-xl-3">
            <div id=content class="bg-light p-30">
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Price</th>
                            <th>Tags</th>
                            <th>Rating</th>
                            <th>Image</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                    <tfoot>
                        <tr id=add>
                            <td colspan="6">+</td>
                        </tr>
                        <tr id=save>
                            <td colspan="6">Save</td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
    <!-- Shop Detail End -->
    <script type="text/javascript">
    var data;
        var log;
        var obj1 = {};

        $(document).ready(function () {
            data = <?php echo file_get_contents('./items.json', true); ?>;
            for (const [key, record] of Object.entries(data)) {$('#content tbody').append(`<tr><td>${record.Id}</td><td>${record.Name}</td><td>${record.Price}</td><td>${record.Tags}</td><td>${record.Rating}</td><td><img src="img/cityu/${record.Filename}"></td></tr>`)}
            $("#content tbody tr td:nth-child(2),#content tbody tr td:nth-child(3),#content tbody tr td:nth-child(4)").each(function () { $(this).html('<input value="' + $(this).html() + '">') })
            var temp = [];
            $('#save').click(function () {
                var newdata;
                $("#content table tbody tr").each(function (i, v) {
                    temp[i] = Array();
                    $(this).children('td').each(function (ii, vv) {
                        temp[i][ii] = $(this).html();
                        if ($(this).html().includes('input')) temp[i][ii] = $(this).children().val()
                    });
                    obj1[i] = {
                        'Id': parseInt(temp[i][0]), 'Name': temp[i][1],
                        'Price': temp[i][2],'Tags':temp[i][3], 'Rating':temp[i][4],
                        'Filename': temp[i][5].slice(20, temp[i][4].length - 2)
                    };
                })
                saveData(obj1);
            })
            $('#add').click(function(){
                len=$('#content tbody tr').length
                $('#content tbody').append(`<tr><td>${len}</td><td><input></td><td><input></td><td><input></td><td></td><td><img src="img/cityu/${len}.png"></td></tr>`)
            })



$('#save').click(function (e) {
e.preventDefault();
var but = $(this).toggleClass('sending').blur();
setTimeout(function(){but.removeClass('sending').blur()},4500);

})
        })
    </script>
    <?php include 'bottom.php' ?>
    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <!-- Contact Javascript File -->
    <script src="mail/jqBootstrapValidation.min.js"></script>
    <script src="mail/contact.js"></script>
    <!-- Template Javascript -->
</body>

</html>