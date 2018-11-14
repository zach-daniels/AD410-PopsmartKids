<!DOCTYPE html>
<html lang="en">
    <head>
        <title><?=$myTitle?></title>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width"/>
        
        
        <script src="https://cloud.tinymce.com/stable/tinymce.min.js?apiKey=nu85ai0uslffnf0opa372u2983v6h7a9l12dxcrc4voekhng"></script>
        
        <!--  
        <script>tinymce.init({
                selector:'textarea',
                toolbar: "image",
                plugins: "image imagetools"
            });
        </script>
        -->
        
        <script>
        
        	tinymce.init({
                selector : '#myTextarea',
                plugins: 'image code',
                toolbar: 'undo redo | image code',
                
                // without images_upload_url set, Upload tab won't show up
                images_upload_url: '../includes/upload_blog_image.php',
                
                // override default upload handler to simulate successful upload
                images_upload_handler: function (blobInfo, success, failure) {
                    var xhr, formData;
                  
                    xhr = new XMLHttpRequest();
                    xhr.withCredentials = false;
                    xhr.open('POST', '../includes/upload_blog_image.php');
                  
                    xhr.onload = function() {
                        var json;
                    
                        if (xhr.status != 200) {
                            failure('HTTP Error: ' + xhr.status);
                            return;
                        }
                    
                        json = JSON.parse(xhr.responseText);
                    
                        if (!json || typeof json.location != 'string') {
                            failure('Invalid JSON: ' + xhr.responseText);
                            return;
                        }
                    
                        success(json.location);
                    };
                  
                    formData = new FormData();
                    formData.append('file', blobInfo.blob(), blobInfo.filename());
                  
                    xhr.send(formData);
                    },
            });
        </script>
        
        <meta name="viewport" content="width=device-width" />
        <!-- next line for google authentication -->
        <meta name="google-signin-client_id" content="80726179055-kiknkdfkg2fe8oobj8i8e6des4pc79t0.apps.googleusercontent.com">
        
        <link rel="stylesheet" href="/css/blog.css" />
        <link rel="stylesheet" href="/css/nav.css" />
        <link rel="stylesheet" href="/css/popsmart.css" />
        <link rel="stylesheet" href="/css/form.css" />
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Gochi+Hand">
        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.6/sweetalert2.min.js"></script>
        <!-- next script is for google authentication -->
        <script src="https://apis.google.com/js/platform.js" async defer></script>
        
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.6/sweetalert2.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="icon" href="<?=VIRTUAL_PATH;?>images/Logo_PSK1.png" alt="favicon" sizes="16x16" type="image/png"> <!-- favicon image -->


        <!-- Global site tag (gtag.js) - Google Analytics -->
		<script async src="https://www.googletagmanager.com/gtag/js?id=UA-118280358-1"></script>
		<script>
			window.dataLayer = window.dataLayer || [];
			function gtag(){dataLayer.push(arguments);}
			gtag('js', new Date());

			gtag('config', 'UA-118280358-1');
			</script>
        <?=$loadhead;?>
        
        <!-- Initialize LinkedIn Javascript API -->
         <script type="text/javascript" src="//platform.linkedin.com/in.js">
            api_key: 78mc17fbiyl9io
            authorize: true
            onLoad: onLinkedInLoad
        </script>
        
        <!-- LinkedIn functions -->
        <script type="text/javascript">

    	//global variables to keep track of username and authentication service
        var user_name = '';
        var service = '(No service in use)';

        // Setup an event listener to make an API call once LinkedIn auth is complete
        function onLinkedInLoad() {
            IN.Event.on(IN, "auth", getProfileData);
            //IN.Event.on(IN, "logout", reset);
        }

        // Handle the successful return from the LinkedIn API call
        function onSuccess(data) {
            user_name = data.firstName + " " + data.lastName;
            service = 'LinkedIn';
            console.log(user_name);
            //console.log(data);
            setElements(true);
        }

        // Handle an error response from the LinkedIn API call
        function onError(error) {
            console.log(error);
            setElements(false);
        }

        // Use the API call wrapper to request the LinkedIn member's basic profile data
        function getProfileData() {
        	IN.API.Raw("/people/~:(firstName,lastName)?format=json")
            .result(onSuccess)
            .error(onError);
        }

        function sendGoodByeMessage(service) {
			console.log("Logged out of " + service);
        }

		//Log out of service
        function logout() {
            if(service === 'Facebook') {
                FB.logout(function (response) {
                    setElements(false);
                });
            } else if(service === 'Google') {
                var auth2 = gapi.auth2.getAuthInstance();
                auth2.signOut().then(function () {
                  console.log('User signed out.');
                  setElements(false); 
                });
            } else if(service === 'LinkedIn'){
                // Destroy the session of linkedin
                IN.User.logout();
                setElements(false);
            }      
        }

        function setElements(isLoggedIn){
            if(isLoggedIn){
                //hide buttons
                document.getElementById('login').style.display = 'none';
                document.getElementById('fb-btn').style.display = 'none';
                document.getElementById('google-btn').style.display = 'none';
                document.getElementById('linkedin-btn').style.display = 'none';
                //display comments section
                document.getElementById('blog_comment_block').style.display = 'block';
                //document.getElementById('logout').style.display = 'block';
                document.getElementById('fname').value = user_name;


                document.getElementById('user_name').textContent = 'Welcome ' + user_name + '!' + ' You are logged in to ' + service + '.';
                
        } else{
 				reset();
            }
            
        }

        function reset() {
        	sendGoodByeMessage(service);
			user_name = '';
			service = '(No service in use)';
			//show buttons
            document.getElementById('login').style.display = 'block';
            document.getElementById('fb-btn').style.display = 'block';
            document.getElementById('google-btn').style.display = 'block';
            document.getElementById('linkedin-btn').style.display = 'block';
            //hide comment area
            document.getElementById('user_name').textContent = '';
            document.getElementById('blog_comment_block').style.display = 'none';
            //document.getElementById('logout').style.display = 'none';            
        } 

        </script>
               
    </head>

    <body>    
    <script>
        window.fbAsyncInit = function() {
            FB.init({
                appId      : '178725749505005',
                cookie     : true,
                xfbml      : true,
                version    : 'v3.0'
            });

            FB.getLoginStatus(function(response) {
                statusChangeCallback(response);
            });

        };

        (function(d, s, id){
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) {return;}
            js = d.createElement(s); js.id = id;
            js.src = "https://connect.facebook.net/en_US/sdk.js";
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));

        function statusChangeCallback(response) {
            if (response.status === 'connected'){
                console.log('Logged in and authenticated');
                service = 'Facebook';
                //setElements(true);
                testAPI();
            } else{
                console.log('Not authenticated');
                setElements(false);
            }
        }

        function checkLoginState() {
            FB.getLoginStatus(function(response) {
                statusChangeCallback(response);
            });
        }

        function testAPI(){
            FB.api('/me?fields=name,email', function (response){
                if(response && !response.error){
                    user_name = response.name;
                    setElements(true);
                    //document.getElementById('user_name').textContent = 'Welcome ' + user_name + '!';
                }
            });
        }

		//google sign in
        function onSignIn(googleUser) {
        	  var profile = googleUser.getBasicProfile();
        	  console.log('ID: ' + profile.getId()); // Do not send to your backend! Use an ID token instead.
        	  console.log('Name: ' + profile.getName());
        	  console.log('Image URL: ' + profile.getImageUrl());
        	  console.log('Email: ' + profile.getEmail()); // This is null if the 'email' scope is not present.

        	  user_name = profile.getName();
        	  service = 'Google';
        	  setElements(true);        	  
        }

	
      /* original google signout function
        function signOut() {
          var auth2 = gapi.auth2.getAuthInstance();
          auth2.signOut().then(function () {
            console.log('User signed out.');
            user_name = '';
            service = '';
            setElements(false); 
          });
        }
        */
      
    </script>
    <header>
        <nav>
            <ul class="topnav" id="myTopnav">
                <div class="owl_wrapper">
                    <a href="../index.php"><img class="owl" src="../images/Logo_PSK1.png"></a>
                </div>
                <div class="logo_wrapper">
                    <p class="logo">PopSmartKids</p>
                </div>
                <?=makeLinks($nav1)?>
                <button class="beta_button_desktop" type="button" data-toggle="modal" data-target="#myModal">SignUp for Free</button>
                <li class="icon">
                    <a href="javascript:void(0);" onclick="myFunction()">&#9776;</a>
                </li>
            </ul>
        </nav>
    </header>
<div class="spacer"></div>