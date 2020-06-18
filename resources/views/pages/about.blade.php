@extends('layouts/app')

@section('title')
    About
@endsection

@section('content')
    <!-- Page Content -->
    <div class="container">

        <!-- Page Heading/Breadcrumbs -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">About
                    <small>TagPanel</small>
                </h1>
                <ol class="breadcrumb">
                    <li><a href="{{ url('/') }}">Home</a></li>
                    <li class="active">About</li>
                </ol>
            </div>
        </div>
        <!-- /.row -->

        <!-- Intro Content -->
        <div class="row">
            <div class="col-md-6">
                <img class="img-responsive" src="https://static.pexels.com/photos/28756/pexels-photo-large.jpg" alt="">
            </div>
            <div class="col-md-6">
                {{--<h2>A propos de TagPanel.com</h2>--}}
                {{--<p>--}}
                    {{--Tagpanel.com est un album de la ville où ses habitats et amis placent les photos de leurs coups de cœur afin d’aider les--}}
                    {{--visiteurs à maximiser leur joie de vivre. Sitôt vous constatez un service /un produit qui vous fait vibrer, vous pouvez--}}
                    {{--prendre sa photo avec votre téléphone, votre tablette, la commentez et l’afficher sur tagpanel.com au profit de tout--}}
                    {{--visiteur.</p>--}}

                <h2>Pourquoi Tagpanel.com?</h2>
                <p>-Par ce que le gens préfèrent voir ce que les autres aiment et non les lire.</p>
                <p>-Par ce que la satisfaction relève des sentiments et qu’il n’y a jamais de mots qui expriment les
                    sentiments.</p>
                <p>-Par ce les gens préfèrent être référés par les amis ou les voisins et non les marchands.</p>
                <p>-Par ce que la photo est le seul langage compris par le monde entier, le plus sincère et très
                difficile à falsifier.</p>

            </div>
        </div>
        <!-- /.row -->

        <div class="row">
            <h2>Que fait Tagpanel.com?</h2>
            <p>
                C’est un moyen amusant d’évaluer et de partager vos expériences avec votre propre
                communauté ou avec celle que vous avez visitée.
            </p>
            <p>
                C’est aussi une source d’inspiration aux gens en train de peaufiner leur choix d’activités, de
                services ou de produits.
            </p>
        </div>
        <div class="row">
            <h2>Que signifie TagPanel.com?</h2>
            <p>
                C’est une combinaison de mot Tag et Panel traduit un panneau des étiquettes.
            </p>
        </div>
        <div class="row">
            <h2>Comment fonctionne Tagpanel.com?</h2>
            <p>
                Il suffit d’adorer une activité, un produit ou un service!! Juste prendre sa photo avec votre
                téléphone, la commenter, évaluer ce que vous ressentez en star (1-5) et afficher directement
                sur le panneau de la communauté qui vous tient à cœur.
            </p>
            <p>
                Ou bien télécharger la photo de votre ordinateur/ tablette, la commenter, évaluer ce que vous
                ressentez en star (1-5) et afficher sur le même panneau.
            </p>
            <p>
                Nous osons croire que plus simple que cela n’existe pas encore!!!
            </p>
            <p>
                La photo que vous affichez sera vue, aimée et partagée par les membres qui visiteront le
                panneau.
            </p>
        </div>
        <div class="row">
            <h2>Quels sont les avantages de Tagpanel?</h2>
            <p>
                -Tagpanel vous permet d’évaluer en étoile vos sentiments de satisfaction.
            </p>
            <p>
                -Mieux encore, Tagpanel est ouvert à tout le monde et pas seulement aux cercles des amis.
            </p>
            <p>
                -TagPanel est un album de nos différentes expériences.
            </p>
            <p>
                -Enfin, Tagpanel est un média-social pour la communauté de chaque ville.
            </p>
        </div>
        <!-- Team Members -->
        {{--<div class="row">--}}
            {{--<div class="col-lg-12">--}}
                {{--<h2 class="page-header">Our Team</h2>--}}
            {{--</div>--}}
            {{--<div class="col-md-4 text-center">--}}
                {{--<div class="thumbnail">--}}
                    {{--<img class="img-responsive" src="http://placehold.it/750x450" alt="">--}}
                    {{--<div class="caption">--}}
                        {{--<h3>John Smith<br>--}}
                            {{--<small>Job Title</small>--}}
                        {{--</h3>--}}
                        {{--<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iste saepe et quisquam nesciunt maxime.</p>--}}
                        {{--<ul class="list-inline">--}}
                            {{--<li><a href="#"><i class="fa fa-2x fa-facebook-square"></i></a>--}}
                            {{--</li>--}}
                            {{--<li><a href="#"><i class="fa fa-2x fa-linkedin-square"></i></a>--}}
                            {{--</li>--}}
                            {{--<li><a href="#"><i class="fa fa-2x fa-twitter-square"></i></a>--}}
                            {{--</li>--}}
                        {{--</ul>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
            {{--<div class="col-md-4 text-center">--}}
                {{--<div class="thumbnail">--}}
                    {{--<img class="img-responsive" src="http://placehold.it/750x450" alt="">--}}
                    {{--<div class="caption">--}}
                        {{--<h3>John Smith<br>--}}
                            {{--<small>Job Title</small>--}}
                        {{--</h3>--}}
                        {{--<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iste saepe et quisquam nesciunt maxime.</p>--}}
                        {{--<ul class="list-inline">--}}
                            {{--<li><a href="#"><i class="fa fa-2x fa-facebook-square"></i></a>--}}
                            {{--</li>--}}
                            {{--<li><a href="#"><i class="fa fa-2x fa-linkedin-square"></i></a>--}}
                            {{--</li>--}}
                            {{--<li><a href="#"><i class="fa fa-2x fa-twitter-square"></i></a>--}}
                            {{--</li>--}}
                        {{--</ul>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
            {{--<div class="col-md-4 text-center">--}}
                {{--<div class="thumbnail">--}}
                    {{--<img class="img-responsive" src="http://placehold.it/750x450" alt="">--}}
                    {{--<div class="caption">--}}
                        {{--<h3>John Smith<br>--}}
                            {{--<small>Job Title</small>--}}
                        {{--</h3>--}}
                        {{--<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iste saepe et quisquam nesciunt maxime.</p>--}}
                        {{--<ul class="list-inline">--}}
                            {{--<li><a href="#"><i class="fa fa-2x fa-facebook-square"></i></a>--}}
                            {{--</li>--}}
                            {{--<li><a href="#"><i class="fa fa-2x fa-linkedin-square"></i></a>--}}
                            {{--</li>--}}
                            {{--<li><a href="#"><i class="fa fa-2x fa-twitter-square"></i></a>--}}
                            {{--</li>--}}
                        {{--</ul>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
            {{--<div class="col-md-4 text-center">--}}
                {{--<div class="thumbnail">--}}
                    {{--<img class="img-responsive" src="http://placehold.it/750x450" alt="">--}}
                    {{--<div class="caption">--}}
                        {{--<h3>John Smith<br>--}}
                            {{--<small>Job Title</small>--}}
                        {{--</h3>--}}
                        {{--<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iste saepe et quisquam nesciunt maxime.</p>--}}
                        {{--<ul class="list-inline">--}}
                            {{--<li><a href="#"><i class="fa fa-2x fa-facebook-square"></i></a>--}}
                            {{--</li>--}}
                            {{--<li><a href="#"><i class="fa fa-2x fa-linkedin-square"></i></a>--}}
                            {{--</li>--}}
                            {{--<li><a href="#"><i class="fa fa-2x fa-twitter-square"></i></a>--}}
                            {{--</li>--}}
                        {{--</ul>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
            {{--<div class="col-md-4 text-center">--}}
                {{--<div class="thumbnail">--}}
                    {{--<img class="img-responsive" src="http://placehold.it/750x450" alt="">--}}
                    {{--<div class="caption">--}}
                        {{--<h3>John Smith<br>--}}
                            {{--<small>Job Title</small>--}}
                        {{--</h3>--}}
                        {{--<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iste saepe et quisquam nesciunt maxime.</p>--}}
                        {{--<ul class="list-inline">--}}
                            {{--<li><a href="#"><i class="fa fa-2x fa-facebook-square"></i></a>--}}
                            {{--</li>--}}
                            {{--<li><a href="#"><i class="fa fa-2x fa-linkedin-square"></i></a>--}}
                            {{--</li>--}}
                            {{--<li><a href="#"><i class="fa fa-2x fa-twitter-square"></i></a>--}}
                            {{--</li>--}}
                        {{--</ul>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
            {{--<div class="col-md-4 text-center">--}}
                {{--<div class="thumbnail">--}}
                    {{--<img class="img-responsive" src="http://placehold.it/750x450" alt="">--}}
                    {{--<div class="caption">--}}
                        {{--<h3>John Smith<br>--}}
                            {{--<small>Job Title</small>--}}
                        {{--</h3>--}}
                        {{--<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iste saepe et quisquam nesciunt maxime.</p>--}}
                        {{--<ul class="list-inline">--}}
                            {{--<li><a href="#"><i class="fa fa-2x fa-facebook-square"></i></a>--}}
                            {{--</li>--}}
                            {{--<li><a href="#"><i class="fa fa-2x fa-linkedin-square"></i></a>--}}
                            {{--</li>--}}
                            {{--<li><a href="#"><i class="fa fa-2x fa-twitter-square"></i></a>--}}
                            {{--</li>--}}
                        {{--</ul>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
        {{--<!-- /.row -->--}}

        {{--<!-- Our Customers -->--}}
        {{--<div class="row">--}}
            {{--<div class="col-lg-12">--}}
                {{--<h2 class="page-header">Our Customers</h2>--}}
            {{--</div>--}}
            {{--<div class="col-md-2 col-sm-4 col-xs-6">--}}
                {{--<img class="img-responsive customer-img" src="http://placehold.it/500x300" alt="">--}}
            {{--</div>--}}
            {{--<div class="col-md-2 col-sm-4 col-xs-6">--}}
                {{--<img class="img-responsive customer-img" src="http://placehold.it/500x300" alt="">--}}
            {{--</div>--}}
            {{--<div class="col-md-2 col-sm-4 col-xs-6">--}}
                {{--<img class="img-responsive customer-img" src="http://placehold.it/500x300" alt="">--}}
            {{--</div>--}}
            {{--<div class="col-md-2 col-sm-4 col-xs-6">--}}
                {{--<img class="img-responsive customer-img" src="http://placehold.it/500x300" alt="">--}}
            {{--</div>--}}
            {{--<div class="col-md-2 col-sm-4 col-xs-6">--}}
                {{--<img class="img-responsive customer-img" src="http://placehold.it/500x300" alt="">--}}
            {{--</div>--}}
            {{--<div class="col-md-2 col-sm-4 col-xs-6">--}}
                {{--<img class="img-responsive customer-img" src="http://placehold.it/500x300" alt="">--}}
            {{--</div>--}}
        {{--</div>--}}
        {{--<!-- /.row -->--}}

        {{--<hr>--}}

    </div>
    <!-- /.container -->
@endsection