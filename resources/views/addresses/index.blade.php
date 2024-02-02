@include('admin')
<div class="address-table">
    <table style="padding-bottom: 2%">
        <thead>
        <tr>
            <th>Address</th>
            <th>City</th>
            <th>Zip Code</th>
            <th>ID</th>
            <th>User ID</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($addresses as $address)
        <tr class="clickable-row" data-href="{{ url('/addresses/' . $address->id) }}">
            <td>{{ $address->address }}</td>
            <td>{{ $address->city }}</td>
            <td>{{ $address->zip_code }}</td>
            <td>{{ $address->id }}</td>
            <td>{{ $address->user_id }}</td>
        </tr>
</div>
@endforeach
</table>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const rows = document.querySelectorAll('.clickable-row');

        rows.forEach(row => {
            row.addEventListener('click', () => {
                window.location.href = row.dataset.href;
            });
        });
    });
</script>
</body>

</html>
