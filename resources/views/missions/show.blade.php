@include('admin')
<body>
<div>
    <h2 class="logo">Profil of '{{ $mission->id }}'</h2>
    <div class="mission-table">
        <table>
            <thead>
            <tr>
                <th>Date of Mission's Starting</th>
                <th>Date of Mission's Ending</th>
                <th>ID</th>
                <th>Owner ID</th>
                <th>Gardien ID</th>
                <th>Price</th>
            </tr>
            </thead>
            <tbody>
            <tr class="clickable-row">
                <td>{{ $mission->start_date }}</td>
                <td>{{ $mission->end_date }}</td>
                <td>{{$mission->id}}</td>
                <td>{{ $mission->owner_id }}</td>
                <td>{{ $mission->gardien_id }}</td>
                <td>{{ $mission->price }}</td>
            </tr>
            </tbody>
        </table>
    </div>
    <div>
        <form action="{{ route('missions.destroy', $mission->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <a href="/missions" class="button" style="margin-right: 66em; margin-left: 2em">Back</a>
            <a class="button" href="{{route('missions.edit', $mission->id)}}">Edit</a>
            <button class="button" type="submit" onclick="return confirm('Are you sure you want to delete this mission?');">Delete</button>
        </form>
    </div>
</div>
</body>
