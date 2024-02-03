@include('admin')
<div class="list-table">
<div class="filter">
    <input class="search" type="text" id="specie-filter" placeholder="Specie">
    <input class="search" type="text" id="id-filter" placeholder="ID">
    <input class="search" type="text" id="location-filter" placeholder="Location">
</div>
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
        const specieFilter = document.getElementById('specie-filter');
        const idFilter = document.getElementById('id-filter');
        const locationFilter = document.getElementById('location-filter');

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
