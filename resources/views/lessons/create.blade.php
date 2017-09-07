<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title></title>
	<!-- Latest compiled and minified CSS & JS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
	<script src="//code.jquery.com/jquery.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
</head>
<body>
	<div class="container">
		<div class="col-md-offset-3 col-md-8">
			<form action="{{ route('lessons.store') }}" method="POST">
			{{ csrf_field() }}
				<div class="form-group">
					<input type="text" name="title" class="form-control">
					<input type="text" name="body" class="form-control">
					<input type="radio" name="some_bool" value="1">True
					<input type="radio" name="some_bool" value="0">False
					<button class="btn btn-primary">Save</button>
				</div>
			</form>
		</div>
	</div>
</body>
</html>
