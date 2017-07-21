<!DOCTYPE html>
<html>
<head>
	<title>Test Page</title>
</head>
<body>
	<div class='container'>
		<p>Add New Site</p>
		<form method='post' action='/api/sites'>

			<input type='text' name='name' id='name' placeholder="Name New Site">
			<input type="text" name="address" id="address"placeholder="address">
			<input type="text" name="abbreviation" id="abbreviation" placeholder="abbreviation">
			<input type="text" name="site_contact" id="site_contact" placeholder="contact">
			<button class='btn btn-primary' type='submit'>Submit</button>
		</form>
		<p>Edit records test</p>
		@foreach ($sites as $site)
			
			<form style="padding-top: 5px; display: inline-block;" method='post' action="/api/sites/{{ $site['id'] }}">
				{{ method_field('PUT')}}
				<input name="id" value="{{ $site['id'] }}" type='hidden'>
				<input type='text' name='name' id='name' value="{{ $site['name'] }}">
				<input type="text" name="address" id="address" value="{{ $site['address'] }}">
				<input type="text" name="abbreviation" id="abbreviation" value="{{ $site['abbreviation'] }}">
				<input type="text" name="site_contact" id="site_contact" value="{{ $site['site_contact'] }}">
				<button class='btn btn-primary' type='submit'>Edit</button>
				
			</form>
			<form style="padding-top: 5px; display: inline-block;" method='post' action="/api/sites/{{ $site['id'] }}">
				{{ method_field('DELETE') }}
				<button class='btn btn-primary' type='submit'>Delete</button>
			</form>
		@endforeach
	</div>

</body>
</html>