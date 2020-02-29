<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php bloginfo('name');?></title>
    <link rel="stylesheet" href="<?php bloginfo('stylesheet_url');?>">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>
<body>
    <header>
    <h1> <?php bloginfo('name'); ?></h1>
    <h4> <?php bloginfo('description'); ?></h4>
    <?php wp_nav_menu(); ?>
    <!-- form for searching -->
    <div class="h-right">
               <form method="post" action="<?php $_PHP_SELF ?>">
                  <input type="text" name="s" placeholder="Search...">
               </form>
            </div>
            </div>
    </header>
            <div class="container">
                <?php  if(have_posts()):?>
                <?php while(have_posts()):?>
                <?php the_post(); ?>
                <div class="title">
                    <h3><a href="<?php the_permalink();?>"><?php the_title(); ?></a></h3>
                    <br>
                    <!-- get specific author -->
                    <a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>">
                    Written by <?php the_author();?></a>
                    <p>Post on :<?php the_time('F j,Y');?></p>
                
                    <!-- get category -->
                    <?php
                     $categs =  get_the_category(); 
                     $output = " ";
                     if ($categs ) {
                         foreach ($categs as $categ ){
                            $output = '<a href="'.get_category_link($categ->term_id).'">'.$categ->cat_name.'</a>';
                         }
                     }
                     echo $output;
                     ?>
                     <!-- end category -->



                </div>
                <?php endwhile; ?>
                    <?php else: echo "the post no found";                   
                    endif;
                ?>  
                    <?php if(has_post_thumbnail()): ?>
                    <?php the_post_thumbnail();?>              
                    <?php else: echo "no found";?>
                <?php endif; ?>

                <?php the_excerpt();?>
                <a class="btn btn-info" href="<?php the_permalink();?>">Read more...</a> 
            </div>


   

</body>
</html>