@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Welcome to the Regenerative Resource Exchange</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                This site is the first release of an open source contracting system.  You can use the site to exchange or make agreements with people and organizations. 

                It is inspired by the many types of social contracts that have been the organizing force of all cultures throughout humanity's existence. 

                Your data will never be used for any purpose that you do not explicitly agree to in which there will be a contract sent to you to agree or disagree. As the system develops you will be updated on any possible decisions we are considering and asked how and if you want to participate.

                During this testing phase please <a href="mailto:ashtay67@gmail.com">contact the site creator</a> for questions, concerns, ideas, or feedback. 

                The code for the site is hosted <a href="https://www.github.com/ashtay67/contractsystem" target="github.com">here</a>. 

                Happy Contracting!<br><br>

                <a href="{{route('users.profile')}}">
                Go to your your Profile
                </a> to add goods and skills
                or
                <a href="{{route('search.index')}}">
                Search 
                </a>                 
                for people and opportunities
            </div>
        </div>
    </div>
</div>
@endsection
