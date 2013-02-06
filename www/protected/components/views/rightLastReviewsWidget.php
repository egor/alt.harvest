<?php
echo '<ul class="right-menu-last-reviews">';
$count = 0;
foreach ($items as $value) {
    $count++;
    echo '<li><a class="right-reviews-link" href="/' . $reviewsData->url . '#'.$value->reviews_id.'">' . $value->user_name . '</a>
<span>'.date('d.n.Y', $value->date).' / </span>
    '.$value->short_text.'
</li>';
}
echo '</ul>';
?>
<a class="right-reviews-link-all" href="/<?php echo $reviewsData->url; ?>"><?php echo SelectDataFromEditFields::selectValue('right_otz_link_text');?></a>