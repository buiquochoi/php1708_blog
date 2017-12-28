@extends('layouts.admin')

@section('content')
<h2>Thêm mới bài viết</h2>
<div class="col-md-8 col-md-offset-2">
	<form action="{{ route('posts.update', $post->id) }}" method="post" id="formPost" enctype="multipart/form-data">
		{!!csrf_field()!!}
		<div class="form-group">
			<label for="title">Tên bài viết</label>
			<input type="text" name="title" value="{{$post->title}}" class="form-control" placeholder="Title" id="title" onkeyup="generateSlug()">
			@if ($errors->has('title'))
				{{-- expr --}}
				<span style="color: red;">{{$errors->first('title')}}</span>
			@endif
		</div>
		<div class="form-group">
			<label for="">Đường dẫn</label>
			<input type="text" name="slug" value="{{$post->slug}}" class="form-control" placeholder="URL....." id="slug">
			@if ($errors->has('slug'))
				{{-- expr --}}
				<span style="color: red;">{{$errors->first('slug')}}</span>
			@endif  
		</div>
		<div class="form-group">
			<label for="">Ảnh đại diện</label>
			<input type="file" name="featured" class="form-control">
			@if ($errors->has('featured'))
				{{-- expr --}}
				<span style="color: red;">{{$errors->first('featured')}}</span>
			@endif
		</div>
		<div class="form-group">
			<label for="">Nội dung bài viết</label>
			<textarea name="content" cols="30" rows="20" class="form-control">{!!$post->content!!}</textarea>
			@if ($errors->has('content'))
				{{-- expr --}}
				<span style="color: red;">{{$errors->first('content')}}</span>
			@endif
		</div>
		<div class="form-group">
			<label for="">Danh mục</label>
			<select name="category_id">
				@foreach ($categories as $category)
				{{-- expr --}}
				<option  value="{{$category->id}}"
				@if ($post->category_id == $category->id) 
					selected
				@endif>  	
				{{$category->name}}</option>
				@endforeach
			</select>	
		</div>
		<button class="btn btn-success" type="submit">Thêm mới</button>
	</form>	
</div>
@endsection

@section('js')
<script >
	$(document).ready(function() {
		$('#formPost').validate({
			rules: {
				title: {
					required: true,
					minlength: 6
				},
				slug: {
					required: true
				},
				content: {
					required: true,
					minlength: 20
				}
			},
			messages: {
				title: {
					required: "<span style='color: red;'>Ô này không được để trống!</span>"
				},
				slug: {
					required: "<span style='color: red;'>Ô này không được để trống!</span>"
				},
				content: {
					required: "<span style='color: red;'>Nội dung không được để trống</span>",
					minlength: "<span style='color: red;'>Nội dung quá ngắn</span>"
				}
			}
		});
	});

	function generateSlug(){
		var title;
		var slug;
		
	    //Lấy text từ thẻ input title 
	    title = document.getElementById("title").value;
	    
	    //Đổi chữ hoa thành chữ thường
	    slug = title.toLowerCase();
	    
	    //Đổi ký tự có dấu thành không dấu
	    slug = slug.replace(/á|à|ả|ạ|ã|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ/gi, 'a');
	    slug = slug.replace(/é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ/gi, 'e');
	    slug = slug.replace(/i|í|ì|ỉ|ĩ|ị/gi, 'i');
	    slug = slug.replace(/ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ/gi, 'o');
	    slug = slug.replace(/ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự/gi, 'u');
	    slug = slug.replace(/ý|ỳ|ỷ|ỹ|ỵ/gi, 'y');
	    slug = slug.replace(/đ/gi, 'd');
	    //Xóa các ký tự đặt biệt
	    slug = slug.replace(/\`|\~|\!|\@|\#|\||\$|\%|\^|\&|\*||∣|\+|\=|\,|\.|\/|\?|\>|\<|\'|\"|\:|\;|_/gi, '');
	    //Đổi khoảng trắng thành ký tự gạch ngang
	    slug = slug.replace(/ /gi, "-");
	    //Đổi nhiều ký tự gạch ngang liên tiếp thành 1 ký tự gạch ngang
	    //Phòng trường hợp người nhập vào quá nhiều ký tự trắng
	    slug = slug.replace(/\-\-\-\-\-/gi, '-');
	    slug = slug.replace(/\-\-\-\-/gi, '-');
	    slug = slug.replace(/\-\-\-/gi, '-');
	    slug = slug.replace(/\-\-/gi, '-');
	    //Xóa các ký tự gạch ngang ở đầu và cuối
	    slug = '@' + slug + '@';
	    slug = slug.replace(/\@\-|\-\@|\@/gi, '')+'.html';
	    //In slug ra textbox có id “slug”
	    document.getElementById('slug').value = slug;
	}
</script>
<script>
	jQuery(document).ready(function ($) {
        // CKEDITOR.replace('featured');
        CKEDITOR.replace('content', {
            filebrowserBrowseUrl: '{!! asset('plugins/ckfinder/ckfinder.html') !!}',
            filebrowserImageBrowseUrl: '{!! asset('plugins/ckfinder/ckfinder.html?type=Images') !!}',
            filebrowserFlashBrowseUrl: '{!! asset('plugins/ckfinder/ckfinder.html?type=Flash') !!}',
            filebrowserUploadUrl: '{!! asset('plugins/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files') !!}',
            filebrowserImageUploadUrl: '{!! asset('plugins/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images') !!}',
            filebrowserFlashUploadUrl: '{!! asset('plugins/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash') !!}'
        });
    });
</script>
@endsection