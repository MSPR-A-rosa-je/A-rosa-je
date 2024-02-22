@include('back.admin')
<body>
<div>
    <h2 class="logo">Profil of '{{ $advice->id }}'</h2>
    <div class="advice-table">
        <table>
        <caption>Menu</caption>
            <caption>Menu</caption>
            <thead>
            <tr>
                <th>Title</th>
                <th>Description/th>
                <th>Owner ID</th>
                <th>Number of Likes</th>
            </tr>
            </thead>
            <tbody>
            <tr class="clickable-row">
                <td>{{ $advice->title }}</td>
                <td>{{ $advice->description }}</td>
                <td>{{$advice->owner_id}}</td>
                <td>{{ $advice->like_number }}</td>
            </tr>
            </tbody>
        </table>
    </div>
    <div>
        <form action="{{ route('advices.destroy', $advice->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <a href="/advices" class="button" style="margin-right: 66em; margin-left: 2em">Back</a>
            <a class="button" href="{{route('advices.edit', $advice->id)}}">Edit</a>
            <button class="button" type="submit" onclick="return
             confirm('Are you sure you want to delete this advice?');">Delete</button>
        </form>
    </div>
</div>
</body>
