@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-3">
            <div class="panel panel-default">
                <div class="panel-heading">Edit League</div>

                <div class="panel-body">
                    <form action="/leagues/{{ $league->id }}" method="POST">
                        {{ method_field('PATCH') }}
                        {{ csrf_field() }}
                        <div class="form-group">
                            <input type="text" name="name" class="form-control" value="{{ $league->name }}">
                        </div>
                        <div class="form-group">
                            <input type="text" name="join_key" class="form-control" value="{{ $league->join_key }}">
                        </div>
                        <div class="form-group">
                            <input type="number" name="member_count" class="form-control" value="{{ $league->member_count }}">
                        </div>
                        <div class="form-group">
                            <button type="submit" name="button" class="btn btn-primary">Update League</button>
                        </div>
                    </form>
                </div>

                <div class="panel-heading">Remove League Members</div>

                <div class="panel-body">
                    <ul>

                    </ul>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
