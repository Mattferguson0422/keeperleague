@extends('layouts.app')
{{ dd($draft->order) }}
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
                    <h3>Round</h3>
                    <ol>
                        @for($i = 1; $i <= $draft->rounds; $i++)
                        <li>
                        </li>
                        @endfor
                    </ol>
                    @if(Auth::User()->id == $draft->creator_id)
                    <a href="/drafts/{{ $draft->id }}/order" class="btn btn-primary">Change Order</a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
