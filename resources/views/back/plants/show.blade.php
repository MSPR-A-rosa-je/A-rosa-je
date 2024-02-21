@include('back.admin')
<body>
<div>
    <h2 class="logo">Profil of '{{ $plant->id }}'</h2>
    <div class="plant-table">
        <table>
            <thead>
            <tr>
                <th>ID</th>
                <th>Specie name</th>
                <th>Owner ID</th>
                <th>Location</th>
                <th>URL Photo</th>
                <th>Status</th>
                <th>Description</th>
            </tr>
            </thead>
            <tbody>
            <tr class="clickable-row">
                <td>{{ $plant->id }}</td>
                <td>{{ $plant->specie_name }}</td>
                <td>{{$plant->owner_id}}</td>
                <td>{{ $plant->location }}</td>
                <td>{{ $plant->url_photo }}</td>
                <td>{{ $plant->status }}</td>
                <td>{{ $plant->description }}</td>
            </tr>
            </tbody>
        </table>
    </div>
    <div>
        <form action="{{ route('plants.destroy', $plant->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <a href="/plants" class="button" style="margin-right: 66em; margin-left: 2em">Back</a>
            <a class="button" href="{{route('plants.edit', $plant->id)}}">Edit</a>
            <button class="button" type="submit" onclick="return confirm('Are you sure you want to delete this plant?');">Delete</button>
        </form>
    </div>
</div>
</body>
