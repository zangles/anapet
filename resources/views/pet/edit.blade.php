@extends('layouts.app')
@section('content')
    <div class="ibox float-e-margins" >
        <form action="{{ route('pets.update', $pet) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="ibox-title">
                <a href="{{ URL::previous() }}" class="pull-right btn btn-xs btn-danger"><i class="fa fa-backward"></i> Back</a>
                <h5><i class="fa fa-user"></i> Pet Info</h5>
            </div>
            <div class="ibox-content">
                <div class="content">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="name">Owner</label>
                                <input type="text" name="name" disabled="" class="form-control" id="name" value="{{ $pet->contact->name }}">
                                <input type="hidden" name="contact_id" value="{{ $pet->contact->id }}">
                            </div>
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" name="name" class="form-control" id="name" placeholder="Name" value="{{ $pet->name }}">
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="email">Sex</label>
                                        <br>
                                        <input type="checkbox" name="sex" id="sex" @if($pet->sex == 'M') checked @endif data-toggle="toggle" data-on="MALE" data-off="FEMALE" data-onstyle="success" data-offstyle="danger" data-width="100%" data-height="50">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="email">Desexed</label>
                                        <br>
                                        <input type="checkbox" name="desexed" @if($pet->desexed == 'Y') checked @endif id="desexed" data-toggle="toggle" data-on="YES" data-off="NO" data-onstyle="primary" data-offstyle="danger" data-width="100%" data-height="50">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="address">Breed</label>
                                        <input type="text" name="breed" class="form-control" id="breed" placeholder="Breed" value="{{ $pet->breed }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="phone">Age</label>
                                        <input type="number" name="age" class="form-control" id="age" placeholder="Age" value="{{ $pet->age }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="description">Notes</label>
                                        <textarea name="notes" id="notes" class="form-control" cols="30" rows="10">{{ $pet->notes }}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="ibox-footer">
                <button class="btn btn-primary"> <i class="fa fa-check"></i> Save Pet</button>
                <button class="btn btn-danger" id="delete"> <i class="fa fa-trash"></i> Delete Pet</button>
            </div>
        </form>
        <form action="{{ route('pets.destroy', $pet) }}" method="POST" id="deleteForm">
            @csrf
            @method('DELETE')
        </form>
    </div>
@endsection
@section('script')
    <script>
        $(document).ready(function(){
            $("#delete").click(function(){
                if(confirm('Are you sure you want delete this pet?')) {
                    $('#deleteForm').submit();
                }
                return false;
            })
        });
    </script>
@endsection
