@include('admin')
<div class="list-table">
    <input class="filter" type="text" id="pseudo-filter" placeholder="Pseudo">
    <input class="filter" type="text" id="id-filter" placeholder="ID">
    <input class="filter" type="text" id="email-filter" placeholder="Email">
    <table>
        <thead>
            <tr>
                <th>Pseudo</th>
                <th>Email</th>
                <th>ID</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
            <tr class="clickable-row" data-href="{{ url('/users/' . $user->id) }}">
                <td>{{ $user->pseudo }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->id }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@include('layouts/footer')



