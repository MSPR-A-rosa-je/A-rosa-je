@include('admin')
<div class="list-table">
    <h2 style="padding-bottom: 2%; font-size: 30px">Missions</h2>
    <input class="filter" type="text" id="start_date-filter" placeholder="Mission's Start">
    <input class="filter" type="text" id="id-filter" placeholder="ID">
    <input class="filter" type="text" id="end_date-filter" placeholder="Mission's End">
    <table style="padding-bottom: 2%">
        <caption>Menu</caption>
        <thead>
        <tr>
            <th>Date of Mission's Starting</th>
            <th>Date of Mission's Ending</th>
            <th>ID</th>
            <th>Owner ID</th>
            <th>Gardien ID</th>
            <th>Price</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($missions as $mission)
        <tr class="clickable-row" data-href="{{ url('/missions/' . $mission->id) }}">
            <td>{{ $mission->start_date }}</td>
            <td>{{ $mission->end_date }}</td>
            <td>{{ $mission->id }}</td>
            <td>{{ $mission->owner_id }}</td>
            <td>{{ $mission->gardien_id }}</td>
            <td>{{ $mission->price }}€</td>
        </tr>
</div>
@endforeach
</table>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const specieFilter = document.getElementById('start_date-filter');
        const idFilter = document.getElementById('id-filter');
        const locationFilter = document.getElementById('end_date-filter');

        function filterTable() {
            const specieValue = specieFilter.value.toLowerCase();
            const idValue = idFilter.value.toLowerCase();
            const locationValue = locationFilter.value.toLowerCase();

            document.querySelectorAll('.list-table tbody tr').forEach(function(row) {
                const specieText = row.children[0].textContent.toLowerCase();
                const locationText = row.children[1].textContent.toLowerCase();
                const idText = row.children[2].textContent.toLowerCase();

                const specieMatch = specieText.includes(specieValue);
                const locationMatch = locationText.includes(locationValue);
                const idMatch = idText.includes(idValue);

                if (specieMatch && locationMatch && idMatch) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            });
        }

        specieFilter.addEventListener('input', filterTable);
        idFilter.addEventListener('input', filterTable);
        locationFilter.addEventListener('input', filterTable);
    });
</script>
@include('layouts/footer')
