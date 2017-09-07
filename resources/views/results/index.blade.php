@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Available Quarterbacks</div>

                <div class="panel-body">
                    <ul>
                        @foreach ($qbs as $qb)
                            <li>{{ $qb->name . ', ' . $qb->team . ', bye: ' .$qb->bye  }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
