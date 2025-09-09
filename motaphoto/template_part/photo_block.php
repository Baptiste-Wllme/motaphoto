 <?php 
$ref = SCF::get('reference', get_the_ID());

if (is_array($ref)) {
    
    $first = $ref[0];
    if (is_array($first)) {
        $ref_text = implode(', ', $first);
    } else {
        $ref_text = $first;
    }
} else {
    $ref_text = $ref;
}

$ref_text = $ref_text ?: 'Sans référence';

$img_url = get_the_post_thumbnail_url(get_the_ID(), 'large');
$cats = get_the_terms(get_the_ID(), 'categorie');
$cat_names = [];
if ($cats && !is_wp_error($cats)) {
    foreach ($cats as $c) {
        $cat_names[] = $c->name;
    }
}
$cat_text = implode(', ', $cat_names);
?>

<article class="photo-block">
    <div class="container-photo-block">
  
  <img 
    src="<?php echo esc_url($img_url); ?>" 
    alt="<?php the_title(); ?>" 
    data-ref=" Référence : <?php echo esc_attr($ref_text); ?>" 
    data-cat="<?php echo esc_attr($cat_text); ?>"
    class="photo-img"
  >
  
    </div>
</article>
