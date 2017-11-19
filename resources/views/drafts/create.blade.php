@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Create new Draft</div>

                <div class="panel-body">
                    <form action="/drafts" method="post">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="name">Name of Draft</label>
                            <input type="text" name="name" id="name" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="sport">Sport</label>
                            <select name="sport" id="sport" class="form-control" required>
                                <option value="">Select</option>
                                <option value="nfl">NFL</option>
                                <option value="mlb">MLB</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="rounds">How many Rounds?</label>
                            <input type="number" name="rounds" id="rounds" class="form-control" required>
                        </div>
                        <p>Verify Draft Order</p>
                        <div class="form-group">
                            <label for="selected_round">Round</label>
                            <select name="selected_round" id="selected_round" class="form-control" required>
                            </select>
                        </div>

                        <div class="form-group">
                            <button type="submit" name="button" class="btn btn-primary">Create Draft</button>
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
