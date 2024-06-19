@include('layouts/header')
@section('title', 'Plants')

<div class="list-table">
    @if($plants === null)
    <p> You have no plants !</p>
    <a href="{{ route('front.plants.create') }}" class="button" type="button">Create One !</a>
    @else
    <h3>Filters</h3>
    <div class="filter" style="display: flex; justify-content: left;">
        <input class="search" type="text" id="specie-filter" placeholder="Specie">
        <input class="search" type="text" id="location-filter" placeholder="Location">
        <input class="search" type="text" id="id-filter" placeholder="ID">
        <input class="search" type="text" id="user_id-filter" placeholder="User ID">
    </div>
    <table style="padding-bottom: 2%">
        <br>
        <thead>
        <tr>
            <th>Specie Name</th>
            <th>Location</th>
            <th>Status</th>
            <th>Description</th>
            <th>Picture</th>

        </tr>
        </thead>
        <tbody>

        @foreach ($plants as $plant)
        <tr class="clickable-row" data-href="{{ url('/plants/' . $plant->id) }}">
            <td>{{ $plant->specie_name }}</td>
            <td>{{ $plant->location }}</td>
            <td>{{ $plant->status }}</td>
            <td>{{ $plant->description }}</td>
            <td>{{ $plant->url_photo }}</td>


        </tr>
        @endforeach

</div>
@endif
</table>
</div>


@include('layouts/footer')
