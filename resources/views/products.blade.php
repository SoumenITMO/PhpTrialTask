<html>
    <head>
        <title>Trial Task</title>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
		<link rel="stylesheet" href="{{ URL::asset('/css/style.css') }}" crossorigin="anonymous">
		
		<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
		
    </head>
	
	<style>
		.container
		{
			margin: 43px;
			width: 40%;
		}
	</style>
    <body>

		<div class="container">
			<ul class="list-group">
				<li class="list-group-item">Cras justo odio</li>
				<li class="list-group-item">Dapibus ac facilisis in</li>
				<li class="list-group-item">Morbi leo risus</li>
				<li class="list-group-item">Porta ac consectetur ac</li>
				<li class="list-group-item">Vestibulum at eros</li>
			</ul>
		</div>
	</body>
</html>	


<script>
$(document).ready(function()
{
	$.ajax({
			url: "http://localhost/tphp/testwork/public/api/getproducts",
			type: 'GET',
			dataType: 'json', 
			success: function(result)
			{
				console.log(result);
			}
		}
	);	
});

</script>

