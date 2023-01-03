<form action="home.php?id=<?php echo $user_id; ?>" method="post" id="f" enctype="multipart/form-data">

    <div class="text-section form-group">
        <div class="user-image">
            <?php
                        echo "<img class='img-circle' src='users/$user_image'>";
                        ?>
        </div>
        <textarea class="form-control" id="content" name="content" placeholder="Share something with the world"
            rows="3"></textarea><br>
    </div>

    <div class="footer-section">

        <label class="icon icon-image" for="file-input" title="Add Image">
            <i class="fa fa-image fa-2x"></i>
        </label>
        <input id="file-input" type="file" accept="image/.jpeg, .jpg, .webp, .png" name="upload_image">

        <label class="icon" for="file-input" title="Add Video">
            <i class="fa fa-film fa-2x"></i>
        </label>
        <input id="file-input" type="file"
            accept="video/.mp4, .mov, .mpg, .vob, .avi, .mkv, .webm, .3gp, .ogv, .m4v, .wmv, .ogm, .asx, .mpeg"
            name="upload_video">

        <div title="Add Emoji" class="emoji icon">
            <i class="fa fa-smile-o fa-2x"></i>
        </div>

        <button id="btn-post" class="btn btn-primary" name="sub">Share</button>
    </div>

</form>