<form action="/singleHike?id=<?php echo $hike['id']; ?>" method="post">
    <?php if($_POST['update']=== "change"){ ?>
        <div>
            <label for="name">Name : </label>
            <input type="text" name="name" value="<?= $hike['name'] ?>">
        </div>
        <div>
            <label for="distance">Distance : </label>
            <input type="number" name="distance" min="1" value="<?= $hike['distance'] ?>">
        </div>
        <div>
            <label for="duration">Duration : </label>
            <input type="number" name="duration" min="1" value="<?= $hike['duration'] ?>">
        </div>
        <div>
            <label for="elevation_gain">Elevation Gain : </label>
            <input type="number" name="elevation_gain" min="1" value="<?= $hike['elevation_gain'] ?>">
        </div>
        <div>
            <label for="description">Description : </label>
            <textarea name="description"><?= $hike['description'] ?></textarea>
        </div>
        <div>
            <label for="tags">Tags : </label>
            <ul>
                <?php foreach ($allTags as $tag) { ?>
                    <input
                            type="checkbox"
                            name="tags[]"
                            value="<?php echo $tag['id']; ?>"
                            id="<?php echo $tag['name']; ?>"
                            <?php if (in_array($tag['name'], $hike['tags'])) { echo "checked='checked'"; } ?>
                    />
                    <label for=<?php echo $tag['name']; ?>><?php echo $tag['name']; ?></label>
                <?php } ?>
            </ul>
        </div>
        <div>
            <button name="update" value="update" type="submit">Change</button>
            <button name="update" value="delete" type="submit">Delete</button>
            <button name="update" value="-1" type="submit">Cancel</button>
        </div>
    <?php } else { ?>
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
        <div>
            <?php if ($_SESSION['user']['id'] === $hike['id_user']) : ?>
                <button name="update" value="change" type="submit">Change</button>
            <?php endif; ?>
        </div>
    <?php } ?>
</form>