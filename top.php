<style>
    #logo{
        width:3vw;
        padding:0;
        margin:0;
    }
    #popupbox {
    background-color: black;
    margin: 0 auto;
    width: 80%;
    position: fixed;
    left: 0;
    right: 0;
    height: 60px;
    border-radius: 5px;
    background: #80BFFF;
    z-index: 9;
    text-align: center;
    color: white;
    padding: 20px;
    bottom: 0;
    display: none;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.5);
  }
  #popupbox>button {
    float: right;
    background-color: #ffffff00;
    border: none;
    cursor: pointer;
    color: white;
    font-weight: bold;
  }
  #popupbox>button :hover{
    background-color: grey;
    color:#0080ff;
  }
</style>
    <!-- Topbar Start -->
    <div id='popupbox'><a id=popupmsg>Message</a><button onclick='$('#popupbox').slideToggle();'>X</button></div>

    <div class="container-fluid">
        <div class="row bg-secondary py-1 px-xl-5" style="position:fixed;z-index:10;width:100%;">
            <div class="col-lg-6 d-none d-lg-block">
                <div class="d-inline-flex align-items-center h-100">
                    <a class="text-body mr-3" href="">About</a>
                    <a class="text-body mr-3" href="">Contact</a>
                    <a class="text-body mr-3" href="">Help</a>
                    <a class="text-body mr-3" href="">FAQs</a>
                </div>
            </div>
            <div class="col-lg-6 text-center text-lg-right">
                <div class="d-inline-flex align-items-center">
                    <div class="btn-group">
                        <button type="button" class="btn btn-sm btn-light dropdown-toggle" data-toggle="dropdown">My Account</button>
                        <div class="dropdown-menu dropdown-menu-right">
                            <button class="dropdown-item" type="button"></button><a HREF="login.php">Sign in</a></button>
                            <button class="dropdown-item" type="button"></button><a HREF="register.php">Sign up</a></button>
                        </div>
                    </div>
                    <div class="btn-group mx-2">
                        <button type="button" class="btn btn-sm btn-light dropdown-toggle" data-toggle="dropdown">HKD</button>
                        <div class="dropdown-menu dropdown-menu-right">
                            <button class="dropdown-item" type="button">USD</button>
                            <button class="dropdown-item" type="button">EUR</button>
                            <button class="dropdown-item" type="button">GBP</button>
                            <button class="dropdown-item" type="button">CAD</button>
                        </div>
                    </div>
                    <div class="btn-group">
                        <button type="button" class="btn btn-sm btn-light dropdown-toggle" data-toggle="dropdown">EN</button>
                        <div class="dropdown-menu dropdown-menu-right">
                            <button class="dropdown-item" type="button">FR</button>
                            <button class="dropdown-item" type="button">AR</button>
                            <button class="dropdown-item" type="button">RU</button>
                        </div>
                    </div>
                </div>
                <div class="d-inline-flex align-items-center d-block d-lg-none" style="display: inline-flex!important;">
                <!--   
                <a href="" class="btn px-0 ml-2">
                        <i class="fas fa-heart text-dark"></i>
                        <span class="badge text-dark border border-dark rounded-circle" style="padding-bottom: 2px;">0</span>
                    </a>
