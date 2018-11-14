<?php include 'includes/config.php'?>
<?php include 'includes/top.php'?>
<style>
<?php include 'css/about.css'?>
</style>
    <style>
        .beta_button_desktop{
            display:none;
        }
    </style>
    <article>
        <h1>About PopSmartKids</h1>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec viverra lectus malesuada mi pretium blandit.
            Praesent nec ultricies diam. Mauris erat mi, congue in ex dignissim, convallis dapibus augue. Quisque
            tincidunt tortor non pulvinar viverra. Morbi laoreet arcu a luctus consequat. Vestibulum consectetur tellus
            nulla, in vestibulum ligula pulvinar molestie. Donec consequat ante et lorem luctus, ac efficitur magna
            rutrum. Morbi sed eros felis. Vivamus vitae mauris ac ex sollicitudin condimentum. Mauris non mi eu nisi
            maximus ullamcorper. Praesent eu tristique felis.
        </p>

<!-- START LEFT Column -->
        <div class="about_row">
            <h2 class="about_h2">Meet the Team</h2>
            <div class="about_column">
                <!-- Card 1 -->
                <div class="about_card">
                    <img src="images/img1.jpg" alt="Jane" style="width:100%">
                    <div class="about_container">
                        <h2>Jane Doe</h2>
                        <p class="about_title">CEO &amp; Founder</p>
                        <p>Some text that describes me lorem ipsum ipsum lorem.</p>
                    </div>
                </div> <!-- End of Card 1 -->
            </div> <!-- End of Column 1 -->

            <div class="about_column"> <!-- Start of Column 2 -->
                <div class="about_card"> <!-- Card 2 -->
                    <img src="images/img2.jpg" alt="Mike" style="width:100%">
                    <div class="about_container">
                        <h2>Mike Ross</h2>
                        <p class="about_title">Art Director</p>
                        <p>Some text that describes me lorem ipsum ipsum lorem.</p>
                    </div>
                </div> <!-- /Card2 -->
            </div>  <!-- /Column 2 -->

            <!--Column 3 -->
            <div class="about_column">

                <!--Card 3 -->
                <div class="about_card">
                    <img src="images/img3.jpg" alt="John" style="width:100%">
                    <div class="about_container">
                        <h2>John Doe</h2>
                        <p class="about_title">Designer</p>
                        <p>Some text that describes me lorem ipsum ipsum lorem.</p>
                    </div>
                </div>  <!-- end of Card 3 -->
            </div> <!-- end of Column 3 -->
        </div>
    </article>
<?php include ("includes/bottom.php");?>

<!-- This fixes the footer followUs due to bootstrap overwrite -->
<style>
    .fa{
        width: 35px;
    }
</style>
