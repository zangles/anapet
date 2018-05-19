@extends('layouts.app')
@section('content')
    <div class="ibox float-e-margins" >
        <form action="{{ route('contacts.update', $contact) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="ibox-title">
                <a href="{{ route('contacts.show', $contact) }}" class="pull-right btn btn-xs btn-danger"><i class="fa fa-backward"></i> Back</a>
                <h5><i class="fa fa-user"></i> Contacts Info</h5>
            </div>
            <div class="ibox-content">
                <div class="content">
                    <div class="row">
                        <div class="col-md-12">
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" name="name" class="form-control" id="name" placeholder="Name" value="{{ $contact->name }}">
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" name="email" class="form-control" id="email" placeholder="Email" value="{{ $contact->email }}">
                                </div>
                                <div class="form-group">
                                    <label for="address">Addess</label>
                                    <input type="text" name="address" class="form-control" id="address" placeholder="Address" value="{{ $contact->address }}">
                                </div>
                                <div class="form-group">
                                    <label for="phone">Phone</label>
                                    <input type="text" name="phone" class="form-control" id="phone" placeholder="Phone" value="{{ $contact->phone }}">
                                </div>
                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <textarea name="description" id="description" class="form-control" cols="30" rows="10">{{ $contact->description }}</textarea>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="ibox-footer">
                <button class="btn btn-primary"> <i class="fa fa-check"></i> Save</button>
                <button class="btn btn-danger" id="deleteContact"> <i class="fa fa-trash"></i> Delete</button>
                <form action="{{ route('contacts.destroy', $contact) }}" method="post" style="display: none" id="deleteForm">
                    @csrf
                    @method('DELETE')
                </form>
            </div>
        </form>
    </div>
@endsection
@section('script')
    <script>
        $('document').ready(function(){
            $("#deleteContact").click(function(){
                if(confirm('Are you sure you want to delete the contact?')) {
                    $("#deleteForm").submit();
                } else {
                    return false;
                }
            })
        })
    </script>
@endsection