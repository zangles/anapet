<div class="col-lg-{{ (isset($cardSize)) ? $cardSize : 4 }} contact-card" >
    <div class="search" style="display: none">
        {{ strtoupper($pet->name) }}
        {{ strtoupper($pet->breed) }}
    </div>
    <div class="contact-box">
        <a href="{{ route('pets.edit', $pet) }}" >
            <div class="col-sm-1">
                <div class="text-center">
                    {{--<img alt="image" class="img-square m-t-xs img-responsive" src="img/a2.jpg">--}}
                    <div class="m-t-xs font-bold"></div>
                </div>
            </div>
            <div class="col-sm-11 contactData">
                <h3><strong>{{ $pet->name }}</strong></h3>
                <dl class="dl-horizontal">
                    <dt>Sex:</dt>
                    <dd>@if ($pet->sex == 'M') Male <i class="fas fa-mars text-success"></i> @else Female <i class="fas fa-venus text-danger"></i> @endif</dd>
                </dl>
                <dl class="dl-horizontal">
                    <dt>Desexed:</dt>
                    <dd>@if ($pet->desexed == 'Y') <i class="fas fa-check text-success"></i> @else <i class="fas fa-times text-danger"></i> @endif</dd>
                </dl>
                <dl class="dl-horizontal">
                    <dt>Breed:</dt>
                    <dd>{{ $pet->breed }}</dd>
                </dl>
                <dl class="dl-horizontal">
                    <dt>Age:</dt>
                    <dd>{{ $pet->age }}</dd>
                </dl>
                <dl>
                    <dt>Notes:</dt>
                    <dd>{{ $pet->notes }}</dd>
                </dl>
            </div>
            <div class="clearfix"></div>
        </a>
    </div>
</div>