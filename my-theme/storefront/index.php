<?php get_header(); ?>

<body>

        <div class="startpage">
            <div class="startpage-title">
                <h2>Välkommen till</h2>
                <p><?php bloginfo('name'); ?></p>
            </div>
        </div>
        <main>
            <h1>Se alla våra kollektioner</h1>
            <div class="allcollections">
                <div class="allcollections-div">
                    <h2>Vår Kollektioner</h2>
                    <p>Hitta vårens nyaste kollektioner</p>
                    <div class="link">
                        <a href="<?php echo(home_url('/fardiga-mixar/')); ?>">Se färdiga kollektioner</a>
                    </div>
                </div>
                <div class="allcollections-div">
                    <h2>Sommar Kollektioner</h2>
                    <p>Sommarens hetaste kollektioner</p>
                    <div class="link">
                        <a href="<?php echo(home_url('/fardiga-mixar/')); ?>">Se färdiga kollektioner</a>
                    </div>
                </div>
                <div class="allcollections-div">
                    <h2>Höst Kollektioner</h2>
                    <p>Fynda kollektioner för hösten</p>
                    <div class="link">
                        <a href="<?php echo(home_url('/fardiga-mixar/')); ?>">Se färdiga kollektioner</a>
                    </div>
                </div>
                <div class="allcollections-div">
                    <h2>Vinter Kollektioner</h2>
                    <p>Kyliga kollektioner för vintern</p>
                    <div class="link">
                        <a href="<?php echo(home_url('/fardiga-mixar/')); ?>">Se färdiga kollektioner</a>
                    </div>
                </div>
            </div>
        </main>


        </div>
        <?php get_footer(); ?>


</body>
</html>