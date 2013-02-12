<?php
foreach ($banners as $banner) {
    echo '<div class="right-banners">
            <a href="'.$banner->link.'" '.($banner->new_window==1?'target="_blank"':'').'>
                <img src="/images/banners/'.$banner->img.'" />
            </a>
        </div><br clear="all">';
}
?>