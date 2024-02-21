@include('admin')
<div class="list-table">
    <h2 style="padding-bottom: 2%; font-size: 30px">Advices</h2>
    <input class="filter" type="text" id="title-filter" placeholder="Title">
    <input class="filter" type="text" id="description-filter" placeholder="Description">
    <input class="filter" type="text" id="owner_id-filter" placeholder="Owner ID">
    <table style="padding-bottom: 2%">
        <caption>Menu</caption>
        <thead>
        <tr>
            <th>Title</th>
            <th>Description</th>
            <th>Owner ID</th>
            <th>Number of Likes</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($advices as $advice)
        <tr class="clickable-row" data-href="{{ url('/advices/' . $advice->id) }}">
            <td>{{ $advice->title }}</td>
            <td>{{ $advice->description }}</td>
            <td>{{ $advice->owner_id }}</td>
            <td>{{ $advice->like_number }}</td>
        </tr>
</div>
@endforeach
</table>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const specieFilter = document.getElementById('title-filter');
        const idFilter = document.getElementById('description-filter');
        const locationFilter = document.getElementById('owner_id-filter');

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
