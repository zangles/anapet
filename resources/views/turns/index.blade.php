@extends('layouts.app')
@section('content')
    @if ( session('message') )
        @php list($type, $message) = explode('|', session('message')) @endphp
        <div class='alert alert-{{ $type }} alert-dismissible' role='alert'>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            {{ $message }}
        </div>
    @endif
    <div class="ibox float-e-margins" >
        <div class="ibox-title">
            <a href="{{ route('turns.create') }}" class="pull-right btn btn-xs btn-success"><i class="fa fa-plus"></i> New turn</a>
            <h5>Turns</h5>
        </div>
        <div class="ibox-content">
            <div class="content">
                <div class="row">
                    <div class="col-md-8">
                        @include('turns.partials.calendar')
                    </div>
                    <div class="col-md-4" style="max-height: 600px; overflow-x: auto">
                        @include('turns.partials.monthTurns')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
