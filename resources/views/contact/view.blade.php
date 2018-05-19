@extends('layouts.app')
@section('content')
    @if ( session('message') )
        @php list($type, $message) = explode('|', session('message')) @endphp
        <div class='alert alert-{{ $type }} alert-dismissible' role='alert'>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            {{ $message }}
        </div>
    @endif
    <div class="col-md-4">
        <div class="ibox float-e-margins" >
            <div class="ibox-title">
                <h5><i class="fa fa-user"></i> Contacts Info</h5>
                <a href="{{ route('contacts.edit', $contact) }}" class="pull-right btn btn-xs btn-success"><i class="fa fa-pencil"></i> Edit</a>
            </div>
            <div class="ibox-content">
                <div class="content">
                    <div class="row">
                        <div class="col-md-12">
                            <address>
                                <strong>Name:</strong> {{ $contact->name }}<br>
                                <strong>Address:</strong> {{ $contact->address }}<br>
                                <strong>Email:</strong> {{ $contact->email }}<br>
                                <strong>Phone:</strong> {{ $contact->phone }}<br>
                                <strong>Description:</strong><br>
                                {{ $contact->description }}
                            </address>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="ibox float-e-margins" >
            <div class="ibox-title">
                <h5><i class="fa fa-history"></i> Turns History</h5>
            </div>
            <div class="ibox-content">
                <div class="content">
                    <div class="row">
                        <div class="col-md-12">
                            <br><br><br><br><br>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection