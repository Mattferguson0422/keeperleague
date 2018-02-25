@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Edit Draft</div>

                <div class="panel-body">
                    <form action="/leagues/{{ $draft->league->id }}/drafts/{{ $draft->id }}" method="post">
                        {{ method_field('PATCH') }}
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="name">Name of Draft</label>
                            <input type="text" name="name" id="name" class="form-control"  value="{{ $draft->name }}">
                        </div>
                        <div class="form-group">
                            <label for="sport">Sport</label>
                            <select name="sport" id="sport" class="form-control">
                                <option value="">Select</option>
                                <option value="mlb" @if ($draft->sport == "mlb") selected @endif>MLB</option>
                                <option value="nfl" @if ($draft->sport == "nfl") selected @endif>NFL</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="rounds">How many Rounds?</label>
                            <input type="number" name="rounds" id="rounds" class="form-control"  value="{{ $draft->rounds }}">
                        </div>

                        <div class="form-group">
                            <label for="sport">Draft Type</label>
                            <select name="draft_type" id="draft_type" class="form-control"  value="{{ $draft->draft_type }}">
                                <option value="">Select</option>
                                <option value="snake" @if ($draft->draft_type == "snake") selected @endif>Snake</option>
                                <option value="straight" @if ($draft->draft_type == "straight") selected @endif>Straight</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <button type="submit" name="button" class="btn btn-primary">Continue</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
