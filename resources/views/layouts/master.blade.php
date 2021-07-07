<!doctype html>
<html lang="fr">
<head>
    {!! Html::style('assets/css/bootstrap.min.css') !!}
    {!! Html::style('assets/css/bootstrap.css') !!}
    {!! Html::style('assets/css/monStyle.css') !!}
    {!! Html::style('assets/css/jquery-ui.min.css') !!}
</head>
<body class="body">
<div class="container">
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="{{ url('/') }}">GSB</a>
            </div>
            @if (Session::get('connect') == false)
                <div class="collapse navbar-collapse" id="navbar-collapse-target">
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="{{ url('/getLogin') }}" data-toggle="collapse" data-target=".navbar-collapse.in">Se connecter</a></li>
                    </ul>
                </div>
            @endif
            @if (Session::get('connect') == true)
                <div class="nav navbar-nav">
                    <ul class="nav navbar-nav navbar-left">
                        <li><a href="{{ url('/ListeInteractions') }}" data-toggle="collapse" data-target=".navbar-collapse.in">Lister Interactions</a></li>
                        <li><a href="{{ url('/getAjoutInteraction') }}" data-toggle="collapse" data-target=".navbar-collapse.in">Ajouter Interaction</a></li>
                        <li><a href="{{ url('/ListeMedicaments') }}" data-toggle="collapse" data-target=".navbar-collapse.in">Lister Medicaments</a></li>
                        <li><a href="{{ url('/ListeComposants') }}" data-toggle="collapse" data-target=".navbar-collapse.in">Lister Composants</a></li>
                        <li><a href="{{ url('/ListeMedNonPresc') }}" data-toggle="collapse" data-target=".navbar-collapse.in">Lister Medicaments NP</a></li>

                    </ul>
                </div>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="{{ url('/getLogout') }}" data-toggle="collapse" data-target=".navbar-collapse.in">Se déconnecter</a></li>
                </ul>
            @endif
        </div><!--/.container-fluid -->
    </nav>
    @yield('content')
</body>
</html>





























