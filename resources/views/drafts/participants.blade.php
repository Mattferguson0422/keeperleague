@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Draft Participants</div>
                <div class="panel-body">
                    <p>Enter draft teams, drag & drop into order, select owner</p>
                </div>
                <div class="panel-body">
                    <form action="/drafts/{{ $draft->id }}/participants" method="post" id="participants">
                        {{ method_field('PATCH') }}
                        {{ csrf_field() }}
                        <h2>Enter Team Names</h2>
                        <ol id="sortable">
                        @for($i = 1; $i <= count($picks); $i++)
                            <li class="form-group ui-state-default">
                                <input type="text" name="team_{{ $i }}" value="team_{{ $i }}">
                                <select name="client_id_{{ $i }}">
                                    @foreach($members as $member)
                                        <option value="{{ $member->id }}">{{ $member->name }}</option>
                                    @endforeach
                                </select>
                                <span class="glyphicon glyphicon-th"></span>
                            </li>
                        @endfor
                        </ol>
                        <div class="form-group">
                            <button type="submit" name="button" class="btn btn-primary">Set Order</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
@section("scripts")
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script>
        $( function() {
            $( "#sortable" ).sortable();
            $( "#sortable" ).disableSelection();
        } );
    </script>
@endsection