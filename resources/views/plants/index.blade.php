@include('header')
<div class="plant-table">
    <table style="padding-bottom: 2%">
        <thead>
        <tr>
            <th>Specie Name</th>
            <th>Location</th>
            <th>ID</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($plants as $plant)
        <tr class="clickable-row" data-href="{{ url('/plants/' . $plant->id) }}">
            <td>{{ $plant->specie_name }}</td>
            <td>{{ $plant->location }}</td>
            <td>{{ $plant->id }}</td>
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
