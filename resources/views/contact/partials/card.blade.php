<div class="col-lg-4 contact-card">
    <div class="search" style="display: none">
        {{ strtoupper($contact->name) }}
        {{ strtoupper($contact->address) }}
        {{ strtoupper($contact->email) }}
        {{ strtoupper($contact->phone) }}
    </div>
    <div class="contact-box">
        <a href="{{ route('contacts.show', $contact) }}">
            <div class="col-sm-4">
                <div class="text-center">
                    {{--<img alt="image" class="img-square m-t-xs img-responsive" src="img/a2.jpg">--}}
                    <div class="m-t-xs font-bold"></div>
                </div>
            </div>
            <div class="col-sm-8">
                <h3><strong>{{ $contact->name }}</strong></h3>
                <address>
                    <i class="fa fa-map-marker"></i> {{ $contact->address }}<br>
                    <i class="fa fa-envelope"></i> {{ $contact->email }} <br>
                    <i class="fa fa-phone"></i> {{ $contact->phone }} <br>
                </address>
                <i class="fa fa-calendar"></i> <abbr title="Next Turn">NT:</abbr> 15/10/2018 15:00 hs
            </div>
            <div class="clearfix"></div>
        </a>
    </div>
</div>