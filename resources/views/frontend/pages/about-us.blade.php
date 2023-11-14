@extends('frontend.layouts.master')

@section('title','HappyShop || À propos')

@section('main-content')

	<!-- Breadcrumbs -->
	<div class="breadcrumbs">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="bread-inner">
						<ul class="bread-list">
							<li><a href="index1.html">Accueil<i class="ti-arrow-right"></i></a></li>
							<li class="active"><a href="blog-single.html">À propos de nous</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- Fin Breadcrumbs -->

	<!-- À propos de nous -->
	<section class="about-us section">
			<div class="container">
				<div class="row">
					<div class="col-lg-6 col-12">
						<div class="about-content">
							@php
								$settings=DB::table('settings')->get();
							@endphp
							<h3>Bienvenue à <span>Eshop</span></h3>
							<p>@foreach($settings as $data) {{$data->description}} @endforeach</p>
							<div class="button">
								<a href="{{route('blog')}}" class="btn">Notre blog</a>
								<a href="{{route('contact')}}" class="btn primary">Contactez-nous</a>
							</div>
						</div>
					</div>
					<div class="col-lg-6 col-12">
						<div class="about-img overlay">
							{{-- <div class="button">
								<a href="https://www.youtube.com/watch?v=nh2aYrGMrIE" class="video video-popup mfp-iframe"><i class="fa fa-play"></i></a>
							</div> --}}
							<img src="@foreach($settings as $data) {{$data->photo}} @endforeach" alt="@foreach($settings as $data) {{$data->photo}} @endforeach">
						</div>
					</div>
				</div>
			</div>
	</section>
	<!-- Fin À propos de nous -->


	<!-- Commencer la zone de services de la boutique -->
	<section class="shop-services section">
		<div class="container">
			<div class="row">
				<div class="col-lg-3 col-md-6 col-12">
					<!-- Commencer le service unique -->
					<div class="single-service">
						<i class="ti-rocket"></i>
						<h4>Livraison gratuite</h4>
						<p>Commandes de plus de $100</p>
					</div>
					<!-- Fin du service unique -->
				</div>
				<div class="col-lg-3 col-md-6 col-12">
					<!-- Commencer le service unique -->
					<div class="single-service">
						<i class="ti-reload"></i>
						<h4>Retour gratuit</h4>
						<p>Retours sous 30 jours</p>
					</div>
					<!-- Fin du service unique -->
				</div>
				<div class="col-lg-3 col-md-6 col-12">
					<!-- Commencer le service unique -->
					<div class="single-service">
						<i class="ti-lock"></i>
						<h4>Paiement sécurisé</h4>
						<p>Paiement 100% sécurisé</p>
					</div>
					<!-- Fin du service unique -->
				</div>
				<div class="col-lg-3 col-md-6 col-12">
					<!-- Commencer le service unique -->
					<div class="single-service">
						<i class="ti-tag"></i>
						<h4>Meilleur prix</h4>
						<p>Prix garanti</p>
					</div>
					<!-- Fin du service unique -->
				</div>
			</div>
		</div>
	</section>
	<!-- Fin de la zone de services de la boutique -->

	@include('frontend.layouts.newsletter')
@endsection
