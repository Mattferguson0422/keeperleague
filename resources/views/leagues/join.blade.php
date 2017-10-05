@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Join a League</div>
                <div class="panel-body">
                    <form action="/leagues/join" method="POST">
                        {{ csrf_field() }}
                        <div class="field-group">
                            <label for="name">Enter League Name</label>
                            <input type="text" name="name" id="name">
                        </div>
                        <div class="field-group">
                            <label for="join_key">Enter League Join Key</label>
                            <input type="text" name="join_key" id="join_key">
                        </div>
                        <button type="submit">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
