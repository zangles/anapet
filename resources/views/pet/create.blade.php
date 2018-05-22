@extends('layouts.app')
@section('content')
    <div class="ibox float-e-margins" >
        <form action="{{ route('pets.store') }}" method="POST">
            @csrf
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
                                <input type="text" name="name" disabled="" class="form-control" id="name" value="{{ $contact->name }}">
                                <input type="hidden" name="contact_id" value="{{ $contact->id }}">
                            </div>
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" name="name" class="form-control" id="name" placeholder="Name">
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="email">Sex</label>
                                        <br>
                                        <input type="checkbox" name="sex" id="sex" checked data-toggle="toggle" data-on="MALE" data-off="FEMALE" data-onstyle="success" data-offstyle="danger" data-width="100%" data-height="50">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="email">Desexed</label>
                                        <br>
                                        <input type="checkbox" checked  name="desexed" id="desexed" data-toggle="toggle" data-on="YES" data-off="NO" data-onstyle="primary" data-offstyle="danger" data-width="100%" data-height="50">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="address">Breed</label>
                                        <input type="text" name="breed" class="form-control" id="breed" placeholder="Breed">
                                    </div>
                                    <div class="form-group">
                                        <label for="phone">Age</label>
                                        <input type="number" name="age" class="form-control" id="age" placeholder="Age">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="description">Notes</label>
                                        <textarea name="notes" id="notes" class="form-control" cols="30" rows="10"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="ibox-footer">
                <button class="btn btn-primary"> <i class="fa fa-check"></i> Save Pet</button>
            </div>
        </form>
    </div>
@endsection