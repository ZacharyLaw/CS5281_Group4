<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>MultiShop - Online Shop Website Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">  

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <script src="https://www.paypal.com/sdk/js?client-id=sb&enable-funding=venmo&currency=HKD" data-sdk-integration-source="button-factory"></script>


    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
<?php include 'top.php'?>

    <!-- Breadcrumb Start -->
    <div class="container-fluid">
        <div class="row px-xl-5">
            <div class="col-12">
                <nav class="breadcrumb bg-light mb-30">
                    <a class="breadcrumb-item text-dark" href="#">Home</a>
                    <a class="breadcrumb-item text-dark" href="#">Shop</a>
                    <span class="breadcrumb-item active">Shopping Cart</span>
                </nav>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->


    <!-- Cart Start -->
    <div class="container-fluid">
        <div class="row px-xl-5">
            <div class="col-lg-8 table-responsive mb-5">
                <table class="table table-light table-borderless table-hover text-center mb-0">
                    <thead class="thead-dark">
                        <tr>
                            <th>Products</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Total</th>
                            <th>Remove</th>
                        </tr>
                    </thead>
                    <tbody class="align-middle">
                        <script type="text/javascript">
                            var log;
                            productArray = readCookie("productArray");
                            var cartProduct = [];
                            data = <?php echo file_get_contents('./items.json', true); ?>;

                            // Filter the original array, since it existes some string type values.
                            for (i = 0 ; i < productArray.length; i++) {
                                if (isNaN(productArray[i]) == false) {
                                    cartProduct.push(productArray[i]);
                                }
                            }
                            var countCartProduct = [];

                            // Insert new product in an array if it doesn't exist before.
                            for(j = 0; j < cartProduct.length ; j++){
                                if (countCartProduct.includes(cartProduct[j]) == false){
                                    countCartProduct.push(cartProduct[j]);
                                }
                            }

                            // Generate product list
                            for (var i = 0; i < countCartProduct.length; i++) {
                                document.write("<tr><td class='align-middle'><img src='img/cityu/" + countCartProduct[i] + ".jpg' alt='' style='width: 50px;''> Product"+ countCartProduct[i] + "</td><td class='align-middle'>$123</td><td class='align-middle'><div class='input-group quantity mx-auto' style='width: 100px;'><div class='input-group-btn'><button class='btn btn-sm btn-primary btn-minus'><i class='fa fa-minus'></i></button></div><input type='text' class='form-control form-control-sm bg-secondary border-0 text-center' value=" +countProduct(countCartProduct[i])+ "><div class='input-group-btn'><button class='btn btn-sm btn-primary btn-plus'><i class='fa fa-plus'></i></button></div></div></td><td class='align-middle'>$"+ calculatePrice(countCartProduct[i]) + "</td><td class='align-middle'><button class='btn btn-sm btn-danger'><i class='fa fa-times'></i></button></td></tr>");                     
                            }
                            // Count how many different type of product exists, return integer.
                            function countProduct(productType){
                                count = 0;
                                for (var i = 0; i < cartProduct.length; i++) {
                                    if (cartProduct[i] == productType) {
                                        count++;
                                    }
                                }
                                return count;
                            }
                            // Calculate single product total price, each price is 123.
                            function calculatePrice(productType){
                                totalPrcie = countProduct(productType) * 123;
                                return totalPrcie;
                            }

                            // Calculate all the product total price, each price is 123.
                            function calculateSubTotalPrice(){
                                return cartProduct.length * 123;
                            }
                            var t=0;
                            $('table tbody tr').each(function(){
                                id=$(this).find('td:first-child').text().slice(8)
                                $(this).find('td:first-child').html($(this).find('td:first-child').html().split('Product')[0]+data[id].Name)
                                $(this).find('td:nth-child(2)').html('$'+data[id].Price)
                                t+=$(this).find('td:nth-child(3)').find('input').val()*data[id].Price;
                                $(this).find('td:nth-child(4)').html('$'+$(this).find('td:nth-child(3)').find('input').val()*data[id].Price)
                            })
                         
                        </script>
                        <!-- <tr>
                            <td class="align-middle"><img src="img/cityu/1.jpg" alt="" style="width: 50px;"> Product Name</td>
                            <td class="align-middle">$150</td>
                            <td class="align-middle">
                                <div class="input-group quantity mx-auto" style="width: 100px;">
                                    <div class="input-group-btn">
                                        <button class="btn btn-sm btn-primary btn-minus" >
                                        <i class="fa fa-minus"></i>
                                        </button>
                                    </div>
                                    <input type="text" class="form-control form-control-sm bg-secondary border-0 text-center" value="2">
                                    <div class="input-group-btn">
                                        <button class="btn btn-sm btn-primary btn-plus">
                                            <i class="fa fa-plus"></i>
                                        </button>
                                    </div>
                                </div>
                            </td>
                            <td class="align-middle">$150</td>
                            <td class="align-middle"><button class="btn btn-sm btn-danger"><i class="fa fa-times"></i></button></td>
                        </tr> -->
                    </tbody>
                </table>
            </div>
            <div class="col-lg-4">
                <form class="mb-30" action="">
                    <div class="input-group">
                        <input type="text" class="form-control border-0 p-4" placeholder="Coupon Code">
                        <div class="input-group-append">
                            <button class="btn btn-primary">Apply Coupon</button>
                        </div>
                    </div>
                </form>
                <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Cart Summary</span></h5>
                <div class="bg-light p-30 mb-5">
                    <div class="border-bottom pb-2">
                        <div class="d-flex justify-content-between mb-3">
                            <h6>Subtotal</h6>
                            <!-- Dynamic -->
                            <script type="text/javascript">
                                document.write("<h6 id=totalplace>$" + calculateSubTotalPrice() + "</h6>")
                            </script>
                        </div>
                        <div class="d-flex justify-content-between">
                            <h6 class="font-weight-medium">Shipping</h6>
                            <h6 class="font-weight-medium">$10</h6>
                        </div>
                    </div>
                    <div class="pt-2">
                        <div class="d-flex justify-content-between mt-2">
                            <h5>Total</h5>
                            <!-- Dynamic -->
                            <script type="text/javascript">
                                if (calculateSubTotalPrice() == 0) {
                                    document.write("<h5 id=totalship>$0</h5>")
                                }
                                document.write("<h5 id=totalship>$" + (calculateSubTotalPrice()+10) + "</h5>")
                            </script>
                        </div>
                        <a href="./checkout.php"><button class="btn btn-block btn-primary font-weight-bold my-3 py-3">Proceed To Checkout</button></a>
                        <div id="paypal"></div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Cart End -->

