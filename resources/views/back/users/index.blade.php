@include('back.admin')
<div class="user-table">
<div class="filter">
    <input class="search" type="text" id="pseudo-filter" placeholder="Pseudo">
    <input class="search" type="text" id="id-filter" placeholder="ID">
    <input class="search" type="text" id="email-filter" placeholder="Email">
</div>
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
<script src="{{ asset('assets/js/app.js') }}"></script>

@include('back.layouts.footer')



