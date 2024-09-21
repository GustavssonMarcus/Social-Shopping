<?php get_header(); ?>

<body>
    <div class="site-wrapper">

        <div class="startpage">
            <h1><?php bloginfo('name'); ?></h1>
        </div>


        <div id="content">
            <?php
            if (have_posts()) :
                while (have_posts()) : the_post();


                endwhile;

            endif;
            ?>
        </div>
        <?php get_footer(); ?>
    </div>

</body>
</html>