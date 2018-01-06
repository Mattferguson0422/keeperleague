@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Draft Order</div>

                <div class="panel-body">
                    <form action="" method="post">
                        <ul>
                            @foreach($order as $team)
                                <li>{{ $team }}</li>
                            @endforeach
                        </ul>
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
