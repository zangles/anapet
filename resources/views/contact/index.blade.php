@extends('layouts.app')
@section('content')
    @if ( session('message') )
        @php list($type, $message) = explode('|', session('message')) @endphp
        <div class='alert alert-{{ $type }} alert-dismissible' role='alert'>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            {{ $message }}
        </div>
    @endif
    @include('contact.partials.contactList')
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