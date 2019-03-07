@extends('templates.spa.master')
@section('content')
	<div role="main" class="main">

				<section class="page-header page-header-modern bg-color-light-scale-1 page-header-md" style="background-image: linear-gradient(90deg, rgba(2,0,36,0.8) 0%, rgba(67,67,115,0.8) 100%, rgba(0,212,255,0.8) 100%), url(img/bg-1.jpg); background-size: cover; background-position: center;">
					<div class="container">
						<div class="row">

							<div class="col-md-12 align-self-center p-static order-2 text-center">

								<h1 class="text-light font-weight-bold text-8">Trang Blog, mẹo vặt về làm đẹp</h1>
								<span class="sub-title text-light">Bổ sung và cập nhật các mẹo làm đẹp tốt nhất cho các chị em!</span>
							</div>

							<div class="col-md-12 align-self-center order-1">

								<ul class="breadcrumb d-block text-center">
									<li><a href="/">Home</a></li>
									<li><a href="{{ route('spa.news.index') }}">Blog</a></li>
									<li> <a href="{{ route('spa.news.news', $news->cat->name) }}">{{ $news->cat->name }}</a></li>
									<li class="active">{{ $news->title }}</li>
								</ul>
							</div>
						</div>
					</div>
				</section>

				<div class="container py-4" style="background-color: #fff; margin-top:40px;">

					<div class="row">
						@include('templates.spa.blogbar')
						<div class="col-lg-9 order-1">
							<div class="blog-posts single-post">
							
								<article class="post post-large blog-single-post border-0 m-0 p-0">
									<div class="post-image ml-0">
										<a href="">
											<img src="/upload/{{ $news->picture }}" class="img-fluid img-thumbnail img-thumbnail-no-borders rounded-0" alt="{{ $news->title }}" />
										</a>
									</div>
							
									<div class="post-date ml-0">
										<span class="day">{{ date_format($news->updated_at, 'd') }}</span>
										<span class="month">{{ date_format($news->updated_at, 'M') }}</span>
									</div>
							
									<div class="post-content ml-0">
							
										<h2 class="font-weight-bold"><a href="blog-post.html">{{ $news->title }}</a></h2>
							
										<div class="post-meta">
											<span><i class="far fa-folder"></i> <a href="#">{{ $news->cat->name }}</a></span>
										</div>

										<p>{{ $news->description }}</p>
										<p>{!! $news->detail !!} </p>
							
										<div class="post-block mt-4 pt-2 post-author">
											<h4 class="mb-3">Author</h4>
											<div class="img-thumbnail img-thumbnail-no-borders d-block pb-3">
												<a href="blog-post.html">
													<img src="img/avatars/avatar.jpg" alt="">
												</a>
											</div>
											<p><strong class="name"><a href="#" class="text-4 pb-2 pt-2 d-block">John Doe</a></strong></p>
											<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam viverra euismod odio, gravida pellentesque urna varius vitae. Sed dui lorem, adipiscing in adipiscing et, interdum nec metus. Mauris ultricies, justo eu convallis placerat, felis enim ornare nisi, vitae mattis nulla ante id dui. </p>
										</div>														
									</div>
								</article>
							
							</div>
						</div>
					</div>

				</div>

			</div>
@stop