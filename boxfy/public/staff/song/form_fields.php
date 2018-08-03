<?php
// prevents this code from being loaded directly in the browser
// or without first setting the necessary object
if (!isset($song)) {
    redirect_to(url_for('/staff/song/index.php'));
}
?>

<div class="form-row">
    <div class="form-group col-md-6">
        <label for="inputArtistSong">Artist Name</label>
        <input type="text" name="song[artist_song]" value="<?php echo h($song->artist_song); ?>" class="form-control" id="inputArtistSong" placeholder="Artist Song"/>
    </div>
    <div class="form-group col-md-6">
        <label for="inputNameSong">Name Song</label>
        <input type="text" name="song[name_song]" value="<?php echo h($song->name_song); ?>" class="form-control" id="inputNameSong" placeholder="Name Song"/>
    </div>
    <div class="form-group col-md-6">
        <label for="year">Year Song</label>
        <select name="song[year]">
            <option value=""></option>
            <?php $this_year = idate('Y') ?>
            <?php for ($year = $this_year - 100; $year <= $this_year; $year++) { ?>
                <option value="<?php echo $year; ?>" <?php
                if ($song->year == $year) {
                    echo 'selected';
                }
                ?>><?php echo $year; ?></option>
                    <?php } ?>
        </select>
    </div>
    <div class="form-group col-md-6">
        <label for="inputUrlSong">Url Song</label>
        <input type="text" name="song[url_song]" value="<?php echo h($song->url_song); ?>" class="form-control" id="inputUrlSong" placeholder="Url Song"/>
    </div>
    <div class="form-group col-md-6">
        <label for="inputLikes">Likes</label>
        <input type="number" name="song[likes]" value="<?php echo h($song->likes); ?>" class="form-control" id="inputLikes" placeholder="Likes"/>
    </div>
</div>