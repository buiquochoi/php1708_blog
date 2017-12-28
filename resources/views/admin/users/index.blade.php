@extends('layouts.admin')
@section('header')
	<h1>User Admin</h1>
@endsection

@section('content')
	<h3>Thêm mới Quản trị viên</h3>
	@if(session()->has('notif'))
		<div class="alert alert-danger">{{session()->get('notif')}}</div>
	@endif
	<table class="table table-bordered">
		<thread>
			<tr>
				<th>#</th>
				<th>Tên</th>
				<th>Email</th>
				<th>Quyền</th>
				<th><a href="{{ route('users.create') }}" class="btn btn-success"><i class="fa fa-plus "></i>Thêm</a></th>
			</tr>
		</thread>
		<tbody>
			@foreach ($users as $user)
				<tr>
					<td>{{$loop->iteration}}</td>
					<td>{{$user->name}}</td>
					<td>{{$user->email}}</td>
					<td>{{$user->getRoleName()}}</td>
					<td>
						{{-- @if ($user->role<40 || ($user->role>=40 && Auth::user()->role >=40)) --}}
							{{-- expr --}}
							<a href="{{ route('users.edit', ['id' => $user->id]) }}" class="btn btn-warning"><i class="fa fa-edit"></i></a>
							<a href="javascript:;" onclick="confirmRemove('{{ route('users.destroy', ['id'=>$user->id])}}')" class="btn btn-danger"><i class="fa fa-times"></i></a>
						{{-- @endif --}}

					</td>
				</tr>
				{{-- expr --}}
			@endforeach
		</tbody>
	</table>
@endsection

@section('js')
	{{-- expr --}}
	<script>
		function confirmRemove(url){
			bootbox.confirm({
				message: "Do you want to remove User? Yes or No",
				buttons: {
					confirm: {
						label: 'Yes',
						className: 'btn-success'
					},
					cancel: {
						label: 'No',
						className: 'btn-danger'
					}
				},
				callback: function(result){
					if (result){
						window.location.href = url;
					};
				}
			});
		}
	</script>
@endsection