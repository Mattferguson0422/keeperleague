@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h2>{{ $league->name  }}</h2>
                    @if ($league->creator_id != $user->id)
                    <form action="/leagues/{{ $league->id }}/leave" method="post">

                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}

                        <button class="btn btn-primary">Leave this league</button>
                    </form>
                    @endif
                </div>
                <div class="panel-heading">League Settings</div>

                <div class="panel-body">
                    <ul>
                        @if ($user->isCreator($league))
                            <a href="/leagues/{{ $league->id }}/edit">Edit League</a>
                            <form action="/leagues/{{ $league->id }}" method="post">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}

                                <button class="btn btn-primary">Delete</button>
                            </form>

                            <a href="/leagues/{{ $league->id }}/drafts/create">Create a new draft</a>
                        @endif
                    </ul>
                </div>
                <div class="panel-heading">League Drafts</div>
                <div class="panel-body">
                    <ul>
                        @foreach ($league->drafts as $draft)
                            <li><a href="/leagues/{{ $league->id }}/drafts/{{ $draft->id }}">{{ $draft->name  }}</a></li>
                        @endforeach
                    </ul>
                </div>

                <div class="panel-heading">League Members</div>

                <div class="panel-body">
                    <ul>
                        @foreach ($league->users as $player)
                            <li>
                                {{ $player->name  }}
                            </li>
                        @endforeach
                    </ul>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
