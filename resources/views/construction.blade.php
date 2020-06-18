<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Coming Soon</title>
    <link href="{{ asset('/tools/style.css') }}" rel="stylesheet">
    <link href="{{ asset('tools/font-awesome/css/font-awesome.css') }}" rel="stylesheet">
    <script type="text/javascript" src="../../public/tools/jquery.min.js"></script>
    <link href='https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href="https://file.myfontastic.com/n6vo44Re5QaWo8oCKShBs7/icons.css" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale = 1.0, user-scalable = no">


</head>
<body>
<div class="transy"></div>
<div class="wrapper">
    <div class="centered">
        <div class="header">
            <p class="line1"> VIENT BIENTôT : </p>
            <h1 id="logo">TagPanel</h1>
            <br/>
            <p class="line1">- website under construction -</p>
        </div>

        <div class="content">
            <p>We are working on something very interesting!</p>
        </div>


        <div class="form">
            <p>Plus que jamais, grâce aux média-sociaux comme Facebook, Twitter, Instagram,  nous racontons  nos petites histoires à nos amis / amies de partout au monde entier. <br/><br/>
                Mais héla, les gens ne racontent que des histoires positives comme s’ils n’ont jamais connu les négatives !!!L’être humain n’aime pas parler de ses échecs, de ce qui lui fait mal en effet.<br/><br/>
                Nous avons déduit que le monde a besoin d’un média-social qui permet plutôt d’éviter le plus possible des histoires négatives. <br/><br/>
                Ainsi est né TagPanel, qui  va permettre  à ses membres de valider d’abord leurs  idées, leurs  choix auprès de leurs  amis et/ou  de leur communauté avant de s’engager. <br/><br/>
                Tagpanel.com  sera le premier média-social canadien à voir le jour et sera très cool.<br/></p>
        </div>



        <div class="social">
            <p class="line1">Suivez nous sur media sociaux <br/> Follow us on social media:</p>
            <p>
                <a href="https://www.linkedin.com/company/tagpanel"><span class="socicon-linkedin"></span></a>
                <a href="https://plus.google.com/109954304884234846276"><span class="socicon-googleplus"></span></a>
                <a href="https://twitter.com/tagpanel"><span class="socicon-twitter"></span></a>
                <a href="https://www.facebook.com/tagpanel/"><span class="socicon-facebook"></span></a>
            </p>
        </div>
    </div>
</div>



<script type="text/javascript">
    var placeholder = $("#test").val();

    $("#test").keydown(function() {
        if (this.value == placeholder) {
            this.value = '';
        }
    }).blur(function() {
        if (this.value == '') {
            this.value = placeholder;
        }
    });
</script>

</body>
</html>
