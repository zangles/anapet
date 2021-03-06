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
                                <form action="{{ route('turns.update', $turn) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <input type="hidden" name="contact_id" id="contact_id">
                                    <input type="hidden" name="date" id="date" value="{{ $turn->date }}">
                                    <input type="hidden" name="turn_type_id" id="turn_type_id" value="{{ $turn->turn_type_id }}">
                                    <dl>
                                        <dt>Comments:</dt>
                                        <dd>
                                            <textarea name="comments" id="" cols="30" rows="10" class="form-control">{{ $turn->comments }}</textarea>
                                        </dd>
                                    </dl>
                                    <button class="btn btn-primary saveTurn" style="width: 90%"> Update Turn</button>
                                </form>
                            </div>
                        </div>

                        {{-- DATE PICKER --}}
                        <div class="col-md-4">
                            {{--DATE--}}
                            <div class="form-group" id="data_1">
                                <label class="font-normal">Select Date</label>
                                <div class="input-group date">
                                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input type="text" id="datePick" class="form-control"
                                        value="{{ $turn->date }}">
                                </div>
                            </div>
                            {{--TURNS--}}
                            <div class="turnsTaken"></div>
                            {{--TUTN TYPE--}}
                            <div class="form-group" id="dateTypeDiv">
                                <label class="font-normal">Select Type</label>
                                <select class="form-control" id="dateType">
                                    <option> - Select One - </option>
                                    @foreach(\App\TurnType::all() as $turnType)
                                        <option value="{{ $turnType->id }}" @if($turnType->id == $turn->turn_type_id) selected @endif > {{ $turnType->name }} </option>
                                    @endforeach
                                </select>
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

    <script>
        $('document').ready(function(){
            selectDay = $('.selectDay');
            saveTurn = $(".saveTurn");
            dateType = $("#dateType");

            $('#data_1 .input-group.date').datepicker({
                todayBtn: "linked",
                keyboardNavigation: false,
                forceParse: false,
                calendarWeeks: false,
                autoclose: true,
                startDate: "yesterday",
                todayHighlight: true,
                format:'yyyy-mm-dd'
            });

            $("#date").change(function(){
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
                    divStart.show();
                    divEnd.show();
                });
            });

            $("#hour").change(function(){
                hourStart = $(this).val();
                hourEnd = $("#hour2").val();

                if (hourStart !== '' && hourEnd !== '') {
                    date = $("#date").val();
                    selectDay.html('Select Day '+ date + " "+ hourStart + ' - ' + hourEnd);
                    selectDay.show();
                }

            });

            $("#hour2").change(function(){
                hourStart = $("#hour").val();
                hourEnd = $(this).val();

                if (hourStart !== '' && hourEnd !== '') {
                    date = $("#date").val();
                    selectDay.html('Select Day '+date + " "+ hourStart + ' - ' + hourEnd);
                    selectDay.show();
                }
            });

            selectDay.click(function(){
                selectinDate();
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

            selectContact('{{ $turn->contact->id }}');
        });

        function selectinDate() {
            date = $("#datePick").val();

            $('#turn_type_id').val(dateType.val());
            $('#date').val(date);

            turnType = $("#dateType option:selected").text();
            $(".turnDate").html('<h2><strong>' + date + " " + turnType + ' ' + '</strong></h2>');
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
@endsection
