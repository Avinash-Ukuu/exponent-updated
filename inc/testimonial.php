<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h3 class="text-center testi-heading"> Testimonials</h3>
        </div>
        <div class="col-md-12">
            <div id="testimonial-slider" class="owl-carousel">
                <div class="testimonial">
                    <h3 class="title">Rahul
                        <span class="post">-Student</span>
                    </h3>
                    <p class="description">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet eum excepturi incidunt laudantium
                        nesciunt omnis, provident repudiandae rerum sed! Amet blanditiis eaque eu!
                    </p>
                </div>
                <div class="testimonial">
                    <h3 class="title">Kristina
                        <span class="post">- Student</span>
                    </h3>
                    <p class="description">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet eum excepturi incidunt laudantium
                        nesciunt omnis, provident repudiandae rerum sed! Amet blanditiis eaque eu!
                    </p>
                </div>
                <div class="testimonial">
                    <h3 class="title">Steve Thomas
                        <span class="post">- Student</span>
                    </h3>
                    <p class="description">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet eum excepturi incidunt laudantium
                        nesciunt omnis, provident repudiandae rerum sed! Amet blanditiis eaque eu!
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript" src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.min.js">
</script>
<script>
$(document).ready(function() {
    $("#testimonial-slider").owlCarousel({
        items: 2,
        itemsDesktop: [1000, 2],
        itemsDesktopSmall: [979, 2],
        itemsTablet: [768, 1],
        pagination: false,
        navigation: true,
        navigationText: ["", ""],
        autoPlay: true
    });
});
</script>