@include('back.admin')
<body>
<div>
    <h2 class="logo">Profil of '{{ $session->id }}'</h2>
    <div class="session-table">
        <table>
            <thead>
            <tr>
                <th>List Of Plants</th>
                <th>Owner ID/th>
                <th>Mission ID</th>
                <th>Note</th>
            </tr>
            </thead>
            <tbody>
            <tr class="clickable-row">
                <td>{{ $session->plant_list }}</td>
                <td>{{ $session->owner_id }}</td>
                <td>{{$session->mission_id}}</td>
                <td>{{ $session->note }}</td>
            </tr>
            </tbody>
        </table>
    </div>
    <div>
        <form action="{{ route('sessions.destroy', $session->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <a href="/sessions" class="button" style="margin-right: 66em; margin-left: 2em">Back</a>
            <a class="button" href="{{route('sessions.edit', $session->id)}}">Edit</a>
            <button class="button" type="submit" onclick="return confirm('Are you sure you want to delete this session?');">Delete</button>
        </form>
    </div>
</div>
</body>
