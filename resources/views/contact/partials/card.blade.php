<div class="col-lg-{{ (isset($cardSize)) ? $cardSize : 4 }} contact-card" >
    <div class="search" style="display: none">
        {{ strtoupper($contact->name) }}
        {{ strtoupper($contact->address) }}
        {{ strtoupper($contact->email) }}
        {{ strtoupper($contact->phone) }}
        @foreach($contact->pet as $pet)
            {{ strtoupper($pet->name) }}
        @endforeach
    </div>
    <div class="contact-box">
        <a href="{{ route('contacts.show', $contact) }}" class="contactLink" id="contact_{{ $contact->id }}" data-id="{{ $contact->id }}" >
            <div class="col-sm-1">
                <div class="text-center">
                    {{--<img alt="image" class="img-square m-t-xs img-responsive" src="img/a2.jpg">--}}
                    <div class="m-t-xs font-bold"></div>
                </div>
            </div>
            <div class="col-sm-11 contactData">
                <h3><strong>{{ $contact->name }}</strong></h3>
                <h5>
                    @foreach($contact->pet as $pet)
                        <i class="fa fa-paw"></i> {{ $pet->name }} <br>
                    @endforeach
                </h5>
                <address>
                    <i class="fa fa-map-marker"></i> {{ $contact->address }}<br>
                    <i class="fa fa-envelope"></i> {{ $contact->email }} <br>
                    <i class="fa fa-phone"></i> {{ $contact->phone }} <br>
                </address>
            </div>
            <div class="clearfix"></div>
        </a>
    </div>
</div>