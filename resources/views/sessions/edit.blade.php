@include('admin')

<body>
<h2>Edit Session</h2>
<form action="/sessions/{{ $session->id }}" method="POST">
    @method('PATCH')
    @csrf

    <label for="id">ID:</label>
    <p></p>{{ $session->id }}</p>

    <label for="list_plant">List of Plants:</label>
    <input type="text" id="list_plant" name="list_plant" value="{{ $advice->list_plant}}"><br><br>

    <label for="owner_id">Owner ID:</label>
    <input type="text" id="owner_id" name="owner_id" value="{{$advice->owner_id}}"><br><br>

    <label for="mission_id">Mission ID:</label>
    <input type="text" id="mission_id" name="mission_id" value="{{ $advice->mission_id}}"=><br><br>

    <label for="note">Note:</label>
    <input type="text" id="note" name="note" value="{{ $advice->note}}"><br><br>

    <button class="button" type="submit"">Submit</button>
</form>
</body>
