import org.openqa.selenium.*;
import org.openqa.selenium.firefox.FirefoxDriver;
import org.openqa.selenium.interactions.Actions;
import org.openqa.selenium.support.ui.ExpectedConditions;
import org.openqa.selenium.support.ui.WebDriverWait;

public class AdminPractice {

    public static void main(String[] args) {
        //Point to Geckodriver
        System.setProperty("webdriver.gecko.driver", "./src\\res/geckodriver.exe");

        // Create a new instance of the Firefox driver
        // Notice that the remainder of the code relies on the interface,
        // not the implementation.
        WebDriver driver = new FirefoxDriver();

        // Load admin page
        driver.get("https://www.smart1.zakbrinlee.com/admin_login.php");

        // Log-in
        WebElement login = driver.findElement(By.xpath("//input[@value='login']"));
        login.click();

        // Nav to edit products
        WebElement products = driver.findElement(By.linkText("Edit Products"));
        products.click();

        // Nav to add product
        WebElement addProduct = driver.findElement(By.linkText("Add New"));
        addProduct.click();

        // Click tiny cloud pop-up
        WebElement myDynamicElement = (new WebDriverWait(driver, 10))
                .until(ExpectedConditions.presenceOfElementLocated(By.className("mce-close")));
        WebElement tinyCloud = driver.findElement(By.className("mce-close"));
        tinyCloud.click();

        // Fill out forms
        WebElement name = driver.findElement(By.name("product_name"));
        name.sendKeys("Selenium Test Product");

        WebElement androidLink = driver.findElement(By.name("android_link"));
        androidLink.sendKeys("https://play.google.com/store?hl=en");

        WebElement appleLink = driver.findElement(By.name("apple_link"));
        appleLink.sendKeys("https://www.apple.com/ios/app-store/");

        // Switch to desc iframe
        driver.switchTo().frame("description_ifr");
        WebElement desc = driver.findElement(By.id("tinymce"));
        desc.sendKeys("This product was made by a Robot using Selenium!");

        // Switch back to default
        driver.switchTo().defaultContent();

        WebElement image = driver.findElement(By.name("image"));
        image.sendKeys("images/appicon1.png");

        WebElement keywords = driver.findElement(By.name("keywords"));
        keywords.sendKeys("Amazing, best product, added by an alpha coder, cool guys only");

        WebElement submitProduct = driver.findElement(By.name("add_product"));
        submitProduct.click();

        driver.get("http://www.smart1.zakbrinlee.com/products.php");

        JavascriptExecutor jse = (JavascriptExecutor)driver;
        jse.executeScript("window.scrollBy(0,2500)", "");

        driver.get("https://www.smart1.zakbrinlee.com/zak/admin/products_dash.php");

        WebElement delete = driver.findElement(By.xpath("//tr[@id='Selenium Test Product']/td[@class='actions']/a[@class='btn btn-danger']"));
        delete.click();

        driver.get("http://www.smart1.zakbrinlee.com/products.php");
        jse.executeScript("window.scrollBy(0,2500)", "");
    }

}
