<h3 style="text-align: center">History for the date {{$date}}</h3>
<br/>
<table id="listHistoryByDate" class="table-bordered table-striped" width="100%">
    <thead>
        <tr>
            <th>
                Id
            </th>
            <th>
                Id Customer
            </th>
            <th>
                Call from
            </th>
            <th>
                Call To
            </th>
            <th>
                Date
            </th>
            <th>
                Duration
            </th>
            <th>
                Cost
            </th>
        </tr>
    </thead>
    <tbody>
        @foreach($listDateHistory as $history)
            <tr>
                <td style="border-bottom: 1px solid #e1e8ed">
                    {{$history->getId()}}
                </td>
                <td style="border-bottom: 1px solid #e1e8ed">
                    {{$history->getCustId()}}
                </td>
                <td style="border-bottom: 1px solid #e1e8ed">
                    {{$history->getCallFrom()}}
                </td>
                <td style="border-bottom: 1px solid #e1e8ed">
                    {{$history->getCallTo()}}
                </td>
                <td style="border-bottom: 1px solid #e1e8ed">
                    {{$history->getCallStart()}}
                </td>
                <td style="border-bottom: 1px solid #e1e8ed">
                    {{$history->getCallDuration()}}
                </td>
                <td style="border-bottom: 1px solid #e1e8ed">
                    {{$history->getCost()}}
                </td>
            </tr>
        @endforeach
    <tbody>
</table>

