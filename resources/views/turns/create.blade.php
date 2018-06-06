@extends('layouts.app')
@section('content')
    <div class="ibox float-e-margins" >

            @csrf
            <div class="ibox-title">
                <a href="{{ route('turns.index') }}" class="pull-right btn btn-xs btn-danger"><i class="fa fa-backward"></i> Back</a>
                <h5><i class="fa fa-user"></i> Turn Info</h5>
            </div>
            <div class="ibox-content">
                <div class="content">
                    <div class="row">
                        {{-- CONTACTS --}}
                        <div class="col-md-4 contactSearch" style="max-height: 500px; overflow-x: auto; border-right: 1px solid #E6E9EB">
                            @include('contact.partials.contactList',['cardSize' => 12])
                        </div>

                        {{-- TURN INFO --}}
                        <div class="col-md-4" style="border-right: 1px solid #E6E9EB; height: 500px">
                            <dl>
                                <dt>Contact</dt>
                                <dd><div class="form-group contactInfo"></div></dd>
                            </dl>

                            <dl>
                                <dt>Date and Hour:</dt>
                                <dd><div class="form-group turnDate text-center"></div></dd>
                            </dl>

                            <div class="form-group text-center">
                                <form action="{{ route('turns.store') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="contact_id" id="contact_id">
                                    <input type="hidden" name="date" id="date">
                                    <input type="hidden" name="repeat" id="repeat">
                                    <input type="hidden" name="turn_type_id" id="turn_type_id">
                                    <dl>
                                        <dt>Comments:</dt>
                                        <dd>
                                            <textarea name="comments" id="" cols="30" rows="10" class="form-control"></textarea>
                                        </dd>
                                    </dl>
                                    <button class="btn btn-primary saveTurn" style="width: 90%"> Save Turn</button>
                                </form>
                            </div>
                        </div>

                        {{-- DATE PICKER --}}
                        <div class="col-md-4">
                            {{--DATE--}}
                            <div class="form-group" id="data_1">
                                <label class="font-normal">Select Date</label>
                                <div class="input-group date">
                                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input type="text" id="datePick" class="form-control" value="">
                                </div>
                            </div>
                            {{--TURNS--}}
                            <div class="turnsTaken"></div>
                            {{--TURN TYPE--}}
                            <div class="form-group" id="dateTypeDiv">
                                <label class="font-normal">Select Type</label>
                                <select class="form-control" id="dateType">
                                    <option> - Select One - </option>
                                    @foreach(\App\TurnType::all() as $turnType)
                                        <option value="{{ $turnType->id }}"> {{ $turnType->name }} </option>
                                    @endforeach
                                </select>
                            </div>
                            {{--REPEAT--}}
                            <div class="checkbox" id="repeatCheckDiv">
                                <label>
                                    <input type="checkbox" class="repeatCheck i-checks" > Repeat
                                </label>
                            </div>
                            <div class="form-group" id="repeatDiv">
                                <label class="font-normal">For Days</label>
                                <input type="number" class="form-control"  name="" id="repeatDay" value="1">
                            </div>
                            {{--SELECT--}}
                            <div class="form-group text-center">
                                <br>
                                <button class="btn btn-success selectDay" style="width: 90%">Select Day</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
@section('script')
    <script src="{{ asset('js/plugins/datapicker/bootstrap-datepicker.js') }}"></script>
    <script src="{{ asset('js/plugins/iCheck/icheck.min.js') }}"></script>

    <script>
        $('document').ready(function(){
            clockpicker = $('.clockpicker');
            clockpicker2 = $('.clockpicker2');
            selectDay = $('.selectDay');
            saveTurn = $(".saveTurn");
            dateTypeDiv = $("#dateTypeDiv");
            dateType = $("#dateType");
            repeatCheckDiv = $("#repeatCheckDiv");
            repeatDiv = $("#repeatDiv");
            repeat = $("#repeat");
            repeatDiv.hide();
            repeatCheckDiv.hide();
            dateTypeDiv.hide();
            selectDay.hide();
            saveTurn.hide();

            $(document).ready(function () {
                $('.i-checks').iCheck({
                    checkboxClass: 'icheckbox_square-green',
                    radioClass: 'iradio_square-green',
                });
            });


            $('.repeatCheck').on('ifChecked', function(event){
                repeatDiv.show();
            });

            $('.repeatCheck').on('ifUnchecked', function(event){
                selectinDate();
                repeatDiv.hide();
                repeat.val('');
            });

            $('#data_1 .input-group.date').datepicker({
                todayBtn: "linked",
                keyboardNavigation: false,
                forceParse: false,
                calendarWeeks: true,
                autoclose: true,
                format:'yyyy-mm-dd'
            });

            $("#datePick").change(function(){
                fromDate = new Date($(this).val()).getTime();
                toDate = fromDate + (60 * 60 * 24 * 1000);

                $.getJSON('{{ route('api.turns') }}?from='+fromDate+'&to='+toDate, function(data){
                    taken = $(".turnsTaken");
                    if (data.result.length === 0){
                        taken.html('<strong>No turns in this day</strong>');
                    } else {
                        taken.html('');
                        taken.append('<strong>Turns in this day:</strong> <br>');
                        $(data.result).each(function(index){
                            taken.append('<a href='+this.url+' target="_blank">'+this.title+ '</a><br>');
                        });
                    }
                    taken.append('<hr>');

                    dateTypeDiv.show();
                    repeatCheckDiv.show();
                });
            });

            dateType.change(function() {
                selectDay.show();
            });

            selectDay.click(function(){
                selectinDate();
                return false;
            });



            $('#top-search').keyup(function(){
                var text = $(this).val().toUpperCase();
                if (text.length >= 3) {
                    $('.contact-card').hide();
                    $('.contact-card:contains('+text+')').show();
                } else {
                    $('.contact-card').show();
                }
            });

            $('#newContact').remove();

            $('.contactLink').click(function(){
                selectContact($(this).data('id'));
                return false;
            });


            @if($contact != null)
                selectContact('{{ $contact }}');
                $(".contactSearch").html('&nbsp');
            @endif
        });

        function selectinDate() {
            date = $("#datePick").val();

            $('#turn_type_id').val(dateType.val());
            $('#date').val(date);

            repeatText = '';
            if ($(".repeatCheck").prop('checked')) {
                days = $("#repeatDay").val();
                repeat.val(days);
                repeatText = 'For ' + days + ' days';
            }


            turnType = $("#dateType option:selected").text();
            $(".turnDate").html('<h2><strong>' + date + " " + turnType + ' ' + repeatText + '</strong></h2>');
            saveTurn.show();
        }

        function selectContact (id) {
            element = $('#contact_'+id);
            $("#contact_id").val($(element).data('id'));
            contactData = $(element).find('.contactData').clone();
            $('.contactInfo').html(contactData);
        }
    </script>
@endsection
@section('css')
    <link href="{{ asset('css/plugins/datapicker/datepicker3.css') }}" rel="stylesheet">
    <link href="{{ asset('css/plugins/iCheck/custom.css') }}" rel="stylesheet">
@endsection
