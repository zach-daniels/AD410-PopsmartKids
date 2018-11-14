<?php
/**
 * simple.php is a postback application designed to provide a
 * contact form for users to email our clients.
 *
 * simple.php provides a typical feedback form for a website
 *
 */
echo '<link rel="stylesheet" type="text/css" href="admin_css/bootstrap.css">';
echo '<link rel="stylesheet" type="text/css" href="admin_css/dashboard.css">';
//Will need to change this for your site info
#EDIT THE FOLLOWING:
$email_to = "zbrinlee@gmail.com";  //place your/your client's email address here
$email_to_name = "PopSmartKids"; //place your client's name here
$website = "popsmartkids.com";  //place NAME of your client's website here
#--------------END CONFIG AREA ------------------------#
$sendEmail = TRUE; //if true, will send an email, otherwise just show user data.
$dateFeedback = true; //if true will show date/time with reCAPTCHA error - style a div with class of dateFeedback
include_once 'config.php'; #site keys go inside your config.php file
include 'contact_include.php'; #complex unsightly code moved here
$response = null;

$reCaptcha = new ReCaptcha($secretKey);
if (isset($_POST["g-recaptcha-response"]))
{// if submitted check response
    $response = $reCaptcha->verifyResponse(
        $_SERVER["REMOTE_ADDR"],
        $_POST["g-recaptcha-response"]
    );
}

