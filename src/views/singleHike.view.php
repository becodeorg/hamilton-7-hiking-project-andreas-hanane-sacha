<section>
    <h2><?php echo $hike['name']; ?></h2>
    <div>
        <label for="distance">Distance : </label>
        <p><?php echo $hike['distance'] ."km"; ?></p>
    </div>
    <div>
        <label for="duration">Duration : </label>
        <p><?php echo intdiv($hike['duration'], 60) .'h'. ($hike['duration'] % 60 == 0 ? "00" : $hike['duration'] % 60); ?></p>
    </div>
    <div>
        <label for="elevation_gain">Elevation Gain : </label>
        <p><?php echo $hike['elevation_gain']; ?></p>
    </div>
    <div>
        <label for="tags">Tags : </label>
        <ul>
            <?php foreach ($hike['tags'] as $tag) { ?>
                <li><?php echo $tag; ?></li>
            <?php } ?>
        </ul>
    </div>
    <div>
        <label for="description">Description : </label>
        <p><?php echo $hike['description'] ?></p>
    </div>
    <div>
        <label for="createdBy">Created by : </label>
        <p><?php echo $hike['createdBy'] ?></p>
    </div>
</section>