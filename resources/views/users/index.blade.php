@include('header')

<div class="message-container" style="">
    @if (session('error'))
    <div style="color: red;">
        {{ session('error') }}
    </div>
    @endif
    @if (session('success'))
    <div style="color: green;">
        {{ session('success') }}
    </div>
    @endif
</div>

<div class="user-table">
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
