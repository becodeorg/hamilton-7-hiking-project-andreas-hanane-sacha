<div>
    <h2>Avaible Hikes</h2>
    <select>
        <option value="all" selected>All</option>
        <?php foreach ($tags as $tag) { ?>
            <option value=<?php echo $tag['name']; ?>><?php echo ucfirst($tag['name']); ?></option>
        <?php } ?>
    </select>
    <div>
        <div>
        <?php foreach ($hikes as $hike) { ?>
            <a href="/singleHike?id=<?php echo $hike['id']; ?>"><h3><?php echo $hike['name'] ?></h3></a>
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
                        <li id=<?php echo $tag; ?>><?php echo $tag; ?></li>
                    <?php } ?>
                </ul>
            </div>
            <div>
                <label for="createdBy">Created by : </label>
                <p><?php echo $hike['createdBy'] ?></p>
            </div>
        <?php } ?>
        </div>
    </div>
</div>