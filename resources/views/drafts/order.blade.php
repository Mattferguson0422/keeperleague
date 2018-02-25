@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Set your Draft Order</div>

                <div class="panel-body draft-order">

                    @if ($draft->draft_type == 'snake' || 'straight')

                    <ol id="order1">
                        @foreach($order[0] as $key => $team)
                            <li data-content="{{ $key }}">{{ $team }}</li>
                        @endforeach
                    </ol>

                    @endif

                   <form action="/drafts/{{ $draft->id }}/order" method="post" id="setorder">
                       {{ method_field('PATCH') }}
                       {{ csrf_field() }}
                        <div class="form-group">
                            <input type="hidden" name="order" id="order" value="">
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
    {{--<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">--}}
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <script>

        // Make list sortable for setting draft order
        $( "ol#order1" ).sortable({
            appendTo: document.body
        });

        //Before submitting, take sorted list and add it to array to submit
        $('button[type="submit"]').click(function(e) {
            e.preventDefault();

            $o = [];

            $.each($('#order1 li'), function() {
                $o.push($(this).attr('data-content'));
            });

            $('input#order').val($o);

            $('form#setorder').submit();
        });

    </script>
@endsection
