<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Upload File</title>
	<!-- Latest compiled and minified CSS & JS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
	<script src="//code.jquery.com/jquery.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
</head>
<body>
	<div class="container">
		<div class="col-sm-6 col-sm-offset-3">
			<form action="{{ route('file.save') }}" method="post" enctype="multipart/form-data">
				{!!csrf_field()!!}
				<div class="form-group">
					<label for="">UserName</label>
					<input class="form-control" type="text" name="username">
					@if ($errors->has('username'))
						{{-- expr --}}
						{{$errors->first('username')}}
					@endif
				</div>	
				<div class="form-group">
					<label for="">UserName</label>
					<input class="form-control" type="file" name="image">
					@if ($errors->has('image'))
						{{-- expr --}}
						{{$errors->first('image')}}
					@endif
				</div>
				<button class="btn btn-success" type="submit">Up</button>
			</form>
		</div>
	</div>
</body>
</html>