<!--  http://datainflow.com/make-sweetallert-subscription-popup-using-jquery-insert-subscription-data-database/ -->
<?php include 'includes/config.php'?>
<?php include 'includes/top.php'?>

<!-- Include jQuery library and Bootstrap for beta modal script -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<!-- Include jQuery library and Flexslider script -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/flexslider/2.6.3/jquery.flexslider-min.js"></script>
<link rel="stylesheet" href="css/about.css">



<div class="welcome_home">
    <h1>Welcome to PopSmartKids</h1>
</div>
<!-- Place somewhere in the <body> of your page -->
<div class="flexslider">
    <ul class="slides">
        <li>
            <p class="flex-caption">Text Over Slide 1</p>
            <img src="images/img_fjords_wide.jpg" />
        </li>
        <li>
            <p class="flex-caption">Text Over Slide 2</p>
            <img src="images/img_mountains_wide.jpg" />
        </li>
        <li>
            <p class="flex-caption">Text Over Slide 3</p>
            <img src="images/img_nature_wide.jpg" />
        </li>
    </ul>
</div>

<!-- START LEFT Column -->
<article class="twocol">
    <div class="button">
        <!-- Trigger the modal with a button -->
        <button class="beta_button_phone" type="button" data-toggle="modal" data-target="#myModal">Beta Signup!</button>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Sign up for beta!</h4>
                </div>
                <div class="modal-body">
                    <input type="text" class="button beta_email" id="email" name="email" placeholder="NAME@EXAMPLE.COM">
                </div>
                <div class="modal-footer">
                    <button type="button" onclick="betaFunction()" class="btn btn-default" data-dismiss="modal">Sign up</button>
                </div>
            </div>

        </div>
    </div>

    <h2>Reimagining Digital Playtime</h2>
    <div>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio. Praesent libero. Sed cursus ante dapibus diam. Sed nisi. Nulla quis sem at nibh elementum imperdiet. Duis sagittis ipsum. Praesent mauris. Fusce nec tellus sed augue semper porta. Mauris massa. Vestibulum lacinia arcu eget nulla. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. </p>

        <p>Curabitur sodales ligula in libero. Sed dignissim lacinia nunc. Curabitur tortor. Pellentesque nibh. Aenean quam. In scelerisque sem at dolor. Maecenas mattis. Sed convallis tristique sem. Proin ut ligula vel nunc egestas porttitor. Morbi lectus risus, iaculis vel, suscipit quis, luctus non, massa. Fusce ac turpis quis ligula lacinia aliquet. Mauris ipsum. Nulla metus metus, ullamcorper vel, tincidunt sed, euismod in, nibh. Quisque volutpat condimentum velit. </p>

        <p>Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Nam nec ante. Sed lacinia, urna non tincidunt mattis, tortor neque adipiscing diam, a cursus ipsum ante quis turpis. Nulla facilisi. Ut fringilla. Suspendisse potenti. Nunc feugiat mi a tellus consequat imperdiet. Vestibulum sapien. Proin quam. Etiam ultrices. Suspendisse in justo eu magna luctus suscipit. Sed lectus. Integer euismod lacus luctus magna. </p>

        <p>Quisque cursus, metus vitae pharetra auctor, sem massa mattis sem, at interdum magna augue eget diam. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Morbi lacinia molestie dui. Praesent blandit dolor. Sed non quam. In vel mi sit amet augue congue elementum. Morbi in ipsum sit amet pede facilisis laoreet. Donec lacus nunc, viverra nec, blandit vel, egestas et, augue. Vestibulum tincidunt malesuada tellus. Ut ultrices ultrices enim. Curabitur sit amet mauris. Morbi in dui quis est pulvinar ullamcorper. </p>

        <p>Nulla facilisi. Integer lacinia sollicitudin massa. Cras metus. Sed aliquet risus a tortor. Integer id quam. Morbi mi. Quisque nisl felis, venenatis tristique, dignissim in, ultrices sit amet, augue. Proin sodales libero eget ante. Nulla quam. Aenean laoreet. Vestibulum nisi lectus, commodo ac, facilisis ac, ultricies eu, pede. Ut orci risus, accumsan porttitor, cursus quis, aliquet eget, justo. </p>

        <p>Sed pretium blandit orci. Ut eu diam at pede suscipit sodales. Aenean lectus elit, fermentum non, convallis id, sagittis at, neque. Nullam mauris orci, aliquet et, iaculis et, viverra vitae, ligula. Nulla ut felis in purus aliquam imperdiet. Maecenas aliquet mollis lectus. Vivamus consectetuer risus et tortor. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio. Praesent libero. Sed cursus ante dapibus diam. Sed nisi. </p>


    </div>

    <div class="about_row">
        <h2 class="about_h2">Testimonials</h2>
        <div class="about_column">
            <!-- Card 1 -->
            <div>
                <img src="images/img1.jpg" style="width:100%; border-radius: 100%;">
                <div class="about_container">
                    <h2>Jane Doe</h2>
                    <p class="about_title">App Name or Company Name</p>
                    <p>PopSmartKids Apps are amazing and my children love them!</p>
                </div>
            </div> <!-- End of Card 1 -->
        </div> <!-- End of Column 1 -->

        <div class="about_column"> <!-- Start of Column 2 -->
            <div> <!-- Card 2 -->
                <img src="images/Testimonial_Logo_PSK.png"style="width:100%; border-radius: 100%;">
                <div class="about_container">
                    <h2>Mike Ross</h2>
                    <p class="about_title">App Name or Company Name</p>
                    <p>PopSmartKids app helped my son learn math and now doing math a level higher than his grade!</p>
                </div>
            </div> <!-- /Card2 -->
        </div>  <!-- /Column 2 -->

        <!--Column 3 -->
        <div class="about_column">

            <!--Card 3 -->
            <div>
                <img src="images/img3.jpg"style="width:100%; border-radius: 100%;">
                <div class="about_container">
                    <h2>John Doe</h2>
                    <p class="about_title">App Name or Company Name</p>
                    <p>Awesome company with apps that really impact children being able to learn in a fun and safe environment</p>
                </div>
            </div>  <!-- end of Card 3 -->
        </div> <!-- end of Column 3 -->
    </div>
