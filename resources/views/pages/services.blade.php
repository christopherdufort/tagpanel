@extends('layouts/app')

@section('title')
    Help
@endsection

@section('content')
    <!-- Page Content -->
    <div class="container">

        <!-- Page Heading/Breadcrumbs -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Help
                    <small>and services</small>
                </h1>
                <ol class="breadcrumb">
                    <li><a href="{{ url('/') }}">Home</a></li>
                    <li class="active">Help</li>
                </ol>
            </div>
        </div>
        <!-- /.row -->

        <!-- Image Header -->
        <div class="row">
            <div class="col-lg-12">
                <img class="img-responsive" src="{{ url('/images/questions.jpg') }}" alt="">
            </div>
        </div>
        <!-- /.row -->

        <!-- Service Panels -->
        <!-- The circle icons use Font Awesome's stacked icon classes. For more information, visit http://fontawesome.io/examples/ -->
        {{--<div class="row">--}}
            {{--<div class="col-lg-12">--}}
                {{--<h2 class="page-header">Help with TagPanels</h2>--}}
            {{--</div>--}}
            {{--<div class="col-md-3 col-sm-6">--}}
                {{--<div class="panel panel-default text-center">--}}
                    {{--<div class="panel-heading">--}}
                        {{--<span class="fa-stack fa-5x">--}}
                              {{--<i class="fa fa-circle fa-stack-2x text-success"></i>--}}
                              {{--<i class="fa fa-tree fa-stack-1x fa-inverse"></i>--}}
                        {{--</span>--}}
                    {{--</div>--}}
                    {{--<div class="panel-body">--}}
                        {{--<h4>Service One</h4>--}}
                        {{--<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>--}}
                        {{--<a href="#" class="btn btn-primary">Learn More</a>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
            {{--<div class="col-md-3 col-sm-6">--}}
                {{--<div class="panel panel-default text-center">--}}
                    {{--<div class="panel-heading">--}}
                        {{--<span class="fa-stack fa-5x">--}}
                              {{--<i class="fa fa-circle fa-stack-2x text-success"></i>--}}
                              {{--<i class="fa fa-car fa-stack-1x fa-inverse"></i>--}}
                        {{--</span>--}}
                    {{--</div>--}}
                    {{--<div class="panel-body">--}}
                        {{--<h4>Service Two</h4>--}}
                        {{--<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>--}}
                        {{--<a href="#" class="btn btn-primary">Learn More</a>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
            {{--<div class="col-md-3 col-sm-6">--}}
                {{--<div class="panel panel-default text-center">--}}
                    {{--<div class="panel-heading">--}}
                        {{--<span class="fa-stack fa-5x">--}}
                              {{--<i class="fa fa-circle fa-stack-2x text-success"></i>--}}
                              {{--<i class="fa fa-support fa-stack-1x fa-inverse"></i>--}}
                        {{--</span>--}}
                    {{--</div>--}}
                    {{--<div class="panel-body">--}}
                        {{--<h4>Service Three</h4>--}}
                        {{--<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>--}}
                        {{--<a href="#" class="btn btn-primary">Learn More</a>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
            {{--<div class="col-md-3 col-sm-6">--}}
                {{--<div class="panel panel-default text-center">--}}
                    {{--<div class="panel-heading">--}}
                        {{--<span class="fa-stack fa-5x">--}}
                              {{--<i class="fa fa-circle fa-stack-2x text-success"></i>--}}
                              {{--<i class="fa fa-database fa-stack-1x fa-inverse"></i>--}}
                        {{--</span>--}}
                    {{--</div>--}}
                    {{--<div class="panel-body">--}}
                        {{--<h4>Service Four</h4>--}}
                        {{--<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>--}}
                        {{--<a href="#" class="btn btn-primary">Learn More</a>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}

        <!-- Service Tabs -->
        <div class="row">
            <div class="col-lg-12">
                <h2 class="page-header">Help with TagPanel</h2>
            </div>
            <div class="col-lg-12">

                <ul id="myTab" class="nav nav-tabs nav-justified">
                    <li class="active"><a href="#service-one" data-toggle="tab"><i class="fa fa-exclamation"></i> Our Purpose</a>
                    </li>
                    {{--<li class=""><a href="#service-two" data-toggle="tab"><i class="fa fa-car"></i> Service Two</a>--}}
                    {{--</li>--}}
                    {{--<li class=""><a href="#service-three" data-toggle="tab"><i class="fa fa-support"></i> Service Three</a>--}}
                    {{--</li>--}}
                    {{--<li class=""><a href="#service-four" data-toggle="tab"><i class="fa fa-database"></i> Service Four</a>--}}
                    {{--</li>--}}
                </ul>

                <div id="myTabContent" class="tab-content">
                    <div class="tab-pane fade active in" id="service-one">
                        <p> <b>Notre communauté, notre inspiration</b>
                            Soyez au courant de ce qui se passe dans votre communauté grâce à son panneau ,impliquez-vous en publiant sur le même panneau et inspirez-vous des autres communautés grâce à la module de recherche de Tagpanel.com.</p>
                        <p><b>Our community Our inspiration</b>
                        Be aware of what's going on in your space from it's panel, be involved by publishing and get inspired from other communities thanks to  the tagpanel search.</p>
                    </div>
                    {{--<div class="tab-pane fade" id="service-two">--}}
                        {{--<h4>Service Two</h4>--}}
                        {{--<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quae repudiandae fugiat illo cupiditate excepturi esse officiis consectetur, laudantium qui voluptatem. Ad necessitatibus velit, accusantium expedita debitis impedit rerum totam id. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Natus quibusdam recusandae illum, nesciunt, architecto, saepe facere, voluptas eum incidunt dolores magni itaque autem neque velit in. At quia quaerat asperiores.</p>--}}
                        {{--<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quae repudiandae fugiat illo cupiditate excepturi esse officiis consectetur, laudantium qui voluptatem. Ad necessitatibus velit, accusantium expedita debitis impedit rerum totam id. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Natus quibusdam recusandae illum, nesciunt, architecto, saepe facere, voluptas eum incidunt dolores magni itaque autem neque velit in. At quia quaerat asperiores.</p>--}}
                    {{--</div>--}}
                    {{--<div class="tab-pane fade" id="service-three">--}}
                        {{--<h4>Service Three</h4>--}}
                        {{--<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quae repudiandae fugiat illo cupiditate excepturi esse officiis consectetur, laudantium qui voluptatem. Ad necessitatibus velit, accusantium expedita debitis impedit rerum totam id. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Natus quibusdam recusandae illum, nesciunt, architecto, saepe facere, voluptas eum incidunt dolores magni itaque autem neque velit in. At quia quaerat asperiores.</p>--}}
                        {{--<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quae repudiandae fugiat illo cupiditate excepturi esse officiis consectetur, laudantium qui voluptatem. Ad necessitatibus velit, accusantium expedita debitis impedit rerum totam id. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Natus quibusdam recusandae illum, nesciunt, architecto, saepe facere, voluptas eum incidunt dolores magni itaque autem neque velit in. At quia quaerat asperiores.</p>--}}
                    {{--</div>--}}
                    {{--<div class="tab-pane fade" id="service-four">--}}
                        {{--<h4>Service Four</h4>--}}
                        {{--<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quae repudiandae fugiat illo cupiditate excepturi esse officiis consectetur, laudantium qui voluptatem. Ad necessitatibus velit, accusantium expedita debitis impedit rerum totam id. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Natus quibusdam recusandae illum, nesciunt, architecto, saepe facere, voluptas eum incidunt dolores magni itaque autem neque velit in. At quia quaerat asperiores.</p>--}}
                        {{--<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quae repudiandae fugiat illo cupiditate excepturi esse officiis consectetur, laudantium qui voluptatem. Ad necessitatibus velit, accusantium expedita debitis impedit rerum totam id. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Natus quibusdam recusandae illum, nesciunt, architecto, saepe facere, voluptas eum incidunt dolores magni itaque autem neque velit in. At quia quaerat asperiores.</p>--}}
                    {{--</div>--}}
                {{--</div>--}}

                 </div>
            </div>
        </div>
        <!-- Service List -->
        <!-- The circle icons use Font Awesome's stacked icon classes. For more information, visit http://fontawesome.io/examples/ -->
        <div class="row">
            <div class="col-lg-12">
                <h2 class="page-header">Bienvenu chez Tagpanel.com</h2>
            </div>

            <div class="col-lg-12">
                <div class="media row col-md-6" style="margin-top: 15px;">
                    <div class="pull-left">
                        <span class="fa-stack fa-2x">
                              <i class="fa fa-circle fa-stack-2x text-success"></i>
                              <i class="fa fa-question fa-stack-1x fa-inverse"></i>
                        </span>
                    </div>
                    <div class="media-body">
                        <h4 class="media-heading">One</h4>
                        <p>Tapez Tagpanel.com dans n’importe quel moteur de recherche</p>
                    </div>
                </div>
                <div class="media row col-md-6">
                    <div class="pull-left">
                        <span class="fa-stack fa-2x">
                              <i class="fa fa-circle fa-stack-2x text-success"></i>
                              <i class="fa fa-question fa-stack-1x fa-inverse"></i>
                        </span>
                    </div>
                    <div class="media-body">
                        <h4 class="media-heading">Two</h4>
                        <p>La page d’accueil de TagPanel.com va s’afficher.</p>
                    </div>
                </div>
                <div class="media row col-md-6">
                    <div class="pull-left">
                        <span class="fa-stack fa-2x">
                              <i class="fa fa-circle fa-stack-2x text-success"></i>
                              <i class="fa fa-question fa-stack-1x fa-inverse"></i>
                        </span>
                    </div>
                    <div class="media-body">
                        <h4 class="media-heading">Three</h4>
                        <p>Vous cliquez sur CREATE A TAG si vous voulez partager votre expérience et remplir le
                            petit formulaire</p>
                    </div>
                </div>
                <div class="media row col-md-6">
                    <div class="pull-left">
                        <span class="fa-stack fa-2x">
                              <i class="fa fa-circle fa-stack-2x text-success"></i>
                              <i class="fa fa-question fa-stack-1x fa-inverse"></i>
                        </span>
                    </div>
                    <div class="media-body">
                        <h4 class="media-heading">Four</h4>
                        <p>Si vous n’avez pas de compte Tagpanel.com l’application va vous demander d’en ouvrir
                            un pour pouvoir afficher votre expérience</p>
                    </div>
                </div>
                <div class="media row col-md-6">
                    <div class="pull-left">
                        <span class="fa-stack fa-2x">
                              <i class="fa fa-circle fa-stack-2x text-success"></i>
                              <i class="fa fa-question fa-stack-1x fa-inverse"></i>
                        </span>
                    </div>
                    <div class="media-body">
                        <h4 class="media-heading">Five</h4>
                        <p>Si vous voulez visiter le panel des autres communautés vous cliquez la première lettre
                            de la ville que voulez dans la barre de recherche et les noms des villes s’affichent pour te
                            donner le choix. Et si vous voulez une catégorie en particulier vous allez sélectionner de
                            la liste dans la deuxième partie de la barre de recherche.</p>
                    </div>
                </div>
                <div class="media row col-md-6">
                    <div class="pull-left">
                        <span class="fa-stack fa-2x">
                              <i class="fa fa-circle fa-stack-2x text-success"></i>
                              <i class="fa fa-question fa-stack-1x fa-inverse"></i>
                        </span>
                    </div>
                    <div class="media-body">
                        <h4 class="media-heading">Six</h4>
                        <p>Si vous voulez aimer les affiches des autres panelistes, vous n’avez qu’à cliquer sur le
                            signe de cœur en bas de l’image : Si vous êtes connecté dans votre compte, votre clic
                            va s’ajouter sur les autres. Au cas contraire l’application va vous demander de vous
                            connecter ou carrément d’ouvrir un compte si vous n’en avez pas encore.</p>
                    </div>
                </div>
                <div class="media row col-md-6">
                    <div class="pull-left">
                        <span class="fa-stack fa-2x">
                              <i class="fa fa-circle fa-stack-2x text-success"></i>
                              <i class="fa fa-question fa-stack-1x fa-inverse"></i>
                        </span>
                    </div>
                    <div class="media-body">
                        <h4 class="media-heading">Seven</h4>
                        <p>Si vous voulez partager des TAGs des autres Panelistes vous n’avez qu’à cliquer sur le
                            signe de partage en bas de chaque affiche et vous êtes directement redirigé vers vos
                            comptes respectifs pour partager comme bon vous semble.</p>
                    </div>
                </div>
                <div class="media row col-md-6">
                    <div class="pull-left">
                        <span class="fa-stack fa-2x">
                              <i class="fa fa-circle fa-stack-2x text-success"></i>
                              <i class="fa fa-question fa-stack-1x fa-inverse"></i>
                        </span>
                    </div>
                    <div class="media-body">
                        <h4 class="media-heading">Eight</h4>
                        <p>Si vous voulez faire le suivi des tags que vous avez affichés : le nombre des panelistes qui
                            les ont aimés, changer quoi que ça soit sur vos TAGS, vous n’avez qu’à aller dans l’en
                            tête et cliquer sur Dashboard, puis myTAGS.</p>
                    </div>
                </div>
                <div class="media row col-md-6">
                    <div class="pull-left">
                        <span class="fa-stack fa-2x">
                              <i class="fa fa-circle fa-stack-2x text-success"></i>
                              <i class="fa fa-question fa-stack-1x fa-inverse"></i>
                        </span>
                    </div>
                    <div class="media-body">
                        <h4 class="media-heading">Nine</h4>
                        <p>Pour voir la synthèse de vos activités sur Tagpanel, vous allez sur l’en tête et cliquer sur
                            Dashboard, puis cliquer sur myDashboard.</p>
                    </div>
                </div>
                <div class="media row col-md-6">
                    <div class="pull-left">
                        <span class="fa-stack fa-2x">
                              <i class="fa fa-circle fa-stack-2x text-success"></i>
                              <i class="fa fa-question fa-stack-1x fa-inverse"></i>
                        </span>
                    </div>
                    <div class="media-body">
                        <h4 class="media-heading">Ten</h4>
                        <p>Pour retourner sur la page d’accueil, vous n’avez qu’à cliquer sur le logo principal.</p>
                    </div>
                </div>
                <div class="media row col-md-6">
                    <div class="pull-left">
                        <span class="fa-stack fa-2x">
                              <i class="fa fa-circle fa-stack-2x text-success"></i>
                              <i class="fa fa-question fa-stack-1x fa-inverse"></i>
                        </span>
                    </div>
                    <div class="media-body">
                        <h4 class="media-heading">Eleven</h4>
                        <p>Si vous voulez mettre à jour votre profile, vous allez sur l’en tête et cliquer sur le signe
                            de dropdown collé sur votre nom et choisir Edit Profile de la liste qui s’affiche.</p>
                    </div>
                </div>
                <div class="media row col-md-6">
                    <div class="pull-left">
                        <span class="fa-stack fa-2x">
                              <i class="fa fa-circle fa-stack-2x text-success"></i>
                              <i class="fa fa-question fa-stack-1x fa-inverse"></i>
                        </span>
                    </div>
                    <div class="media-body">
                        <h4 class="media-heading">Twelve</h4>
                        <p>Pour visiter votre profil vous allez sur l’en tête et cliquez sur le signe de drop down collé
                            à droite de votre nom et vous choisissez My profile de la liste.</p>
                    </div>
                </div>
                <div class="media row col-md-6">
                    <div class="pull-left">
                        <span class="fa-stack fa-2x">
                              <i class="fa fa-circle fa-stack-2x text-success"></i>
                              <i class="fa fa-question fa-stack-1x fa-inverse"></i>
                        </span>
                    </div>
                    <div class="media-body">
                        <h4 class="media-heading">Thirteen</h4>
                        <p>Si jamais vous éprouvez des difficultés, vous pouvez toujours nous envoyer un email à
                            travers contact us.</p>
                    </div>
                </div>
                <div class="media row col-md-6">
                    <div class="pull-left">
                        <span class="fa-stack fa-2x">
                              <i class="fa fa-circle fa-stack-2x text-success"></i>
                              <i class="fa fa-question fa-stack-1x fa-inverse"></i>
                        </span>
                    </div>
                    <div class="media-body">
                        <h4 class="media-heading">Fourteen</h4>
                        <p>arrive bientôt</p>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.row -->

        {{--<hr>--}}

        {{--<!-- Footer -->--}}
        {{--<footer>--}}
            {{--<div class="row">--}}
                {{--<div class="col-lg-12">--}}
                    {{--<p>Copyright &copy; Your Website 2014</p>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</footer>--}}

    </div>
    <!-- /.container -->
@endsection