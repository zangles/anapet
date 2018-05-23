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
            </div>
            <div class="ibox-content">
                <div class="content">
                    <div class="row">
                        <div class="col-md-12">
                            @include('contact.partials.card', ['contact'=>$turn->contact,'cardSize'=>12])
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-6">
        <div class="ibox float-e-margins" >
            <div class="ibox-title">
                <a href="#" class="pull-right btn btn-xs btn-danger deleteTurn"><i class="fa fa-trash"></i> Delete turn</a>
                <a href="{{ route('turns.edit', $turn) }}" class="pull-right btn btn-xs btn-info" style="margin-right: 15px"><i class="fa fa-pencil"></i> Edit turn</a>
                <h5><i class="fa fa-calendar"></i> Turn info</h5>
            </div>
            <div class="ibox-content">
                <div class="content">
                    <div class="row">
                        <div class="col-md-12">
                            <dl class="dl-horizontal">
                                <dt>Start:</dt>
                                <dd>{{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s',$turn->start)->format('d/m/Y H:i') }} Hs</dd>
                            </dl>
                            <dl class="dl-horizontal">
                                <dt>End:</dt>
                                <dd>{{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s',$turn->end)->format('d/m/Y H:i') }} Hs</dd>
                            </dl>
                            <dl class="dl-horizontal">
                                <dt>Comments:</dt>
                                <dd>{{ $turn->comments }}</dd>
                            </dl>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <form action="{{ route('turns.destroy', $turn) }}" method="POST" id="deleteForm">
        @csrf
        @method('DELETE')
    </form>
@endsection
@section('script')
    <script>
        $(document).ready(function(){
            $('.deleteTurn').click(function () {
                swal({
                    title: "Are you sure?",
                    text: "You will not be able to recover it!",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#F5475A",
                    confirmButtonText: "Yes, delete it!",
                    closeOnConfirm: false
                }, function () {
                    $('#deleteForm').submit();
                });
                return false;
            });
        });
    </script>
@endsection