if ($response != null && $response->success)
    {#reCAPTCHA agrees data is valid (PROCESS FORM & SEND EMAIL)

        //handle_POST($skipFields,$sendEmail,$toName,$fromAddress,$toAddress,$website,$fromDomain); #Here we can enter the data sent into a database in a later version of this file

        if(isset($_POST["Comments"])) {

      $name = $_POST['Name'];
      $message = htmlspecialchars($_POST["Comments"]);
//          $to = "ttravis1111@gmail.com";
      $email_from = htmlspecialchars($_POST["Email"]);
      $email_subject = 'Comments left for PopSmartKids'; // either Testimony or Comments must test for

        $email_message = "Form details below.\n\n";

        function clean_string($string)
        {
            $bad = array("content-type", "bcc:", "to:", "cc:", "href");
            return str_replace($bad, "", $string);
        }

        $email_message .= "Name: " . clean_string($name) . "\n";
        $email_message .= "Email: " . clean_string($email_from) . "\n";
        $email_message .= "Comments: " . clean_string($message) . "\n";

        // create email headers
        $headers = 'From: ' . $email_from . "\r\n" .
            'Reply-To: ' . $email_from . "\r\n" .
            'X-Mailer: PHP/' . phpversion();
        @mail($email_to, $email_subject, $email_message, $headers);

        }
        else if(isset($_POST["Testimonial"])) {
            $name = $_POST['Name'];
            $message = htmlspecialchars($_POST["Testimonial"]);
//          $to = "ttravis1111@gmail.com";
            $email_from = htmlspecialchars($_POST["Email"]);
            $email_subject = 'Testimonial left for PopSmartKids'; // either Testimony or Comments must test for

            $email_message = "Form details below.\n\n";

            function clean_string($string)
            {
                $bad = array("content-type", "bcc:", "to:", "cc:", "href");
                return str_replace($bad, "", $string);
            }

            $email_message .= "Name: " . clean_string($name) . "\n";
            $email_message .= "Email: " . clean_string($email_from) . "\n";
            $email_message .= "Comments: " . clean_string($message) . "\n";

            // create email headers
            $headers = 'From: ' . $email_from . "\r\n" .
                'Reply-To: ' . $email_from . "\r\n" .
                'X-Mailer: PHP/' . phpversion();
            @mail($email_to, $email_subject, $email_message, $headers);
        }



    ?>
    <!-- START HTML FEEDBACK -->
    <div class="contact-feedback">
        <h2>Your Comments Have Been Received!</h2>
        <h2>I will respond via email within 48 hours, Thank you!</h2>
    </div>
    <!-- END HTML FEEDBACK -->
    <?php
} else{#show form, either for first time, or if data not valid per reCAPTCHA
    if($response != null && !$response->success)
    {
        $feedback = dateFeedback($dateFeedback);
        send_POSTtoJS($skipFields); #function for sending POST data to JS array to reload form elements
    }//end failure feedback

?>
 <head>

 </head>
<!--    <button type="submit"  class="btn btn-primary" id="comment_button">Comment</button>-->
<!--    <button type="submit"  class="btn btn-primary" id="testimonial_button">Testimonial</button>-->
    <div class="comment_testimonial">
      <button id="comment_button" type="button" class="btn">Comment</button>
      <button id="testimonial_button" type="button" class="btn">Testimonial</button>
    </div>
	<!-- START COMMENT HTML FORM -->
	<form id="comment_form" action="<?php echo basename($_SERVER['PHP_SELF']); ?>" method="post">
            <div class="form_container">
               <div class="rowContact">
                  <div>
                     <h1 class="site-font">We would love to hear from you.<br> Fill out the form below and we will get back to you.</h1>
                        <div class="row-control-group">
                           <div>
                              <label>Name</label>
                              <input type="text" class="form-control" placeholder="Name" name="Name" id="Name" required data-validation-required-message="Please enter your name.">
                              <p></p>
                           </div>
                        </div>
                        <div class="row-control-group">
                           <div>
                              <label>Email Address</label>
                              <input type="email" class="form-control" placeholder="Email Address" name="Email" id="Email" required data-validation-required-message="Please enter your email address.">
                              <p></p>
                           </div>
                        </div>
                        <div class="row-control-group">
                           <div>
                              <textarea rows="5" class="form-control" placeholder="Comments" name="Comments" required data-validation-required-message="Please enter a message."></textarea>

                              <p></p>
                           </div>
                        </div>
                        <br />
                        <div class="row-control-group" id="send">
                           <p>
                              <button type="submit" class="btn submit_btn">Send</button>
                           </p>
                            <div class="g-recaptcha" data-sitekey="<?=$siteKey;?>"></div>
                        </div>

                  </div>
               </div>
            </div>
	<div class="feedback"><?=$feedback?></div>

    </form>
	<!-- END COMMENT HTML FORM -->

  <!-- START TESTIMONIAL HTML FORM -->
	<form id="testimonial_form" action="<?php echo basename($_SERVER['PHP_SELF']); ?>" method="post">
            <div class="form_container">
               <div class="rowContact">
                  <div>
                     <h1 class="site-font">We would love to hear from you.<br> Fill out the form below and we will get back to you.</h1>
                        <div class="row-control-group">
                           <div>
                              <label>Name</label>
                              <input type="text" class="form-control" placeholder="Name" name="Name" id="Name" required data-validation-required-message="Please enter your name.">
                              <p></p>
                           </div>
                        </div>
                        <div class="row-control-group">
                           <div>
                              <label>Email Address</label>
                              <input type="email" class="form-control" placeholder="Email Address" name="Email" id="Email" required data-validation-required-message="Please enter your email address.">
                              <p></p>
                           </div>
                        </div>
                        <div class="row-control-group">
                           <div>
                              <textarea rows="5" class="form-control" placeholder="Testimonial" name="Testimonial" required data-validation-required-message="Please enter a message."></textarea>
                              <p></p>
                           </div>
                        </div>
                        <br />
                        <div class="row-control-group" id="send">
                           <p>
                              <button type="submit" class="btn submit_btn">Send</button>
                           </p>
                            <div class="g-recaptcha" data-sitekey="<?=$siteKey;?>"></div>
                        </div>

                  </div>
               </div>
            </div>
	<div class="feedback"><?=$feedback?></div>

    </form>
	<!-- END TESTIMONIAL HTML FORM -->


    <script type="text/javascript" src="https://www.google.com/recaptcha/api.js?hl=en"> </script>
    <script type="text/javascript" src="../js/contactUs.js"></script>
<?php
}
?>
