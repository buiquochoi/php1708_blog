@extends('layouts.admin')
@section('title', 'Edit Categories');
@section('box-tit')
	{{-- expr --}}
	Edit Categories
@endsection
@section('content')
	{{-- expr --}}
	<div class="col-md-6 col-md-offset-3">
		<form action="{{ route('users.editSave', $user->id) }}" method="post" id="userForm">
			{!!csrf_field()!!}
			<input type="hidden" value="{{$user->id}}">
			<div class="form-group">
				<label for="">Tên User</label>
				<input type="text" name="name" value="{{$user->name}}" class="form-control" placeholder="Nhập tên user">
				@if ($errors->has('name'))
                    <span class="help-block " style="color: red;">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                @endif
			</div>
			<div class="form-group">
				<label for="">Email</label>
				<input type="text" name="email" value="{{$user->email}}" class="form-control" placeholder="Nhập tên user">
				@if ($errors->has('email'))
                    <span class="help-block " style="color: red;">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
			</div>
			<div class="form-group">
				<select name="role" class="form-control">
					@if (Auth::user()->role >=40)
						{{-- expr --}}
						<option value="40" {{$user->role>=40?'selected':''}} >Supper Admin</option>
					@endif
					<option value="20" {{$user->role==20?'selected':''}} >Admin</option>
					<option value="10" {{$user->role==10?'selected':''}} >Author</option>
				</select>
			</div>
			<button class="btn btn-success col-md-12" type="submit">Edit</button>
		</form>
	</div>
@endsection

@section('js')
	{{-- expr --}}
	<script type="text/javascript">
		$(document).ready(function() {

			$('#pw').click(function(event) {
				/* Act on the event */
				$('#password').toggle();
			});
		});
	</script>
@endsection