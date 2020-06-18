@extends('layouts/app')

@section('title')
    Terms and Conditions
@endsection

@section('content')
    <!-- Page Content -->
    <div class="container">

        <!-- Page Heading/Breadcrumbs -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Terms
                    <small>and Conditions</small>
                </h1>
                <ol class="breadcrumb">
                    <li><a href="{{ url('/') }}">Home</a></li>
                    <li class="active">Terms and Conditions</li>
                </ol>
            </div>
        </div>
        <!-- /.row -->

        <!-- Content Row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="panel-group" id="accordion">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseOne">Termes et conditions d’utilisation.</a>
                            </h4>
                        </div>
                        <div id="collapseOne" class="panel-collapse collapse">
                            <div class="panel-body">
                                Le présent texte est originalement rédigé en français canadien. En cas de conflit la version française
                                servira de référence.
                            </div>
                        </div>
                    </div>
                    <!-- /.panel -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">Conditions d&#39;Utilisation.</a>
                            </h4>
                        </div>
                        <div id="collapseTwo" class="panel-collapse collapse">
                            <div class="panel-body">
                                Les présentes conditions d&#39;utilisation régissent votre façon d’utiliser tous les contenus de Tagpanel.com.
                                Autrement dit, l’acceptation et le respect des présentes conditions vont régir tout accès et utilisation des
                                services tagpanel.com
                            </div>
                        </div>
                    </div>
                    <!-- /.panel -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseThree">Conditions de base.</a>
                            </h4>
                        </div>
                        <div id="collapseThree" class="panel-collapse collapse">
                            <div class="panel-body">
                                <p>Vous êtes responsable de votre utilisation des services &amp; contenus que vous publiez sur Tagpanel.com
                                    et de toute conséquence qui en découlerait. Les contenus que vous soumettez, postez, ou affichez sont
                                    susceptibles d&#39;être vus par d&#39;autres utilisateurs de nos services et au travers de services et sites web
                                    fournis par des tiers. Vous ne devriez fournir que des contenus que vous souhaitez partager avec
                                    d&#39;autres utilisateurs conformément aux présentes Conditions. La véracité, l&#39;exactitude, ou la fiabilité des
                                    contenus ou des informations publiés n&#39;est en aucune manière assumée, supportée, revendiquée ou
                                    garantie par tagpanel.com.</p>
                                <p>Vous pouvez utiliser les services Tagpanel.com UNIQUEMENT si vous avez la capacité de conclure un
                                    contrat avec ce dernier et si vous N’ÊTES PAS INTERDIT de recevoir des services en vertu des lois du
                                    Canada ou d&#39;autres lois applicables. Si vous acceptez ces conditions et utilisez les services au nom
                                    d&#39;une entreprise, organisation, gouvernement ou autre entité juridique, vous DÉCLAREZ et
                                    GARANTISSEZ que vous êtes autorisé à le faire. Vous ne pouvez utiliser les services qu&#39;en conformité
                                    avec les présentes conditions et toutes les lois, règles et règlements applicables qu&#39;ils soient locaux,
                                    étatiques, nationaux et internationaux.</p>
                                <p>Tagpanel.com se réserve le droit de définir à sa seule discrétion des limites sur l&#39;utilisation sans
                                    préavis.
                                    De plus, les services peuvent contenir des publicités ciblées en fonction des contenus ou de l&#39;information
                                    disponibles ou sur la base de toute autre information. En effet, c’est en contrepartie de l&#39;utilisation des
                                    services Tagpanel.com que vous acceptez que ce dernier et ses partenaires puissent placer leurs
                                    publicités sur certains services ou en relation avec l&#39;affichage de contenus.</p>
                            </div>
                        </div>
                    </div>
                    <!-- /.panel -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseFour">Confidentialité</a>
                            </h4>
                        </div>
                        <div id="collapseFour" class="panel-collapse collapse">
                            <div class="panel-body">
                                En utilisant les services tagpanel.com vous consentez à la collecte et l&#39;utilisation de vos informations
                                comme vos adresses émail …Il est à noter que cet usage sera seulement dans le cadre de la fourniture
                                des services que nous pouvons vous adresser certaines communications, telles que des annonces de
                                service et/ou des messages administratifs
                            </div>
                        </div>
                    </div>
                    <!-- /.panel -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseFive">Mot de passe</a>
                            </h4>
                        </div>
                        <div id="collapseFive" class="panel-collapse collapse">
                            <div class="panel-body">
                                Vous êtes responsable de la protection du mot de passe que vous utilisez pour accéder aux services
                                tagpanel.com. Nous vous recommandons fortement d’utiliser pour votre compte des mots de passe
                                constitués d&#39;une combinaison de lettres et de chiffres voir même des caractères spéciaux.
                                En aucun cas, tagpanel.com ne sera pas responsable d&#39;un quelconque dommage résultant d&#39;un
                                manquement de votre part sur ce point.
                            </div>
                        </div>
                    </div>
                    <!-- /.panel -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseSix">Droits d’utilisateurs</a>
                            </h4>
                        </div>
                        <div id="collapseSix" class="panel-collapse collapse">
                            <div class="panel-body">
                                Vous conservez vos droits sur tous les contenus que vous soumettez, postez ou publiez sur
                                Tagpanel.com. Toutefois, nous assumons qu’en soumettant vos contenus. Vous nous accordez une
                                licence mondiale de donner une sous-licence, de reproduire, d&#39;utiliser, de distribuer ces contenus, de
                                copier, de traiter, d&#39;adapter, de modifier, de publier, de transmettre, d&#39;afficher et sur tout support par toute
                                méthode de distribution connue ou non encore publiée.
                            </div>
                        </div>
                    </div>
                    <!-- /.panel -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseSeven">Droits de Tagpanel.com</a>
                            </h4>
                        </div>
                        <div id="collapseSeven" class="panel-collapse collapse">
                            <div class="panel-body">
                                <p>Les services tagpanel.com sont protégés au titre du droit d&#39;auteur/Copyright, du droit des marques, et
                                    d&#39;autres lois à la fois du Canada et des pays étrangers. Rien dans les présentes conditions ne vous
                                    donne un droit d&#39;utiliser le terme tagpanel.com ou aucun des marques ni aucun des logos, noms de
                                    domaine et autres signes distinctifs de Tagpanel.com. Toute remarque, toute suggestion que vous
                                    pourriez soumettre concernant tagpanel.com ou ses services est faite de manière libre et spontanée et
                                    nous serons libres d&#39;utiliser ces réactions, commentaires ou suggestions comme bon nous semble et
                                    sans aucune obligation à votre égard.</p>
                                <p>Nous nous réservons le droit à tout moment de supprimer et/ou de refuser de distribuer des contenus
                                    sur les services, de suspendre ou de résilier des comptes utilisateurs, et de récupérer des noms
                                    d&#39;utilisateur, sans engager notre responsabilité à votre égard. Nous nous réservons également le droit
                                    d&#39;accéder, de lire, de conserver et de divulguer toute information que nous estimons raisonnablement
                                    nécessaire pour : a)détecter, prévenir ou traiter les problèmes de fraude, de sécurité ou les problèmes
                                    techniques, (b) satisfaire à toute loi ou tout règlement en vigueur , ou à toute procédure judiciaire ou
                                    demande administrative, (c) faire respecter les présentes conditions, y compris dans le cadre de la
                                    recherche d&#39;éventuelles violations des présentes conditions, (d) d&#39;assistance des utilisateurs, ou (E)
                                    protéger les intérêts, les biens ou la sécurité de tagpanel.com, de ses utilisateurs et du public.
                                    Toutefois, tagpanel.com ne divulguera jamais les données personnelles en dehors de termes de
                                    confidentialité.</p>
                            </div>
                        </div>
                    </div>
                    <!-- /.panel -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseEight">Droits d’auteurs (Copyright).</a>
                            </h4>
                        </div>
                        <div id="collapseEight" class="panel-collapse collapse">
                            <div class="panel-body">
                                <p>Tagpanel.com respecte scrupuleusement les droits de propriété intellectuelle de tous et chacun et
                                    s&#39;attend à ce que les utilisateurs de ses services en fassent autant. Si vous pensez que vos contenus ont
                                    été reproduits ou diffusés de manière contrefaisante, veuillez nous fournir les informations suivantes :
                                    1) L&#39;identification de l&#39;œuvre protégée qui selon vous a fait l&#39;objet d&#39;une utilisation contrefaisante.
                                    2) L&#39;identification des contenus qui selon vous porte atteinte à ces droits ou fait l&#39;objet d&#39;activités
                                    contrefaisantes et qui doit être enlevé ou dont l&#39;accès doit être désactivé, ainsi que des renseignements
                                    raisonnablement suffisants pour nous permettre de localiser ces contenus
                                    3) Une signature physique ou électronique du titulaire de droits ou d&#39;une personne autorisée à agir en son
                                    nom,
                                    4) vos coordonnées, notamment votre adresse, numéro de téléphone et une adresse e-mail,
                                    5) une déclaration de votre part selon laquelle vous estimez de bonne foi que l&#39;utilisation des contenus en
                                    cause n&#39;est pas autorisée par le titulaire de droits, son mandataire ou la loi, et
                                    6) une déclaration selon laquelle les informations contenues dans la notification sont exactes et, sous
                                    peine de parjure, que vous êtes autorisé à agir pour le compte du titulaire de droits.</p>
                                <p>Nous nous réservons le droit de supprimer les Contenus présumés contrefaisants sans préavis, à notre
                                    seule discrétion et sans engager notre responsabilité envers vous. Lorsque les circonstances le justifient,
                                    Tagpanel.com sera également en droit de résilier le compte d&#39;un utilisateur si l&#39;utilisateur est considéré à
                                    plusieurs reprises comme contrefacteur.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.panel-group -->
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->

        <hr>

    </div>
    <!-- /.container -->

@endsection