-->
                    <a href="cart.php" class="btn px-0 ml-2">
                        <i class="fas fa-shopping-cart text-dark"></i>
                        <span class="cartCount badge text-dark border border-dark rounded-circle" style="padding-bottom: 2px;">0</span>
                    </a>
                </div>
            </div>
        </div>
        <div class="row align-items-center bg-light py-3 px-xl-5 d-none d-lg-flex" style="padding-top: 55px!important">
            <div class="col-lg-4">
                <a href="/" class="text-decoration-none">
                    <image id=logo src=logo.png></image>
                    <span class="h1 text-uppercase text-primary bg-dark px-2">E-</span>
                    <span class="h1 text-uppercase text-dark bg-primary px-2 ml-n1">People</span>
                </a>
            </div>
            <div class="col-lg-4 col-6 text-left">
                <form action="">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search for products">
                        <div class="input-group-append">
                            <span class="input-group-text bg-transparent text-primary">
                                <i class="fa fa-search"></i>
                            </span>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-lg-4 col-6 text-right">
                <p class="m-0">Customer Service</p>
                <h5 class="m-0">+852 3442 9317</h5>
            </div>
        </div>
    </div>
    <!-- Topbar End -->


    <!-- Navbar Start -->
    <div class="container-fluid bg-dark mb-30">
        <div class="row px-xl-5">
            <div class="col-lg-3 d-none d-lg-block">
                <a class="btn d-flex align-items-center justify-content-between bg-primary w-100" data-toggle="collapse" href="#navbar-vertical" style="height: 65px; padding: 0 30px;">
                    <h6 class="text-dark m-0"><i class="fa fa-bars mr-2"></i>Categories</h6>
                    <i class="fa fa-angle-down text-dark"></i>
                </a>
                <nav class="collapse position-absolute navbar navbar-vertical navbar-light align-items-start p-0 bg-light" id="navbar-vertical" style="width: calc(100% - 30px); z-index: 999;">
                    <div class="navbar-nav w-100">
                        <div class="nav-item dropdown dropright">
                            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Dresses <i class="fa fa-angle-right float-right mt-1"></i></a>
                            <div class="dropdown-menu position-absolute rounded-0 border-0 m-0">
                                <a href="" class="dropdown-item">Men's Dresses</a>
                                <a href="" class="dropdown-item">Women's Dresses</a>
                                <a href="" class="dropdown-item">Baby's Dresses</a>
                            </div>
                        </div>
                        <a href="" class="nav-item nav-link">Shirts</a>
                        <a href="" class="nav-item nav-link">Jeans</a>
                        <a href="" class="nav-item nav-link">Swimwear</a>
                        <a href="" class="nav-item nav-link">Sleepwear</a>
                        <a href="" class="nav-item nav-link">Sportswear</a>
                        <a href="" class="nav-item nav-link">Jumpsuits</a>
                        <a href="" class="nav-item nav-link">Blazers</a>
                        <a href="" class="nav-item nav-link">Jackets</a>
                        <a href="" class="nav-item nav-link">Shoes</a>
                    </div>
                </nav>
            </div>
            <div class="col-lg-9">
                <nav class="navbar navbar-expand-lg bg-dark navbar-dark py-3 py-lg-0 px-0">
                    <a href="./" class="text-decoration-none d-block d-lg-none">
                        <image id=logo src=logo.png></image>
                        <span class="h1 text-uppercase text-dark bg-light px-2">E-</span>
                        <span class="h1 text-uppercase text-light bg-primary px-2 ml-n1">People</span>
                    </a>
                    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                        <div class="navbar-nav mr-auto py-0">
                            <a href="index.php" class="nav-item nav-link">Home</a>
                            <a href="shop.php" class="nav-item nav-link">Shop</a>
                            <a href="detail.php" class="nav-item nav-link">Shop Detail</a>
                            <a href="cart.php"class="nav-item nav-link">Shopping Cart</a>
                            <a href="checkout.php" class="nav-item nav-link">Checkout</a>
                            <a href="contact.php" class="nav-item nav-link">Contact</a>
                            <a href="admin.php" class="nav-item nav-link">Admin</a>
                            <a href="analysis.php" class="nav-item nav-link">Analysis</a>

                            <!--<a href="Favorite.php" class="nav-item nav-link">Favorite</a>-->
                        </div>
                        <div class="navbar-nav ml-auto py-0 d-none d-lg-block">
                            <!--<a href="" class="btn px-0">
                                <i class="fas fa-heart text-primary"></i>
                                <span class="badge text-secondary border border-secondary rounded-circle" style="padding-bottom: 2px;">0</span>
                            </a>-->
                            <a href="" class="btn px-0 ml-3">
                                <i class="fas fa-shopping-cart text-primary"></i>
                                <span class="cartCount badge text-secondary border border-secondary rounded-circle" style="padding-bottom: 2px;">0</span>
                            </a>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </div>

    <script src="js/main.js"  type="text/javascript">></script>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script>
    function createCookie(name, value, days) {
            if (days) {
                var date = new Date();
                date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
                var expires = "; expires=" + date.toGMTString();
            }
            else var expires = "";               
        
            document.cookie = name + "=" + value + expires + "; path=/";
        }
        
        function readCookie(name) {
            var nameEQ = name + "=";
            var ca = document.cookie.split(';');
            for (var i = 0; i < ca.length; i++) {
                var c = ca[i];
                while (c.charAt(0) == ' ') c = c.substring(1, c.length);
                if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length, c.length);
            }
            return null;
        }
        
        function eraseCookie(name) {
            createCookie(name, "", -1);
        }
$( document ).ready(function() {        
   // if((readCookie('productArray')!=null) $('.cartCount').html(JSON.parse(readCookie('productArray')).length)
try{
   document.getElementsByClassName("cartCount")[0].innerHTML=JSON.parse(readCookie('productArray')).length
document.getElementsByClassName("cartCount")[1].innerHTML=JSON.parse(readCookie('productArray')).length
}catch{}

$('.product-action a:first-child').click(function(){
id=$(this).parent().parent().find('img').attr('src')
id=id.slice(10,id.length-4)
if(readCookie('productArray')==null){
createCookie('productArray','['+id+']',1)
}else{
products=JSON.parse(readCookie('productArray'))
products.push(id)
createCookie('productArray','['+products.toString()+']',1)
}
popup('Successfully added to cart')
})

$('.product-action a:first-child').click(function(){$('.cartCount').html(JSON.parse(readCookie('productArray')).length)})
       
$('.product-action a:nth-child(4)').click(function(){
      console.log('clicked')
      id=$(this).parent().parent().find('img').attr('src')
      window.location.href='detail.php#'+id.slice(10,id.length-4)
  })

})
        function popup(msg) {
    if ($('#popupbox').is(':visible')) { $('#popupbox').slideToggle() }
    $('#popupmsg').html(msg)
    $('#popupbox').slideToggle().delay(1000 * 5).slideToggle()
  }//popup
 


    </script>
    <!-- Navbar End -->