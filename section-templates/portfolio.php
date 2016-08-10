<?php
$section = get_the_ID();
//echo $section;
$general_data = get_post_meta( $section, "common_settings", true );
$portfolio_data  = get_post_meta( $section, "portfolio_settings", true );

// echo "<pre>";
// print_r($portfolio_data);
// echo "</pre>";

?>

<section id="portfolio">
    <p class="title">Our work</p>
    <p class="subtitle">We love our works</p>
    <div id="filters" class="button-group">
        <button class="button is-checked" data-filter="*">show all</button>
        <button class="button" data-filter=".photo">photo</button>
        <button class="button" data-filter=".print-art">print art</button>
        <button class="button" data-filter=".motion">motion</button>

    </div>

    <div class="grid">
        <div class="col-sm-3 col-xs-6 element-item  photo">
            <div class="image">
                <img src="img/blog-1.jpg" alt="Blog Post" />
                <div class="overlay">
                    <a href="#" title="link for this project">
                        <i class="fa fa-link"></i>
                    </a>
                    <a class="colorbox" href="img/blog-1.jpg">
                        <i class="fa fa-plus-circle"></i>
                    </a>
                </div>
            </div>
        </div>
        <div class="col-sm-3 col-xs-6 element-item  print-art motion">
            <div class="image">
                <img src="img/blog-2.jpg" alt="Blog Post" />
                <div class="overlay">
                    <a href="" title="link for this project">
                        <i class="fa fa-link"></i>
                    </a>
                    <a class="colorbox" href="img/blog-1.jpg">
                        <i class="fa fa-plus-circle"></i>
                    </a>
                </div>
            </div>
        </div>
        <div class="col-sm-3 col-xs-6 element-item  photo">
            <div class="image">
                <img src="img/blog-1.jpg" alt="Blog Post" />
                <div class="overlay">
                    <a href="#" title="link for this project">
                        <i class="fa fa-link"></i>
                    </a>
                    <a class="colorbox" href="img/blog-1.jpg">
                        <i class="fa fa-plus-circle"></i>
                    </a>
                </div>
            </div>
        </div>
        <div class="col-sm-3 col-xs-6 element-item  motion">
            <div class="image">
                <img src="img/blog-3.jpg" alt="Blog Post" />
                <div class="overlay">
                    <a href="" title="link for this project">
                        <i class="fa fa-link"></i>
                    </a>
                    <a class="colorbox" href="img/blog-1.jpg">
                        <i class="fa fa-plus-circle"></i>
                    </a>
                </div>
            </div>
        </div>
        <div class="col-sm-3 col-xs-6 element-item  photo ">
            <div class="image">
                <img src="img/blog-4.jpg" alt="Blog Post" />
                <div class="overlay">
                    <a href="" title="link for this project">
                        <i class="fa fa-link"></i>
                    </a>
                    <a class="colorbox" href="img/blog-1.jpg">
                        <i class="fa fa-plus-circle"></i>
                    </a>
                </div>
            </div>
        </div>
        <div class="col-sm-3 col-xs-6 element-item  photo">
            <div class="image">
                <img src="img/blog-1.jpg" alt="Blog Post" />
                <div class="overlay">
                    <a href="#" title="link for this project">
                        <i class="fa fa-link"></i>
                    </a>
                    <a class="colorbox" href="img/blog-1.jpg">
                        <i class="fa fa-plus-circle"></i>
                    </a>
                </div>
            </div>
        </div>
        <div class="col-sm-3 col-xs-6 element-item  print-art ">
            <div class="image">
                <img src="img/blog-5.jpg" alt="Blog Post" />
                <div class="overlay">
                    <a href="" title="link for this project">
                        <i class="fa fa-link"></i>
                    </a>
                    <a class="colorbox" href="img/blog-1.jpg">
                        <i class="fa fa-plus-circle"></i>
                    </a>
                </div>
            </div>
        </div>
        <div class="col-sm-3 col-xs-6 element-item  motion ">
            <div class="image">
                <img src="img/blog-6.jpg" alt="Blog Post" />
                <div class="overlay">
                    <a href="" title="link for this project">
                        <i class="fa fa-link"></i>
                    </a>
                    <a class="colorbox" href="img/blog-1.jpg">
                        <i class="fa fa-plus-circle"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
