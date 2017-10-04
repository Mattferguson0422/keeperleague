@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Leagues</div>
                <div class="panel-body">
                    <ul>
                        @foreach($leagues as $league)
                            <li><a href="/leagues/{{ $league->id }}">{{ $league->name }}</a>
                                    <div class="button-group">
                                    @if($user->id == $league->creator_id)
                                        <a href="/leagues/{{ $league->id }}/edit">Edit</a>
                                            <form action="/leagues/{{ $league->id }}" method="POST">
                                                {{ csrf_field() }}
                                                {{ method_field('DELETE') }}
                                                <button>Delete</button>
                                            </form>
                                    @endif
                                    </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
