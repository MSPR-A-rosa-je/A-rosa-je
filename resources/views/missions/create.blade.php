@include('admin')
<body>
<h2>Create Mission</h2>
<form action="/missions" method="POST">
    @csrf


    <label for="start_date">Date of Mission's Starting:</label>
    <input type="date" id="start_date" name="start_date" required><br><br>

    <label for="end_date">Date of Mission's Ending:</label>
    <input type="date" id="end_date" name="end_date" required><br><br>

    <label for="owner_id">Owner ID:</label>
    <input type="text" id="owner_id" name="owner_id" required><br><br>

    <label for="candidates_list">List of Candidates:</label>
    <input type="text" id="candidates_list" name="candidates_list" required><br><br>

    <label for="price">Price:</label>
    <input type="text" id="price" name="price" required><br><br>

    <label for="description">Description:</label>
    <input type="text" id="description" name="description" required><br><br>

    <label for="gardien_id">Gardien ID:</label>
    <input type="text" id="gardien_id" name="gardien_id" required><br><br>

    <label for="number_of_sessions">Number of Sessions:</label>
    <input type="text" id="number_of_sessions" name="number_of_sessions" required><br><br>

    <label for="plants_list">List of Plants:</label>
    <input type="text" id="plants_list" name="plants_list" required><br><br>

    <button class="button" type="submit"">Submit</button>
</form>
</body>
