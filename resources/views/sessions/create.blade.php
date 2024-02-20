@include('admin')
<body>
<h2>Create session</h2>
<form action="/sessions" method="POST">
    @csrf

    <label for="plant_list">List of Plants:</label>
    <input type="text" id="plant_list" name="plant_list" required><br><br>

    <label for="owner_id">Owner ID:</label>
    <input type="text" id="owner_id" name="owner_id" required><br><br>

    <label for="mission_id">Mission ID:</label>
    <input type="text" id="mission_id" name="mission_id" required><br><br>

    <label for="note">Note:</label>
    <input type="text" id="note" name="note" required><br><br>

    <button class="button" type="submit"">Submit</button>
</form>
</body>
