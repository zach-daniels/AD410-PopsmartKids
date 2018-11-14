<?php include 'includes/config.php';
include 'includes/top.php';

$statement = execute_query("SELECT * FROM products ORDER BY productID DESC");
$products = $statement->fetchAll(PDO::FETCH_ASSOC);
?>
    <style>
        .beta_button_desktop{
            display:none;
        }
    </style>
<article>
    <h1>PopSmartKids Apps</h1>
<?php foreach($products as $product): ?>
    <div class = product-container>
        <div class = image-container>
            <div class= "app-icon">
                <img src="<?php echo $product['image']?>" alt="app1">
            </div>
            <div class ="storebadge">
                <a href="<?php echo $product['androidLink']?>" ><img src="images/googleplaybadge.png" alt="badge1" ></a>
                <a href="<?php echo $product['appleLink']?>" ><img src="images/appleappstorebadge.png" alt="badge2" ></a>
            </div>
        </div>

        <div class="description">
            <h1><?php echo $product['productName']?></h1>
            <p><?php  echo $product['description']?></p>
        </div>
    </div>
<?php endforeach; ?>
</article>
    <!-- Application Showcase-->

<?php include ("includes/bottom.php");?>