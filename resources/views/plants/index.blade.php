@include('admin')
<div class="list-table">
<div class="filter">
    <input class="search" type="text" id="specie-filter" placeholder="Specie">
    <input class="search" type="text" id="location-filter" placeholder="Location">
    <input class="search" type="text" id="id-filter" placeholder="ID">
    <input class="search" type="text" id="user_id-filter" placeholder="User ID">
</div>
    <table style="padding-bottom: 2%">
        <thead>
            <tr>
                <th>Specie Name</th>
                <th>Location</th>
                <th>ID</th>
                <th>User ID</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($plants as $plant)
            <tr class="clickable-row" data-href="{{ url('/plants/' . $plant->id) }}">
                <td>{{ $plant->specie_name }}</td>
                <td>{{ $plant->location }}</td>
                <td>{{ $plant->id }}</td>
                <td>{{ $plant->owner_id }}</td>
            </tr>
</div>
@endforeach
</table>
</div>
@include('layouts/footer')