</article>
<!-- END LEFT Column -->

<!-- START  Aside RIGHT Column -->
<aside class="twocol">
    <h3 class="aside_headline">Here are the latest apps!</h3>
    <div class='embed-container'>
        <iframe src='https://www.youtube.com/embed//_UR-l3QI2nE' frameborder='0' allowfullscreen></iframe>
    </div>
    <h3>App Title</h3>
    <p>Mauris ipsum. Nulla metus metus, ullamcorper vel, tincidunt sed, euismod in, nibh. Quisque volutpat condimentum velit. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.</p>
    <div class='embed-container'>
        <iframe src='https://www.youtube.com/embed//_UR-l3QI2nE' frameborder='0' allowfullscreen></iframe>
    </div>
    <h3>App Title</h3>
    <p>Mauris ipsum. Nulla metus metus, ullamcorper vel, tincidunt sed, euismod in, nibh. Quisque volutpat condimentum velit. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.</p>
</aside>
<!-- END Aside RIGHT Column -->
<?php include ("includes/bottom.php");?>

<script>

    $(document).ready(function(){

      
      //
      $('.flexslider').flexslider({
          animation: "slide"
      });
      //

        // if no cookie then popup
        if(document.cookie.indexOf("alreadyVisited") == -1) {

          // set session cookie that ends when browser closes
          // to set this for a specific time please see www.w3schools.com/Js/js_cookies.asp for examples
            document.cookie = "alreadyVisited=yes";
                swal({
                   title: 'Submit email to subscribe to the newsletter',
                    input: 'email',
                    showCancelButton: true,
                    confirmButtonText: 'Submit',
                    showLoaderOnConfirm: true,
                    preConfirm: function (email) {
                        return new Promise(function (resolve, reject) {
                            setTimeout(function() {
                                $.ajax({
                                    type: 'post',
                                    url: 'subscribe.php',
                                    data: {email:email},
                                    success: function(result){
                                        resolve();
                                    }
                                });
                            }, 1000)
                        })
                    },
                    allowOutsideClick: true

                }).then(function (email) {
                    swal({
                        type: 'success',
                        title: 'Subscribed to the newsletter!',
                        html: 'Submitted email: ' + email
                    }) // end swal
                }); // end then
          } // end if

        }); // end ready

</script>
<script>
function betaFunction() {
  $.ajax({
        type: 'post',
        url: 'betasignup.php',
        data: {email:document.getElementById("email").value},
        success: function(result){
        alert(result);
        /*if (result[0] == true){
        alert('Thank you for your intrest, we will send you information about our beta products soon!');
        }else{
        alert('Invalid email; please check your email and try again.');
        }*/
        }
    });
}
</script>

<!-- This fixes the footer followUs due to bootstrap overwrite -->
<style>
    .fa{
        width: 35px;
    }
</style>
