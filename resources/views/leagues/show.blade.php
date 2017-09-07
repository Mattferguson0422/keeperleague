@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">League Drafts</div>

                <div class="panel-body">
                    <ul>
                        @foreach ($league->drafts as $draft)
                            <li><a href="/drafts/{{ $draft->id }}">{{ $draft->name  }}</a></li>
                        @endforeach
                    </ul>
                </div>

                <div class="panel-heading">League Members</div>

                <div class="panel-body">
                    <ul>
                        @foreach ($league->users as $user)
                            <li>{{ $user->name  }}</li>
                        @endforeach
                    </ul>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
