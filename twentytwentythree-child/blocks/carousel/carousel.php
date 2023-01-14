<?php 

// carousel block template


$id = $block['id'];




?>




<?php

// Check rows existexists.
if( have_rows('slides') ):

$slider_count = count(get_field('slides'));


    ?>


<div id="<?php echo $id ;?>" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-indicators">
    <?php for($i = 0; $i < $slider_count; $i++) : ?>
        <?php if($i == 0) : ?>
        <button type="button" data-bs-target="#<?php echo $id ;?>" data-bs-slide-to="<?php echo $i;?>" class="active" aria-current="true" aria-label="Slide <?php echo $i + 1;?>"></button>
        <?php else : ?>
        <button type="button" data-bs-target="#<?php echo $id ;?>" data-bs-slide-to="<?php echo $i;?>" aria-label="Slide <?php echo $i + 1;?>"></button>
        <?php endif; ?>
    <?php endfor; ?>
  </div>    
  <div class="carousel-inner">
    <?php 
     // Loop through rows.
     $slide_counter = 1;
     while( have_rows('slides') ) : the_row();
     $slide = get_sub_field('slide');
     $url = $slide['url'];
     $alt = $slide['alt'];
     $active = $slide_counter == 1 ? 'active' : '';
     ?>
    <div class="carousel-item <?php echo $active ;?>">
      <img src="<?php echo $url ;?>" class="d-block w-100" alt="<?php echo $alt ;?>">
    </div>
    <?php
    // End loop.
    $slide_counter++;
    endwhile;
    ?>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#<?php echo $id ;?>" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#<?php echo $id ;?>" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>



<?php endif; ?>