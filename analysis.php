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
                    <span class="breadcrumb-item active">Contact</span>
                </nav>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->


    <!-- Contact Start -->
    <div class="container-fluid">
        <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4"><span class="bg-secondary pr-3">Analysis</span></h2>
        <div class="row px-xl-5">
            <div class="col-lg-7 mb-5">
                <div class="contact-form bg-light p-30">
                <canvas id="salesCharttime"></canvas>
                <canvas id="salesChart"></canvas>

                </div>
            </div>
        </div>
    </div>
    <!-- Contact End -->

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
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://d3js.org/d3.v7.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/heatmap.js/build/heatmap.min.js"></script>

    <?php
    // Get transaction data from CSV file
    $data = array_map('str_getcsv', file('./transaction.csv'));
    $timeData = array();
    $salesData = array();
    foreach($data as $row) {
        $timeData[] = $row[0];
        $salesData[] = 1; // Assuming each row represents 1 sale
    }
    ?>
  <?php
      $data = file_get_contents('./transaction.csv', true);
      $rows = explode("\n", $data);
      array_shift($rows);

      $products = array();
      foreach($rows as $row) {
        $cols = str_getcsv($row);
        if(count($cols) < 2) continue; // Skip empty rows
        $quantities = explode("+", $cols[1]);
        foreach($quantities as $quantity) {
          if(!isset($products[$quantity])) {
            $products[$quantity] = 1;
          } else {
            $products[$quantity]++;
          }
        }
      }
      $productNames = array_keys($products);
      $productSales = array_values($products);
    ?>

<script>
		// Get the CSV data using jQuery's AJAX function
        var monthlySales,data,transactions
		$.ajax({
			url: './transaction.csv',
			method: 'GET',
			success: function (data) {
				// Parse the CSV data
				var lines = data.split('\n');
                lines.pop()
                header='Datetime,Products,First Name,Last Name,E-mail,Mobile No,Address Line 1, Address Line 2,Country,City,State,ZIP Code'
				var headers = header.split(',');
				var transactions = [];
				for (var i = 1; i < lines.length; i++) {
					var values = lines[i].split(',');
					var transaction = {};
					for (var j = 0; j < headers.length; j++) {
						transaction[headers[j]] = values[j];
					}
					transactions.push(transaction);
				}
        console.log(lines[2])
				// Group the transactions by month
				monthlySales = {};
				for (var i = 0; i < transactions.length; i++) {
					var datetime = new Date(transactions[i]['Datetime']);
					var year = datetime.getFullYear();
					var month = datetime.getMonth() + 1;
					var key = year + '-' + month;
          monthlySales[key] = 0;
                    if(typeof transactions[i]['Products']!=='undefined'){
                    var quantity = parseInt(transactions[i]['Products'].split('+').length);
                    monthlySales[key] += quantity;
                    }
				}
				// Convert the monthly sales data to Chart.js format
				var labels = [];
				data = [];
				for (var key in monthlySales) {
					labels.push(key);
					data.push(monthlySales[key]);
				}

				// Create the line chart using Chart.js
				var ctx = document.getElementById('salesCharttime').getContext('2d');
				var chart = new Chart(ctx, {
					type: 'line',
					data: {
						labels: labels,
						datasets: [{label: 'Monthly Sales',data:data,fill:false}]
					},
					options: {
					
					}
				});
			}
		});
	</script>

        <script>
             var ctx = document.getElementById('salesChart');
      var salesChart = new Chart(ctx, {
        type: 'bar',
        data: {
          labels: <?php echo json_encode($productNames); ?>,
          datasets: [{
            label: 'Sales per Product',
            data: <?php echo json_encode($productSales); ?>,
            backgroundColor: 'rgba(255, 99, 132, 0.2)',
            borderColor: 'rgba(255, 99, 132, 1)',
            borderWidth: 1
          }]
        },
        options: {
   
        }
      });
            </script>
</body>

</html>