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
// 读取商品信息
$json_file = 'shoplist.json';
$json_data = file_get_contents($json_file);
$products = json_decode($json_data, true)['products'];

// 处理收藏按钮的点击事件
if (isset($_POST['favorite'])) {
    $product_id = $_POST['favorite'];
    // 读取收藏夹信息
    $favorite_file = 'product_favorite.json';
    $favorite_data = file_get_contents($favorite_file);
    $favorite_products = json_decode($favorite_data, true)['products'];
    // 检查是否已经收藏
    $found = false;
    foreach ($favorite_products as $favorite_product) {
        if ($favorite_product['id'] == $product_id) {
            $found = true;
            break;
        }
    }
    if ($found) {
        echo "<script>alert('Product already added to favorites!');</script>";
    } else {
        // 添加到收藏夹
        $product_to_add = null;
        foreach ($products as $product) {
            if ($product['id'] == $product_id) {
                $product_to_add = $product;
                break;
            }
        }
        if ($product_to_add) {
            $favorite_products[] = $product_to_add;
            $favorite_data = json_encode(['products' => $favorite_products], JSON_PRETTY_PRINT);
            file_put_contents($favorite_file, $favorite_data);
        }
    }
}

// 每页显示的产品数量
$per_page = 5;

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
    .favorite-btn {
        margin-left: 1em;
    }
</style>

<!-- 显示产品列表 -->

<?php foreach ($products_to_show as $product) { ?>
<div class="product">
    <img src="<?php echo $product['image']; ?>" alt="<?php echo $product['name']; ?>">
    <div class="product-text">
        <h3 style="display:inline"><?php echo $product['name']; ?></h3>
        <p>a good product</p>
        <p>Price: <?php echo $product['price']; ?></p>
        <form method="POST">
           <button type="submit" class="btn btn-outline-dark favorite-btn" name="favorite" value="<?php echo $product['id']; ?>">
              <i class="far fa-heart"></i> Add to favorites
           </button>
        </form>
    </div>
</div>
<?php } ?>
<!-- 显示分页 -->
<div class="pagination">
    <?php if ($current_page > 1) { ?>
        <a href="?page=<?php echo $current_page - 1; ?>">&laquo; Prev</a>
    <?php } else { ?>
        <span>&laquo; Prev</span>
    <?php } ?>
    <?php for ($i = 1; $i <= $total_pages; $i++) { ?>
        <?php if ($i == $current_page) { ?>
            <span><?php echo $i; ?></span>
        <?php } else { ?>
            <a href="?page=<?php echo $i; ?>"><?php echo $i; ?></a>
        <?php } ?>
    <?php } ?>
    <?php if ($current_page < $total_pages) { ?>
        <a href="?page=<?php echo $current_page + 1; ?>">Next &raquo;</a>
    <?php } else { ?>
        <span>Next &raquo;</span>
    <?php } ?>
</div>
                               
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