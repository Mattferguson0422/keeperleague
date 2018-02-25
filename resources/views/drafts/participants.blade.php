@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Draft Participants</div>

                <div class="panel-body">

                    <ol>
                        @foreach($picks as $pick)
                        <li class="form-group">
                            <form action="/drafts/{{ $draft->id }}/participants" method="post" id="participants">
                                {{ method_field('PATCH') }}
                                {{ csrf_field() }}

                                <label for="pick">Team Name</label>
                                <input type="text" name="pick" value="{{ $pick->pick }}">
                                <select name="owner_id">
                                    <option value="{{ $draft->creator_id }}">Select League Owner</option>

                                    @foreach($members as $member)
                                    <option value="{{ $member->id }}">{{ $member->name }}</option>
                                    @endforeach
                                </select>
                                <input name="position" type="hidden" value="{{ $pick->id }}">
                                <button type="submit" name="button" class="btn btn-primary">Save</button>
                            </form>
                        </li>
                        @endforeach
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