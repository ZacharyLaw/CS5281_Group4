<!DOCTYPE html>
<html>
<head>
	<title>jQuery Ajax Demo</title>
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
	<h1>Items List</h1>
	<ul id="items-list"></ul>
	<script>
		$.ajax({
			url: "./items.json",
			method: "GET",
			dataType: "json",
			success: function(data) {
				// Loop through the items and append them to the list
				$.each(data, function(index, item) {
					$("#items-list").append("<li>" + item.Name + " - $" + item.Price + "</li>");
				});
			},
			error: function(jqXHR, textStatus, errorThrown) {
				console.log("Error: " + errorThrown);
			}
		});
	</script>
</body>
</html>
