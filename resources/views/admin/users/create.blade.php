@extends('layouts.admin')
@section('title', 'Create New Member')
@section('box-tit')
	{{-- expr --}}
	Create New Member
@endsection
@section('content')
	{{-- expr --}}
	<div class="col-md-6 col-md-offset-3">
		<form action="{{ route('users.store') }}" method="post" id="userForm">
			{!!csrf_field()!!}
			<div class="form-group">
				<label for="">Tên User</label>
				<input type="text" name="name" value="{{ old('name')}}" class="form-control" placeholder="Nhập tên user">
				@if ($errors->has('name'))
                    <span class="help-block " style="color: red;">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                @endif
			</div>
			<div class="form-group">
				<label for="">Email</label>
				<input type="text" name="email" value="{{ old('email')}}" class="form-control" placeholder="Nhập email user">
				@if ($errors->has('email'))
                    <span class="help-block " style="color: red;">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
			</div>
			<div class="form-group">
				<label for="">Password</label>
				<input type="password" name="password" id="password" class="form-control" placeholder="Nhập password">
				@if ($errors->has('password'))
                    <span class="help-block " style="color: red;">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
			</div>
			<div class="form-group">
				<label for="">Confirm Password</label>
				<input type="password" name="confirm" class="form-control" placeholder="Xác nhận password">
				@if ($errors->has('password'))
                    <span class="help-block " style="color: red;">
                        <strong>{{ $errors->first('confirm') }}</strong>
                    </span>
                @endif
			</div>
			<div class="form-group">
				<label for="">Quyền</label>
				<select name="role" class="form-control">
					<option value="10">Author</option>
					<option value="20">Admin</option>
					@if (Auth::user()->role >= 40)
						{{-- expr --}}
						<option value="40">Super Admin</option>
					@endif
				</select>
				@if ($errors->has('role'))
                    <span class="help-block " style="color: red;">
                        <strong>{{ $errors->first('role') }}</strong>
                    </span>
                @endif
			</div>

			<button class="btn btn-success col-md-12" type="submit">Create</button>
		</form>
	</div>
@endsection

@section('js')
	{{-- expr --}}
	<script>
		$(document).ready(function() {
			$('#userForm').validate({
				rules: {
					name: {
						required: true,
						minlength: 6
					},
					email: {
						required: true,
						email: true
					},
					password: {
						required: true,
						minlength: 6
					},
					confirm: {
						required: true,
						equalTo: "#password"
					}
				},
				messages: {
					name: {
						required: "Yêu cầu nhập tên!",
						minlength: "Tên ít nhất 6 ký tự!"
					},
					email: {
						required: "Phải nhập email",
						email: "Email này đã có người dùng"
					},
					password: {
						required: "Phải nhập password",
						minlength: "Password có ít nhất 6 ký tự"
					},
					confirm: {
						required: "Phải nhập lại mật khẩu"
					}

				}

			});
		});
	</script>
@endsection