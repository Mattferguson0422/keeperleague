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
                            <input type="text" name="name" id="name" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="sport">Sport</label>
                            <select name="sport" id="sport" class="form-control" required>
                                <option value="">Select</option>
                                <option value="1">MLB</option>
                                <option value="2">NFL</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="rounds">How many Rounds?</label>
                            <input type="number" name="rounds" id="rounds" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="teams">How many Teams?</label>
                            <input type="number" name="teams" id="teams" class="form-control" required>
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

@section('scripts')
    <script>

        // Once number of rounds is set, begin to set the order
        $('#rounds').focusout(function(){

            var rounds = $(this).val();

            for(i = 1; i <= rounds; i++) {

                $('#selected_round').append(
                    '<option value="' + i + '">' + i + '</option>'
                );
            }
        });

    </script>
@endsection
