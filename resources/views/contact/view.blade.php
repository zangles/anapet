@extends('layouts.app')
@section('content')
    @if ( session('message') )
        @php list($type, $message) = explode('|', session('message')) @endphp
        <div class='alert alert-{{ $type }} alert-dismissible' role='alert'>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            {{ $message }}
        </div>
    @endif
    <div class="col-md-6">
        <div class="ibox float-e-margins" >
            <div class="ibox-title">
                <h5><i class="fa fa-user"></i> Contacts Info</h5>
                <a href="{{ route('contacts.edit', $contact) }}" class="pull-right btn btn-xs btn-info"><i class="fa fa-pencil"></i> Edit Contact</a>
            </div>
            <div class="ibox-content">
                <div class="content">
                    <div class="row">
                        <div class="col-md-12">
                            <dl class="dl-horizontal">
                                <dt>Name:</dt>
                                <dd>{{ $contact->name }}</dd>
                            </dl>
                            <dl class="dl-horizontal">
                                <dt>Address:</dt>
                                <dd>{{ $contact->address }}</dd>
                            </dl>
                            <dl class="dl-horizontal">
                                <dt>Email:</dt>
                                <dd>{{ $contact->email }}</dd>
                            </dl>
                            <dl class="dl-horizontal">
                                <dt>Phone:</dt>
                                <dd>{{ $contact->phone }}</dd>
                            </dl>
                            <dl class="dl-horizontal">
                                <dt>Description:</dt>
                                <dd>{{ $contact->description }}</dd>
                            </dl>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="ibox float-e-margins" >
            <div class="ibox-title">
                <a id="newContact" href="{{ route('turns.create',['contact' => $contact]) }}" class="pull-right btn btn-xs btn-success"><i class="fa fa-plus"></i> New turn</a>
                <h5><i class="fa fa-history"></i> Turns History</h5>
            </div>
            <div class="ibox-content">
                <div class="content">
                    <div class="row">
                        <div class="col-md-12">
                            @foreach($contact->turn()->orderBy('start')->get() as $turn)
                                <a href="{{ route('turns.show', $turn) }}">
                                    <i class="fa fa-calendar"></i> {{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $turn->start)->format('d/m/Y') }}
                                    <br>
                                </a>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-12">
        <div class="ibox float-e-margins" >
            <div class="ibox-title">
                <a id="newContact" href="{{ route('pets.create',['contact' => $contact]) }}" class="pull-right btn btn-xs btn-success"><i class="fa fa-plus"></i> New Pet</a>
                <h5><i class="fa fa-paw"></i> Pets</h5>
            </div>
            <div class="ibox-content">
                <div class="content">
                    <div class="row">
                        <div class="col-md-12">
                            @foreach($contact->pet as $pet)
                                @include('pet.partials.card',$pet)
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection