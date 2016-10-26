@extends('master')
@section('content')

    @include('header')
    <style>
        .loader {
            border: 10px solid #f3f3f3; /* Light grey */
            border-top: 10px solid #3498db; /* Blue */
            border-radius: 50%;
            width: 50px;
            height: 50px;
            animation: spin 2s linear infinite;
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
        </style>
    <br/>
    <h3 style="text-align: center"><b>History By user</b></h3>
    <br/>
    <table id="listCust" class="table-bordered table-striped" width="100%">
        <thead>
            <tr>
                <th>
                    Id Cust
                </th>
                <th>
                    Cost
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach($listHistory as $history)
                <tr id="{{$history->getCustId()}}">
                    <td style='cursor: pointer' onclick="displayDaily({{$history->getCustId()}})">
                        <span >{{$history->getCustId()}}</span>
                    </td>
                    <td>
                        {{$history->getTotalCost()}} euros
                    </td>
                </tr>
            @endforeach
        <tbody>
    </table>
    <br/>

    <div id="dailyCost">

    </div>
    <br/>
    <div id="dateHistory">
    </div>
@stop

@section('js')
    <script src="{{asset('asset/js/dataTables.js')}}"></script>

    <script>
        $(document).ready(function(){
            $('#listCust').DataTable( {
                "paging":   false,
                "ordering": true,
                "info":     false,
                "searching": false
            } );

        });


        function displayDaily(id_cust){
            url = '{{route('dailyRequest')}}';
            data = {id_cust: id_cust};
            $('#dateHistory').html('');
            $('#dailyCost').html('<div class="loader" style="text-align: center;margin-left: 50%"></div>');

            $.ajax({
                url: url,
                data: data,
                type: 'GET',
                dataType: 'JSON',
                success: function (data) {
                    if(data.success){
                        $('#dailyCost').html(data.response);
                        $('#listByDateForCust').DataTable( {
                            "paging":   false,
                            "ordering": true,
                            "info":     false,
                            "searching": false
                        } );
                    }
                    else{

                    }
                }
            });
        }

        function displayDate(date){
            url = '{{route('dateRequest')}}';
            data = {date: date};
            $('#dateHistory').html('<div class="loader" style="text-align: center;margin-left: 50%"></div>');
            $.ajax({
                url: url,
                data: data,
                type: 'GET',
                dataType: 'JSON',
                success: function (data) {
                    if(data.success){
                        $('#dateHistory').html(data.response);
                        $('#listHistoryByDate').DataTable( {
                            "paging":   false,
                            "ordering": true,
                            "info":     false,
                            "searching": false
                        } );
                    }
                    else{

                    }

                }

            });



        }
    </script>



@stop