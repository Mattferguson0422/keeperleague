@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            @if (count($errors))
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            @endif
                <div class="panel panel-default">
                    <div class="panel-heading">{{ $draft->name }}</div>
                    <div class="panel-body">
                        <span><b>Sport:</b> {{ $draft->sport }}</span>
                        <span><b>Draft Type:</b> {{ $draft->draft_type }}</span>
                        @if(Auth::User()->id == $draft->creator_id)
                        <span><a href="/leagues/{{ $draft->league->id }}/drafts/{{$draft->id}}/edit" class="btn btn-primary">Edit Draft</a></span>
                        @endif
                        <span><a href="draft" class="btn btn-success">Go to Draft Board</a></span>
                    </div>
                </div>
            <div class="panel panel-primary">
                <div class="panel-heading">Draft Order</div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-6">
                            <select class="form-control" id="round-pick">
                                <option value="">Select Round</option>

                                @for($i = 1; $i <= $draft->rounds; $i++)
                                    <option value="{{$i}}">Round {{$i}}</option>
                                @endfor
                            </select>
                        </div>
                        <div class="col-med-6">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script>
    $('select#round-pick').change(function() {
    });
</script>
@endsection