<?php include 'bottom.php'?>

<script>
    $('.quantity button').on('click', function () {
        var button = $(this);
        var oldValue = button.parent().parent().find('input').val();
        if (button.hasClass('btn-plus')) {
            var newVal = parseFloat(oldValue) + 1;
        } else {
            if (oldValue > 0) {
                var newVal = parseFloat(oldValue) - 1;
            } else {
                newVal = 0;
            }
        }
        button.parent().parent().find('input').val(newVal);
    });

$("table button").click(function() {
    $(this).closest("tr").find("td:eq(3)").html("$"+ parseInt($(this).closest("tr").find("td:eq(1)").html().substring(1))*parseInt($(this).parent().parent().find("input").val()));
    console.log(parseInt($(this).closest("tr").find("td:eq(1)").html().substring(1)),parseInt($(this).parent().parent().find("input").val()),parseInt($(this).closest("tr").find("td:eq(1)").html().substring(1)),parseInt($(this).parent().parent().find("input").val()))
    change()
})



$("table input").change(function() {
    $(this).closest("tr").find("td:eq(3)").html("$"+parseInt($(this).closest("tr").find("td:eq(1)").html().substring(1))*parseInt($(this).val()));
    change()
})
    var total=0;

function change(){
    total=0
    $("table tr td:nth-child(4)").each(function(){
        total+=parseInt($(this).html().substring(1))
    })

    $("#totalplace").html("$"+total)
    $("#totalship").html("$"+(total+10))

    
}
    
    
    
    
    
$('#totalplace').html('$'+t)
$('#totalship').html('$'+(t+10))
    paypal.Buttons({
style: {shape: 'rect',color: 'gold',layout: 'horizontal',label: 'paypal',},
createOrder: function(data, actions) {
return actions.order.create({
purchase_units: [{"amount":{"currency_code":"HKD","value":t+10}}]
});
},
onApprove: function(data, actions) {
return actions.order.capture().then(function(orderData) {
console.log('Capture result', orderData, JSON.stringify(orderData, null, 2));
const element = document.getElementById('paypal-button-container');
element.innerHTML = '';
element.innerHTML = '<h3>Thank you for your payment!</h3>';
});
},
onError: function(err) {console.log(err);}
}).render('#paypal');
$('#r>button').click(function(){
    window.location.pathname='checkout'
})



    
</script>
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