@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Create new League</div>

                <div class="panel-body">
                    <form action="/leagues" method="post">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="name">Name of League</label>
                            <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}">
                        </div>
                        <div class="form-group">
                            <label for="join_key">Unique Join Key for inviting users</label>
                            <input type="text" name="join_key" id="join_key" class="form-control" value="{{ old('join_key') }}">
                        </div>
                        <div class="form-group">
                            <label for="member_count">How many Members?</label>
                            <input type="number" name="member_count" class="form-control" value="{{ old('member_count') }}" min="1">
                        </div>
                        <div class="form-group">
                            <button type="submit" name="button" class="btn btn-primary">Create League</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
