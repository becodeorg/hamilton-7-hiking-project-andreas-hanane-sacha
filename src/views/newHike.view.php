<form action="/" method="post">
    <div>
        <label for="name">Name : </label>
        <input type="text" name="name">
    </div>
    <div>
        <label for="distance">Distance : </label>
        <input type="number" name="distance" min="1">
    </div>
    <div>
        <label for="duration">Duration : </label>
        <input type="number" name="duration" min="1">
    </div>
    <div>
        <label for="elevation_gain">Elevation Gain : </label>
        <input type="number" name="elevation_gain" min="1">
    </div>
    <div>
        <label for="description">Description : </label>
        <textarea name="description"></textarea>
    </div>
    <button type="submit">Add a new hike</button>
</form>