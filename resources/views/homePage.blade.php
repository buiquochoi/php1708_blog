<h1>List Post</h1>
<a href="{{route('home')}}">Ve Trang Chu</a>
<?php foreach ($posts as $post ): ?>
	<p><b>{{$post['title']}}</b></p>
	
	<img src="{{$post['img']}}" alt="">
	<p>{{$post['content']}}</p>
	<small>{{$post['author']}}</small>
	

<?php endforeach ?>
<a href="{{route('home')}}">Ve Trang Chu</a>
