<!DOCTYPE html>
<html>
<head>
	<title>Test Page</title>
</head>
<body>
	<div class='container'>
		<p>Add New Subnet</p>
		<form method='post' action='/api/subnets'>

			<input type='text' name='name' id='name' placeholder="Name New Subnet">
            <input type='text' name='site_id' id='site_id' placeholder="Site ID">
			<input type="text" name="subnet_address" id="subnet_address" placeholder="Subnet Address">
			<input type="text" name="mask_bits" id="mask_bits" placeholder="Mask Bits">
			<input type="text" name="vLan" id="vLan" placeholder="vLan">
			<button class='btn btn-primary' type='submit'>Submit</button>
		</form>
		<p>Edit records test</p>
		@foreach ($subnets as $subnet)
			
			<form style="padding-top: 5px; display: inline-block;" method='post' action="/api/subnets/{{ $subnet['id'] }}">
				{{ method_field('PUT')}}
				<input name="id" value="{{ $subnet['id'] }}" type='hidden'>
				<input type='text' name='name' id='name' value="{{ $subnet['name'] }}">
				<input type='text' name='site_id' id='site_id' value="{{ $subnet['site_id'] }}">
				<input type="text" name="subnet_address" id="subnet_address" value="{{ $subnet['subnet_address'] }}">
				<input type="text" name="mask_bits" id="mask_bits" value="{{ $subnet['mask_bits'] }}">
				<input type="text" name="vLan" id="vLan" value="{{ $subnet['vLan'] }}">
				<button class='btn btn-primary' type='submit'>Edit</button>
				
			</form>
			<form style="padding-top: 5px; display: inline-block;" method='post' action="/api/subnets/{{ $subnet['id'] }}">
				{{ method_field('DELETE') }}
				<button class='btn btn-primary' type='submit'>Delete</button>
			</form>
		@endforeach
	</div>

</body>
</html>