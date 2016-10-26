<h3 style="text-align: center">History By date for user {{$id_cust}}</h3>
<br/>
<table id="listByDateForCust" class="table-bordered table-striped" width="100%">
    <thead>
        <tr>
            <th>
                Date
            </th>
            <th>
                Cost
            </th>
        </tr>
    </thead>
    <tbody>
        @foreach($listDailyCost as $date => $cost)
            <tr>
                <td style='cursor: pointer' onclick="displayDate('{{$date}}')">
                    <span >{{$date}}</span>
                </td>
                <td>
                    {{$cost}}
                </td>
            </tr>
        @endforeach
    <tbody>
</table>