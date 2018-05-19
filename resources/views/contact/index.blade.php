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
            <a href="{{ route('contacts.create') }}" class="pull-right btn btn-xs btn-success"><i class="fa fa-plus"></i> New contact</a>
            <form role="search" class="navbar-form-custom" action="search_results.html">
                <div class="form-group">
                    <input type="text" placeholder="Search for someone..." class="form-control" name="top-search" id="top-search">
                </div>
            </form>
            <h5>Contacts</h5>
        </div>
        <div class="ibox-content">
            <div class="content">
                <div class="row">
                    @foreach($contacts as $contact)
                        @include('contact.partials.card',$contact)
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        $('document').ready(function(){
            $('#top-search').keyup(function(){
                var text = $(this).val().toUpperCase();
                if (text.length >= 3) {
                    $('.contact-card').hide();
                    $('.contact-card:contains('+text+')').show();
                } else {
                    $('.contact-card').show();
                }
            })
        });
    </script>
@endsection