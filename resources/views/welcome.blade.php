<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from hotflix.volkovdesign.com/main/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 04 Mar 2023 21:01:00 GMT -->
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- CSS -->
	<link rel="stylesheet" href="{{ asset('css/bootstrap-reboot.min.css') }}">
	<link rel="stylesheet" href="{{ asset('css/bootstrap-grid.min.css') }}">
	<link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css') }}">
	<link rel="stylesheet" href="{{ asset('css/jquery.mCustomScrollbar.min.css') }}">
	<link rel="stylesheet" href="{{ asset('css/nouislider.min.css') }}">
	<link rel="stylesheet" href="{{ asset('css/ionicons.min.css') }}">
	<link rel="stylesheet" href="{{ asset('css/magnific-popup.css') }}">
	<link rel="stylesheet" href="{{ asset('css/plyr.css') }}">
	<link rel="stylesheet" href="{{ asset('css/photoswipe.css') }}">
	<link rel="stylesheet" href="{{ asset('css/default-skin.css') }}">
	<link rel="stylesheet" href="{{ asset('css/main.css') }}">

	<!-- Favicons -->
	<link rel="icon" type="image/png" href="icon/favicon-32x32.png" sizes="32x32">
	<link rel="apple-touch-icon" href="icon/favicon-32x32.png">

	<meta name="description" content="">
	<meta name="keywords" content="">
	<meta name="author" content="">
	<title></title>
</head>
<style>
   .paginator__item:hover a {
  color: white;
}

    .pagination{
        display: flex;
    }
    .page-item{
        color: white;
    }
    .page-item:hover{
        color: #f9ab00;
    }
    .page-item.active{
        color: #f9ab00;
        width: 40px;
        display: flex;
        justify-content: center;
        align-items: center;
        background-color: #222028;;
        padding: 1px;
    }
</style>
<body class="body">
	<!-- header -->
    @auth
    <header class="header">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="header__content">
						<!-- header logo -->
						<a href="/" class="header__logo">
							<img src="{{asset('img/logo.svg')}}" alt="">
						</a>
						<!-- end header logo -->




						</ul>
						<!-- end header nav -->

						<!-- header auth -->
						<div class="header__auth">
                            <form action="/" class="header__search">
								<input class="header__search-input" type="text" placeholder="Search..." name="search">
								<button class="header__search-button" type="submit">
									<i class="icon ion-ios-search"></i>
								</button>
								<button class="header__search-close" type="button">
									<i class="icon ion-md-close"></i>
								</button>
							</form>

							<button class="header__search-btn" type="button">
								<i class="icon ion-ios-search"></i>
							</button>

							<!-- dropdown -->

							<!-- end dropdown -->

							<h2 style="color:white"> {{Auth::user()->name}}</h2>
                            <a href="{{route('logoutt')}}" class="header__sign-in">
								<i class="icon ion-ios-log-in"></i>
								<span>logout</span>
							</a>
						</div>
						<!-- end header auth -->

						<!-- header menu btn -->
						<button class="header__btn" type="button">
							<span></span>
							<span></span>
							<span></span>
						</button>
						<!-- end header menu btn -->
					</div>
				</div>
			</div>
		</div>
	</header>
    @else
    	<header class="header">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="header__content">
						<!-- header logo -->
						<a href="/" class="header__logo">
							<img src="img/logo.svg" alt="">
						</a>
						<!-- end header logo -->




						</ul>
						<!-- end header nav -->

						<!-- header auth -->
						<div class="header__auth">
							<form action="/" class="header__search">
								<input class="header__search-input" type="text" placeholder="Search..." name="search">
								<button class="header__search-button" type="submit">
									<i class="icon ion-ios-search"></i>
								</button>
								<button class="header__search-close" type="button">
									<i class="icon ion-md-close"></i>
								</button>
							</form>

							<button class="header__search-btn" type="button">
								<i class="icon ion-ios-search"></i>
							</button>

							<!-- dropdown -->

							<!-- end dropdown -->

							<a href="{{route('login')}}" class="header__sign-in">
								<i class="icon ion-ios-log-in"></i>
								<span>sign in</span>
							</a>
                            <a href="/register" class="header__sign-in">
								<i class="icon ion-ios-log-in"></i>
								<span>register</span>
							</a>
						</div>
						<!-- end header auth -->

						<!-- header menu btn -->
						<button class="header__btn" type="button">
							<span></span>
							<span></span>
							<span></span>
						</button>
						<!-- end header menu btn -->
					</div>
				</div>
			</div>
		</div>
	</header>
    @endauth

	<!-- end header -->

	<!-- home -->	<section class="home">
		<!-- home bg -->
		<div class="owl-carousel home__bg">
			<div class="item home__cover" data-bg="img/home/home__bg.jpg"></div>
			<div class="item home__cover" data-bg="img/home/home__bg2.jpg"></div>
			<div class="item home__cover" data-bg="img/home/home__bg3.jpg"></div>
			<div class="item home__cover" data-bg="img/home/home__bg4.jpg"></div>
			<div class="item home__cover" data-bg="img/home/home__bg5.jpg"></div>
		</div>
		<!-- end home bg -->

		<div class="container">
			<div class="row">

				<div class="col-12">
					<h1 class="home__title"><b>NEW ITEMS</b> OF THIS SEASON</h1>

					<button class="home__nav home__nav--prev" type="button">
						<i class="icon ion-ios-arrow-round-back"></i>
					</button>
					<button class="home__nav home__nav--next" type="button">
						<i class="icon ion-ios-arrow-round-forward"></i>
					</button>
				</div>

				<div class="col-12">
					<div class="owl-carousel home__carousel home__carousel--bg">
						@foreach ($filmslimts as $film)
						<div class="card card--big">
							<div class="card__cover">
								<img src="{{asset('/movieimg.png')}}" alt="">
								<a href="{{route('details',[$film['movieId']])}}" class="card__play">
									<i class="icon ion-ios-play"></i>
								</a>
								<span class="card__rate card__rate--green">{{$film['rating']}}</span>
							</div>
							<div class="card__content">
								<h3 class="card__title"><a href="{{route('details',[$film['movieId']])}}">{{preg_replace("/\((\d+)\)/", '', $film->title)}}</a></h3>
								<span class="card__category">
                                    @foreach (explode("|",$film->genres) as $item)


                                    <a href="/?category={{$item}}">{{$item}}</a>


									@endforeach
								</span>
							</div>
						</div>

						@endforeach

					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- end home -->
	<!-- filter -->
	<div class="filter">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="filter__content">

                        	<div class="filter__items">
							<!-- filter item -->
							<div class="filter__item" id="filter__genre">
								<span class="filter__item-label">GENRE:</span>

								<div class="filter__item-btn dropdown-toggle" role="navigation" id="filter-genre" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									<input type="button" value="Action/Adventure">
									<span></span>
								</div>

								<ul class="filter__item-menu dropdown-menu scrollbar-dropdown" aria-labelledby="filter-genre">
									<li>Action/Adventure</li>
									<li>Animals</li>
									<li>Animation</li>
									<li>Biography</li>
									<li>Comedy</li>
									<li>Cooking</li>
									<li>Dance</li>
									<li>Documentary</li>
									<li>Drama</li>
									<li>Education</li>
									<li>Entertainment</li>
									<li>Family</li>
									<li>Fantasy</li>
									<li>History</li>
									<li>Horror</li>
									<li>Independent</li>
									<li>International</li>
									<li>Kids</li>
									<li>Kids & Family</li>
									<li>Medical</li>
									<li>Military/War</li>
									<li>Music</li>
									<li>Musical</li>
									<li>Mystery/Crime</li>
									<li>Nature</li>
									<li>Paranormal</li>
									<li>Politics</li>
									<li>Racing</li>
									<li>Romance</li>
									<li>Sci-Fi/Horror</li>
									<li>Science</li>
									<li>Science Fiction</li>
									<li>Science/Nature</li>
									<li>Spanish</li>
									<li>Travel</li>
									<li>Western</li>
								</ul>
							</div>
							<!-- end filter item -->

							<!-- filter item -->
							<div class="filter__item" id="filter__quality">
								<span class="filter__item-label">QUALITY:</span>

								<div class="filter__item-btn dropdown-toggle" role="navigation" id="filter-quality" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									<input type="button" value="HD 1080">
									<span></span>
								</div>

								<ul class="filter__item-menu dropdown-menu scrollbar-dropdown" aria-labelledby="filter-quality">
									<li>HD 1080</li>
									<li>HD 720</li>
									<li>DVD</li>
									<li>TS</li>
								</ul>
							</div>
							<!-- end filter item -->

							<!-- filter item -->
							<div class="filter__item" id="filter__rate">
								<span class="filter__item-label">RATING:</span>

								<div class="filter__item-btn dropdown-toggle" role="button" id="filter-rate" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									<div class="filter__range">
										<div id="filter__imbd-start"></div>
										<div id="filter__imbd-end"></div>
									</div>
									<span></span>
								</div>

								<div class="filter__item-menu filter__item-menu--range dropdown-menu" aria-labelledby="filter-rate">
									<div id="filter__imbd"></div>
								</div>
							</div>
							<!-- end filter item -->

							<!-- filter item -->
							<div class="filter__item" id="filter__year">
								<span class="filter__item-label">RELEASE YEAR:</span>

								<div class="filter__item-btn dropdown-toggle" role="button" id="filter-year" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									<div class="filter__range">
										<div id="filter__years-start"></div>
										<div id="filter__years-end"></div>
									</div>
									<span></span>
								</div>

								<div class="filter__item-menu filter__item-menu--range dropdown-menu" aria-labelledby="filter-year">
									<div id="filter__years"></div>
								</div>
							</div>
							<!-- end filter item -->
						</div>

						<!-- filter btn -->
						<button class="filter__btn" >apply filter</button>
						<!-- end filter btn -->


					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end filter -->

	<!-- catalog -->
	<div class="catalog">
		<div class="container">
			<div class="row row--grid">
@foreach ($films as $film)


				<!-- card -->
				<div class="col-6 col-sm-4 col-md-3 col-xl-2">
					<div class="card">
						<div class="card__cover">
							<img src="{{asset('/movieimg.png')}}" alt="">
							<a href="{{route('details',[$film->movieId])}}" class="card__play">
								<i class="icon ion-ios-play"></i>
							</a>
							<span class="card__rate card__rate--green">{{$film->rating}}</span>
						</div>
						<div class="card__content">
							<h3 class="card__title"><a href="{{route('details',[$film->movieId])}}">{{preg_replace("/\((\d+)\)/", '', $film->title)}}</a></h3>
							<span class="card__category">
                                @foreach (explode("|",$film->genres) as $item)


                                <a href="/?category={{$item}}">{{$item}}</a>


                                @endforeach


							</span>
						</div>
					</div>
				</div>
				<!-- end card -->

				@endforeach

			</div>

			<div class="row">
				<!-- paginator -->
				<div class="col-12">
					<ul class=" d-flex justify-content-between w-80 mx-auto">
                      <li class="paginator__item ">{{$films->links()}}</li>
						{{-- <li class="paginator__item paginator__item--prev">
							<a href="#"><i class="icon ion-ios-arrow-back"></i></a>
						</li>
						<li class="paginator__item"><a href="#">1</a></li>
						<li class="paginator__item paginator__item--active"><a href="#">2</a></li>
						<li class="paginator__item"><a href="#">3</a></li>
						<li class="paginator__item"><a href="#">4</a></li>
						<li class="paginator__item paginator__item--next">
							<a href="#"><i class="icon ion-ios-arrow-forward"></i></a>
						</li> --}}
					</ul>
				</div>
				<!-- end paginator -->
			</div>
		</div>
	</div>
	<!-- end catalog -->
	<!-- footer -->
	<footer class="footer">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="footer__content">
						<a href="/" class="footer__logo">
							<img src="img/logo.svg" alt="">
						</a>


						<nav class="footer__nav">
							<a href="about.html">About Us</a>
							<a href="contacts.html">Contacts</a>
							<a href="privacy.html">Privacy policy</a>
						</nav>

						<button class="footer__back" type="button">
							<i class="icon ion-ios-arrow-round-up"></i>
						</button>
					</div>
				</div>
			</div>
		</div>
	</footer>
	<!-- end footer -->

	<!-- JS -->
	<script src="{{ asset('js/jquery-3.5.1.min.js') }}"></script>
	<script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
	<script src="{{ asset('js/owl.carousel.min.js') }}"></script>
	<script src="{{ asset('js/jquery.magnific-popup.min.js') }}"></script>
	<script src="{{ asset('js/jquery.mousewheel.min.js') }}"></script>
	<script src="{{ asset('js/jquery.mCustomScrollbar.min.js') }}"></script>
	<script src="{{ asset('js/wNumb.js') }}"></script>
	<script src="{{ asset('js/nouislider.min.js') }}"></script>
	<script src="{{ asset('js/plyr.min.js') }}"></script>
	<script src="{{ asset('js/photoswipe.min.js') }}"></script>
	<script src="{{ asset('js/photoswipe-ui-default.min.js') }}"></script>
	<script src="{{ asset('js/main.js') }}"></script>
</body>

<!-- Mirrored from hotflix.volkovdesign.com/main/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 04 Mar 2023 21:06:19 GMT -->
</html>
