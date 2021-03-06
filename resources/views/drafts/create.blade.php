@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Create new Draft</div>

                <div class="panel-body">
                    <form action="/leagues/{{ $leagueId }}/drafts" method="post">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="name">Name of Draft</label>
                            <input type="text" name="name" id="name" class="form-control"  value="{{ old('name') }}">
                        </div>
                        <div class="form-group">
                            <label for="sport">Sport</label>
                            <select name="sport" id="sport" class="form-control">
                                <option value="">Select</option>
                                <option value="mlb">MLB</option>
                                <option value="nfl">NFL</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="rounds">How many Rounds?</label>
                            <input type="number" name="rounds" id="rounds" class="form-control"  value="{{ old('rounds') }}">
                        </div>

                        <div class="form-group">
                            <label for="sport">Draft Type</label>
                            <select name="draft_type" id="draft_type" class="form-control"  value="{{ old('draft_type') }}">
                                <option value="">Select</option>
                                <option value="snake">Snake</option>
                                <option value="straight">Straight</option>
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
