@extends('layouts.app')
@section('content')
    <div class="ibox float-e-margins" >
        <form action="{{ route('contacts.store') }}" method="POST">
            @csrf
            <div class="ibox-title">
                <a href="{{ route('contacts.index') }}" class="pull-right btn btn-xs btn-danger"><i class="fa fa-backward"></i> Back</a>
                <h5><i class="fa fa-user"></i> Contacts Info</h5>
            </div>
            <div class="ibox-content">
                <div class="content">
                    <div class="row">
                        <div class="col-md-12">
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" name="name" class="form-control" id="name" placeholder="Name">
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" name="email" class="form-control" id="email" placeholder="Email">
                                </div>
                                <div class="form-group">
                                    <label for="address">Addess</label>
                                    <input type="text" name="address" class="form-control" id="address" placeholder="Address">
                                </div>
                                <div class="form-group">
                                    <label for="phone">Phone</label>
                                    <input type="text" name="phone" class="form-control" id="phone" placeholder="Phone">
                                </div>
                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <textarea name="description" id="description" class="form-control" cols="30" rows="10"></textarea>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="ibox-footer">
                <button class="btn btn-primary"> <i class="fa fa-check"></i> Save</button>
            </div>
        </form>
    </div>
@endsection