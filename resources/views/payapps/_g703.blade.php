<table class="table">
    <thead>
        <tr>
            <th>#</th>
            <th>Description</th>
            <th>Scheduled Value</th>
            <th>Previous Work Completed</th>
            <th>Previous Stored</th>
            <th>Current Work Completed</th>
            <th>Current Stored</th>
            <th>Total Completed and Stored to Date</th>
            <th>Balance to Finish</th>
            <th>%</th>
        </tr>
    </thead>
    <tbody>
        @foreach($g703Data as $item)
        <tr>
            <td>{{ $item['line_item_id'] }}</td>
            <td>{{ $item['description'] }}</td>
            <td>{{ number_format($item['scheduled_value'], 2) }}</td>
            <td>{{ number_format($item['previous_work_completed'], 2) }}</td>
            <td>{{ number_format($item['previous_stored'], 2) }}</td>
            <td>{{ number_format($item['current_work_completed'], 2) }}</td>
            <td>{{ number_format($item['current_stored'], 2) }}</td>
            <td>{{ number_format($item['total_completed_and_stored_to_date'], 2) }}</td>
            <td>{{ number_format($item['balance_to_finish'], 2) }}</td>
            <td>{{ number_format($item['percentage'], 2) }}</td>
        </tr>
        @endforeach
    </tbody>
</table>