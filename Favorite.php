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

<?php
// 每页显示的产品数量
$per_page = 5;

$json_file = 'product_favorite.json';
$products = json_decode(file_get_contents($json_file), true)['products'];

// 处理删除操作
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['favorite'])) {
    $favorite_id = $_POST['favorite'];
    $index = array_search($favorite_id, array_column($products, 'id'));
    if ($index !== false) {
        array_splice($products, $index, 1);
        file_put_contents($json_file, json_encode(['products' => $products], JSON_PRETTY_PRINT));
        $success_message = 'Product has been removed from favorites';
    }
}

// 计算总页数
$total_pages = ceil(count($products) / $per_page);

// 获取当前页码，默认为第一页
$current_page = isset($_GET['page']) ? $_GET['page'] : 1;
$current_page = max(1, min($total_pages, $current_page));

// 筛选出需要显示的产品
$start = ($current_page - 1) * $per_page;
$products_to_show = array_slice($products, $start, $per_page);

?>

<style>
    .product {
        display: flex;
        flex-wrap: wrap;
        align-items: center;
        margin-bottom: 1em;
    }
    .product img {
        max-width: 100px;
        height: auto;
        margin-left: 15em;
        margin-right: 2em;
    }
    .product h3,
    .product p {
        margin: 0;
    }
    .product-text {
        display: flex;
        flex-direction: column;
        flex-grow: 1;
    }
    .product-text h3,
    .product-text p {
        margin: 0;
    }
    .product-text p:first-of-type {
        margin-bottom: 0.5em;
    }
    .pagination {
        margin-top: 1em;
        display: flex;
        justify-content: center;
    }
    .pagination a {
        margin: 0 0.5em;
    }
    .pagination span {
        margin: 0 0.5em;
        color: #aaa;
    }
    .success-message {
        display: none;
        margin: 1em 0;
        padding: 0.5em;
        border: 1px solid #0c0;
        background-color: #cfc;
    }
</style>

<!-- 显示产品列表 -->
<?php foreach ($products_to_show as $product) { ?>
    <div class="product">
        <img src="<?php echo $product['image']; ?>" alt="<?php echo $product['name']; ?>">
        <div class="product-text">
            <h3 style="display:inline-block;"><?php echo $product['name']; ?></h3>
          <p style="display:inline-block;">Price: $<?php echo number_format($product['price'], 2); ?>, Added on: <?php echo $product['date']; ?></p>
<form method="post">
<input type="hidden" name="favorite" value="<?php echo $product['id']; ?>">
<button type="submit">Remove from favorites</button>
</form>
</div>
</div>

<?php } ?>
<!-- 显示分页链接 -->
<div class="pagination">
    <?php if ($current_page > 1) { ?>
        <a href="?page=<?php echo $current_page - 1; ?>">Prev</a>
    <?php } else { ?>
        <span>Prev</span>
    <?php } ?>
    <?php for ($i = 1; $i <= $total_pages; $i++) { ?>
    <?php if ($i == $current_page) { ?>
        <span><?php echo $i; ?></span>
    <?php } else { ?>
        <a href="?page=<?php echo $i; ?>"><?php echo $i; ?></a>
    <?php } ?>
<?php } ?>

<?php if ($current_page < $total_pages) { ?>
    <a href="?page=<?php echo $current_page + 1; ?>">Next</a>
<?php } else { ?>
    <span>Next</span>
<?php } ?>
</div>
<!-- 显示成功信息 -->
<?php if (isset($success_message)) { ?>
<div class="success-message"><?php echo $success_message; ?></div>
<?php } ?>


                               
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