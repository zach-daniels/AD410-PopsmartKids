<?php include 'includes/config.php';
$myTitle = 'API Documentation'; #Fills <title> tag?>
<?php include 'includes/top.php'?>
    <div class="terms"></div>
    <article class="terms">
        <h1>API Documentation</h1>
        <h6>API Recource Information</h6>
        <h6>API version 1.0</h6>
        <h6>No Rate Limit</h6>
        <h6>No Authentication</h6>
        <h6>Response Format is json</h6>
        <h6>HTTP Method used is GET</h6>
        <h6>Response Objects are Products</h6>
        
        <br>
        <br>
        <h6>There are two API request options:</h6> 
        <ol>
            <li class="api">Get all products and their information or</li> 
            <li class="api">Search for product by name and get all of its information.</li>
        </ol>
                
        <h4 class="output">To search for a product by name use example two below where productName is the name of the product you are searching for. To get all products follow example one below. :</h4>
        <ul>
            <li class="api"><a href= "https://ncsmart1.azurewebsites.net/api/public/api/applications">ncsmart1.azurewebsites.net/api/public/api/applications</a></li>
        
            <li class="api"><a href= "https://ncsmart1.azurewebsites.net/api/public/api/applications/productName">ncsmart1.azurewebsites.net/api/public/api/applications/productName</a></li>
           
        </ul>
        
        <br>
        <h4 class="output">Example Output:</h4>
        <ul>
            <li class="code">{"productName":"Application Name",</li>
            <li class="code">"image":"images/appicon1.png",</li>
            <li class="code">"androidLink":"link",</li>
            <li class="code">"appleLink":"link",</li>
            <li class="code">"description":"Description of an App"}</li>
        </ul>
        
        <h4 class="output">Here is some API document examples from other companies:</h4>
        <ul>
            
            <li class="api"><a href= "https://www.programmableweb.com/api/wikipedia">https://www.programmableweb.com/api/wikipedia</a></li>
            
            <li class="api"><a href= "https://www.programmableweb.com/category/all/apis">https://www.programmableweb.com/category/all/apis</a></li>
        </ul>
        
        <br>
        <br>
        
    </article>
<?php include ("includes/bottom.php");?>