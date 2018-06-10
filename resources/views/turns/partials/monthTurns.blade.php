<h3>Month Turns</h3>
<hr>
<ul>
    @php
        $firstDate = 0;
    @endphp
    @foreach($turnsCollection as $turn)
        @php $turnArray = $turn->toArray($request);@endphp

        @if ($turnArray['meta']['date'] <> $firstDate)
            @php $firstDate = $turnArray['meta']['date'] @endphp
            </ul>
            <li><strong>{{ $firstDate  }}</strong>
                <ul>
                    <li class="turnListItem"><a href="{{ $turnArray['url'] }}">{{ $turnArray['meta']['title'] }}</a></li>
        @else
            <li class="turnListItem"><a href="{{ $turnArray['url'] }}">{{ $turnArray['meta']['title'] }}</a></li>
        @endif
    @endforeach
    </li>
</ul>