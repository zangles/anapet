<div class="calendar-page-header">
    <div class="pull-right form-inline">
        <div class="btn-group">
            <button class="btn btn-primary" data-calendar-nav="prev">&lt;&lt; Prev</button>
            <button class="btn" data-calendar-nav="today">Today</button>
            <button class="btn btn-primary" data-calendar-nav="next">Next &gt;&gt;</button>
        </div>
        <div class="btn-group">
            <button class="btn btn-warning active" data-calendar-view="year">Year</button>
            <button class="btn btn-warning" data-calendar-view="month">Month</button>
            <button class="btn btn-warning" data-calendar-view="week">Week</button>
            <button class="btn btn-warning" data-calendar-view="day">Day</button>
        </div>
    </div>
    <h3>2014</h3>
</div>
<hr>
<div id="calendar"></div>

@section('css')
    <link rel="stylesheet" href="{{ asset('css/plugins/boostrap-calendar/calendar.css') }}">
@endsection
@section('script')
    <script type="text/javascript" src="{{ asset('js/plugins/underscore/underscore-min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/plugins/boostrap-calendar/calendar.js') }}"></script>
    <script>
        $('document').ready(function(){
            var calendar = $("#calendar").calendar(
                {
                    view: 'month',
                    classes: {
                        months: {
                            general: 'label'
                        }
                    },
                    tmpl_path: '{{ asset('js/plugins/boostrap-calendar/tmpls/') }}/',
                    events_source: '{{ route('api.turns') }}',
                    onAfterViewLoad: function(view) {
                        $('.calendar-page-header h3').text(this.getTitle());
                        $('.btn-group button').removeClass('active');
                        $('button[data-calendar-view="' + view + '"]').addClass('active');
                    },
                });

            $('.btn-group button[data-calendar-nav]').each(function() {
                var $this = $(this);
                $this.click(function() {
                    calendar.navigate($this.data('calendar-nav'));
                });
            });

            $('.btn-group button[data-calendar-view]').each(function() {
                var $this = $(this);
                $this.click(function() {
                    calendar.view($this.data('calendar-view'));
                });
            });

        });
    </script>
@endsection