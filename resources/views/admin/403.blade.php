@extends('layouts.admin')
@section('header')
	<h1>Categories List</h1>
@endsection
@section('content')
	<h1>Bạn không có cái quyền gì cả! Hãy liên hệ với Admin</h1>
	Quay lại:<a href="{{ URL::previous()}}">Back</a>
@endsection