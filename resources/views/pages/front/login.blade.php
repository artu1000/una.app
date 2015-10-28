@extends('templates.front.nude_layout')

@section('content')

    <div id="content" class="login row fill">

        <div class="container fill">

            <div class="display-table fill">

                <div class="form_container v-center table-cell">

                    <div class="form_capsule col-sm-offset-4 col-sm-4">

                        <form class="form-signin" role="form" method="POST" action="{{ route('login') }}">

                            {{-- crsf token --}}
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">

                            {{-- logo / icon --}}
                            <a class="logo text-center" href="" title="{{ config('app.name') }}">
                                <img width="300" height="280" src="{{ config('app.logo.light') }}" alt="{{ config('app.name') }}">
                            </a>

                            {{-- Title--}}
                            <h1><i class="fa fa-sign-in"></i> Espace connexion</h1>

                            {{-- email input --}}
                            <label class="sr-only" for="input_email">Adresse e-mail</label>
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon" for="input_email"><i class="fa fa-at"></i></span>
                                    <input id="input_email" class="form-control" type="email" name="email" value="{{ old('email') }}" placeholder="Adresse e-mail" autofocus>
                                </div>
                            </div>

                            {{-- password input--}}
                            <label for="input_password" class="sr-only">Password</label>
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon" for="input_password">
                                        <i class="fa fa-unlock-alt"></i>
                                    </span>
                                    <input type="password" id="input_password" class="form-control" name="password" value="{{ old('password') }}" placeholder="Mot de passe">
                                </div>
                            </div>

                            {{-- remember me checkbox --}}
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Se souvenir de moi
                                </label>
                            </div>

                            {{-- submit login --}}
                            <button class="btn btn-lg btn-primary btn-block" type="submit">
                                <i class="fa fa-thumbs-up"></i> Me connecter
                            </button>

                            {{-- forgotten password / create account --}}
                            <div class="form-group others_actions">
                                <a href="{{ route('forgotten_password') }}"> Mot de passe oublié</a>
                                <a href="{{ route('create_account') }}" class="pull-right"> Créer un compte</a>
                            </div>
                        </form>

                        <a href="{{ route('home') }}" class="pull-right cancel" title="Retour au site">
                            <button class="btn btn-lg btn-default">
                                <i class="fa fa-undo"></i> Retour au site
                            </button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection