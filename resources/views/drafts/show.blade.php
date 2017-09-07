@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            @if (count($errors))
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            @endif
            <div class="panel panel-default">
                <div class="panel-heading">{{ $draft->league->users->where('id',$draft->turn)->first()->name . " it's your turn" }}</div>
                <div class="panel-body">
                    <form action="/drafts/{{ $draft->id }}/results" method="POST">
                        {{ method_field('PATCH') }}
                        {{ csrf_field() }}
                        <div class="form-group">
                            <input type="text" name="name" class="form-control typeahead" placeholder="type last name">
                        </div>
                        <div class="form-group">
                            <button type="submit" name="button" class="btn btn-primary">Make Selection</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="draft-board">
    <h2>Draft Board</h2>
    <div>
        <ul class="draft-row">
            <li><div>Round</div></li>
            @foreach($draftNames as $player)
                <li><div>{{ $player->name }}</div></li>
            @endforeach
        </ul>

        @for ($i = 1; $i <= $draft->rounds; $i++)
        <ul>
            <li><div>{{ $i }}</div></li>
            @for ($m = 0; $m < count($draftOrder); $m++)

                <?php

                    // Put the draft order on the board
                    // will return a the correct column on Results Table
                    $picker = strtolower($draftNames[$m]->name);
                    $choice = $draft->result[($picker . "_$i")];

                    // If a player is already showing for this time through then
                    // show the player picked in that round.
                    // Otherwise show a placeholder for that drafter
                    if ($choice != null) {
                       $chosen = $allPlayers->where('id',$choice)->first();
                       $picked = true;

                    } else {
                        $chosen = $draftNames[$m];
                        $picked = false;
                    }
                ?>

                <li class="{{ $chosen->position}}">
                    @if ($picked == true)
                        <div>
                        <h4>{{ $chosen->name }}, {{ $chosen->team }}</h4>
                            <span>{{ $chosen->position }}</span>
                            <span> bye: {{ $chosen-> bye }}</span>
                        </div>
                    @else
                        <div>
                            {{ $chosen->name }}
                        </div>
                    @endif
                </li>

            @endfor
        </ul>
        @endfor
    </div>
</div>
<div class="container">
    <div class="panel-heading"><h2>Best Available Players</h2></div>
    <div class="panel-body">
        <div class="available-players">
            <h3>Quarterbacks</h3>
            <ol class="QB">
                @foreach($availablePlayers->where('position', 'QB') as $qb)
                    <li>{{ $qb->name . ', ' . $qb->team . ', bye: ' . $qb->bye }}</li>
                @endforeach
            </ol>
        </div>
        <div class="available-players">
            <h3>Running Backs</h3>
            <ol class="RB">
                @foreach($availablePlayers->where('position', 'RB') as $rb)
                    <li>{{ $rb->name . ', ' . $rb->team . ', bye: ' . $rb->bye }}</li>
                @endforeach
            </ol>
        </div>
        <div class="available-players">
            <h3>Wide Receivers</h3>
            <ol class="WR">
                @foreach($availablePlayers->where('position', 'WR') as $wr)
                    <li>{{ $wr->name . ', ' . $wr->team . ', bye: ' . $wr->bye }}</li>
                @endforeach
            </ol>
        </div>
        <div class="available-players">
            <h3>Tightends</h3>
            <ol class="TE">
                @foreach($availablePlayers->where('position', 'TE') as $te)
                    <li>{{ $te->name . ', ' . $te->team . ', bye: ' . $te->bye }}</li>
                @endforeach
            </ol>
        </div>
    </div>
</div>
@endsection
