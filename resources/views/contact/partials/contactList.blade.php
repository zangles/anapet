<div class="ibox float-e-margins" >
    <div class="ibox-title">
        <a id="newContact" href="{{ route('contacts.create') }}" class="pull-right btn btn-xs btn-success"><i class="fa fa-plus"></i> New contact</a>
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

