<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>MultiShop - Online Shop Website Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

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
    <div class="container-fluid">
        <div class="row px-xl-5">
            <div class="col-12">
                <nav class="breadcrumb bg-light mb-30">
                    <a class="breadcrumb-item text-dark" href="#">Home</a>
                    <span class="breadcrumb-item active">Favorite</span>
                </nav>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->

    <!-- Favorite Start -->
<style>
  .product {
    width: 25%;
    padding: 1em;
    box-sizing: border-box;
    float: left;
    text-align: center;
  }
</style>
<?php
// 读取items.json文件中的商品列表
$jsonString = file_get_contents('items.json');
$data = json_decode($jsonString, true);
$items = $data;
?>
<div style="clear: both;">
  <form action="discount2.php" method="post">
    <?php foreach ($items as $item) {
      $price = floatval($item['Price']);
      if (isset($item['Discount'])) {
      $discount = floatval($item['Discount']);
      } else {
      $discount = 0;
      }
       $discountPrice = $price * (1 - $discount / 100);
      ?>
      <div class="product">
        <p><?php echo $item['Name']; ?></p>
        <p>Price: <?php echo '$' . number_format($price, 2); ?></p>
        <p>Discount: <?php echo $discount . '%'; ?></p>
        <p>Discount Price: <?php echo '$' . number_format($discountPrice, 2); ?></p>
        <select name="discounts[<?php echo $item['Id']; ?>]">
          <option value="0">No Discount</option>
          <option value="10">10% off</option>
          <option value="20">20% off</option>
          <option value="30">30% off</option>
          <option value="50">50% off</option>
        </select>
      </div>
    <?php } ?>
    <div style="clear: both;">
      <input type="submit" value="Submit">
    </div>
  </form>
</div>
<?php
// 如果不是POST请求，则不处理
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
  exit;
}
// 读取items.json文件中的商品列表
$jsonString = file_get_contents('items.json');
$data = json_decode($jsonString, true);
$items = $data;

// 读取提交的表单数据，其中折扣比率的名称为discounts，每个下拉列表的名称是一个商品的ID
$discounts = $_POST['discounts'];

// 循环遍历每个商品，将折扣比率写入items.json文件中
foreach ($items as &$item) {
$id = $item['Id'];
if (isset($discounts[$id])) {
$discount = floatval($discounts[$id]);
$item['Discount'] = $discount;
}
}

// 将更新后的商品列表写回items.json文件
$jsonString = json_encode($items, JSON_PRETTY_PRINT);
file_put_contents('items.json', $jsonString);

?>
    <!-- Favorite End -->

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