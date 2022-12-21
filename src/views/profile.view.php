<h1><?= $_SESSION['user']['firstname'] ?>'s Profile</h1>
<section>
    <form action="/profil" method="post">
        <?php if($_POST['update']=== "change"){ ?>
            <div>
                <label for="nickname">Nickname</label>
                <input type="text" name="nickname" value="<?= $_SESSION['user']['nickname'] ?>">
            </div>
            <div>
                <label for="firstname">Firstname</label>
                <input type="text" name="firstname" value="<?= $_SESSION['user']['firstname'] ?>">
            </div>
            <div>
                <label for="lastname">Lastname</label>
                <input type="text" name="lastname" value="<?= $_SESSION['user']['lastname'] ?>">
            </div>
            <div>
                <label for="email">Email</label>
                <input type="text" name="email" value="<?= $_SESSION['user']['email'] ?>">
            </div>
            <div>
                <button name="update" value="update" type="submit">Change</button>
                <button name="update" value="delete" type="submit">Delete</button>
                <button name="update" value="-1" type="submit">Cancel</button>
            </div>
        <?php }else{ ?>
            <div>
                <label for="nickname">Nickname</label>
                <p><?= $_SESSION['user']['nickname'] ?></p>
            </div>
            <div>
                <label for="firstname">Firstname</label>
                <p><?= $_SESSION['user']['firstname'] ?></p>
            </div>
            <div>
                <label for="lastname">Lastname</label>
                <p><?= $_SESSION['user']['lastname'] ?></p>
            </div>
            <div>
                <label for="email">Email</label>
                <p><?= $_SESSION['user']['email'] ?></p>
            </div>
            <div>
                <button name="update" value="change" type="submit">Change</button>
            </div>
        <?php } ?>
    </form>
</section>

<section>
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
</section>