@include('back.admin')
<div class="address-table">

    <div class="filter">
        <input class="search" type="text" id="id-filter" placeholder="ID">
        <input class="search" type="text" id="address-filter" placeholder="Address">
        <input class="search" type="text" id="city-filter" placeholder="City">
        <input class="search" type="text" id="zip_code-filter" placeholder="Zip Code">
        <input class="search" type="text" id="user_id-filter" placeholder="User ID">
    </div>
    <table style="padding-bottom: 2%">
    <caption>Menu</caption>
        <thead>
            <tr>
                <th>Address</th>
                <th>City</th>
                <th>Zip Code</th>
                <th>ID</th>
                <th>User ID</th>
            </tr>
        </thead>
        <tbody id="table-body">
            @foreach ($addresses as $address)
            <tr class="clickable-row" data-href="{{ url('/addresses/' . $address->id) }}">
                <td>{{ $address->address }}</td>
                <td>{{ $address->city }}</td>
                <td>{{ $address->zip_code }}</td>
                <td>{{ $address->id }}</td>
                <td>{{ $address->user_id }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@include('back.layouts.footer')

