@include('back.admin')
<div class="list-table">
    <h2 style="padding-bottom: 2%; font-size: 30px">Sessions</h2>
    <input class="filter" type="text" id="plant_list-filter" placeholder="List Of Plants">
    <input class="filter" type="text" id="owner_id-filter" placeholder="Owner ID">
    <input class="filter" type="text" id="mission_id-filter" placeholder="Mission ID">
    <table style="padding-bottom: 2%">
        <thead>
        <tr>
            <th>List of Plants</th>
            <th>Owner ID</th>
            <th>Mission ID</th>
            <th>Note</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($sessions as $session)
        <tr class="clickable-row" data-href="{{ url('/sessions/' . $session->id) }}">
            <td>{{ $session->plant_list }}</td>
            <td>{{ $session->owner_id }}</td>
            <td>{{ $session->mission_id }}</td>
            <td>{{ $session->note }}</td>
        </tr>
</div>
@endforeach
</table>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const specieFilter = document.getElementById('plant_list-filter');
        const idFilter = document.getElementById('owner_id-filter');
        const locationFilter = document.getElementById('mission_id-filter');

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
@include('back.layouts.footer')
