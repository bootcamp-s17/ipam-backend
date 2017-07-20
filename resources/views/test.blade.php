<!DOCTYPE html>
<html>
<head>
	<title>Test Page</title>
</head>
<body>
	<div class='container'>
		<form method='post' action='/api/sites'>

			<input type='text' name='name' id='name' placeholder="Name New Site">
			<input type="text" name="address" id="address"placeholder="address">
			<input type="text" name="abbreviation" id="abbreviation" placeholder="abbreviation">
			<input type="text" name="site_contact" id="site_contact" placeholder="contact">
			<button class='btn btn-primary' type='submit'>Submit</button>
		</form>
	</div>
</body>
</html>