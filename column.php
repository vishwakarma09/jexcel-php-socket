<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Column Sheet</title>

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>
<body>

	<div class="container">
		<div class="row">
			<div class="col-md-10 col-md-offset-1">

				<div class="table-responsive">
					<table class="table-striped table-bordered table-hover ">
						<thead>
							<tr>
								<th>Column 1</th>
								<th>Column 2</th>
								<th>Column 3</th>
								<th>Column 4</th>
								<th>Column 5</th>
								<th>Column 6</th>
								<th>Column 7</th>
								<th>Column 8</th>
								<th>Column 9</th>
								<th>Column 10</th>
							</tr>
						</thead>

						<tbody>
							<?php for($y=0; $y<=99; $y++){ ?>
							<tr>
								<?php for($x=0; $x<=9; $x++){ ?>
								<td><input type="text" data-x="<?php echo $x;?>" data-y="<?php echo $y;?>" class="form-control cell" /></td>
								<?php } ?>
							</tr>
							<?php } ?>
						</tbody>
					</table>
				</div>

			</div>
		</div>
	</div>


	<script>
		var conn = new WebSocket('ws://localhost:8080');
		conn.onopen = function(e) {
			console.log("Connection established!");

			console.log('Loading sheet...');

			$('.cell').each(function(i,d){
				var x = $(d).data('x');
				var y = $(d).data('y');

				var request = {'controller':'sheet','action':'get', 'data':{'x':x,'y':y}};
				conn.send(JSON.stringify(request));
			});
		};

		conn.onmessage = function(e) {
			
			var data = $.parseJSON(e.data);
			console.log(data);

			if (data.controller == 'sheet' && data.action == 'get') {
				$('[data-x='+data.data.x+'][data-y='+data.data.y+']').val(data.data.text);
			}else if (data.controller == 'sheet' && data.action == 'edit') {
				$('[data-x='+data.data.x+'][data-y='+data.data.y+']').val(data.data.text);
			}


		};
		

		$('.cell').change(function(){
			var x = $(this).data('x');
			var y = $(this).data('y');
			var text = $(this).val();

			var request = {'controller':'sheet','action':'edit', 'data':{'x':x,'y':y,'text':text}};
			conn.send(JSON.stringify(request));
		});

		$(document).ready(function(){
			

		});
	</script>

</body>
</html>