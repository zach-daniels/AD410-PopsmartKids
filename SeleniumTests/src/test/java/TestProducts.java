import org.apache.commons.net.ftp.FTPFile;
import org.apache.commons.net.ftp.FTPClient;

import org.junit.FixMethodOrder;
import org.junit.runners.MethodSorters;
import org.openqa.selenium.*;
import org.openqa.selenium.firefox.FirefoxDriver;

import org.junit.Test;

import org.openqa.selenium.support.ui.ExpectedConditions;
import org.openqa.selenium.support.ui.WebDriverWait;

import static org.junit.Assert.*;

import java.io.File;
import java.io.IOException;


@FixMethodOrder(MethodSorters.NAME_ASCENDING)
public class TestProducts {
    private static final String LOGIN_PATH ="https://www.smart1.zakbrinlee.com/admin/admin_login.php";;
    private static final String PRODUCT = "Selenium Test Product";

    private static final String GECKO_DRIVER = "webdriver.gecko.driver";
    private static final String GECKO_PATH = "./src/res/geckodriver.exe";
    private static final String IMAGE_PATH = "./src/res/pizza.jpg";
    private static final String REMOTE_IMAGE_PATH = "smart1.zakbrinlee.com/images/pizza.jpg";

    @Test
    public void stage1_testProductAdd() throws IOException {
        // Check FTP server if image has been uploaded and delete if true
        FTPClient client = new FTPClient();
        client.connect("smart1.zakbrinlee.com", 21);
        client.login("goldteam1", "homeStretch");
        FTPFile[] remoteFiles = client.listFiles(REMOTE_IMAGE_PATH);
        if (remoteFiles.length > 0) {
            client.deleteFile(REMOTE_IMAGE_PATH);
        }

        File imagePath = new File(IMAGE_PATH);
        String truePath = imagePath.getAbsolutePath();

        System.setProperty(GECKO_DRIVER, GECKO_PATH);
        WebDriver driver = new FirefoxDriver();
        driver.get(LOGIN_PATH);

        // Click login button
        WebElement login = driver.findElement(By.xpath("//button[contains(text(), 'Login')]"));
        login.click();

        // Nav to product dashboard
        WebElement prodDash = driver.findElement(By.linkText("Products Dashboard"));
        prodDash.click();

        // Nav to add product
        WebElement addProduct = driver.findElement(By.linkText("Add New"));
        addProduct.click();

        // Upload image

        WebElement imageEntry = driver.findElement(By.xpath("//input[@type='file']"));
        imageEntry.sendKeys(truePath);
        WebElement imageButton = driver.findElement(By.xpath("//button[contains(text(), 'Upload Image')]"));
        imageButton.click();

        // Fill out forms
        WebElement name = driver.findElement(By.name("product_name"));
        name.sendKeys(PRODUCT);

        WebElement androidLink = driver.findElement(By.name("android_link"));
        androidLink.sendKeys("https://play.google.com/store?hl=en");

        WebElement appleLink = driver.findElement(By.name("apple_link"));
        appleLink.sendKeys("https://www.apple.com/ios/app-store/");

        WebElement desc = driver.findElement(By.name("description"));
        desc.sendKeys("This product was made by a Robot using Selenium!");

        WebElement keywords = driver.findElement(By.name("keywords"));
        keywords.sendKeys("Amazing, best product, added by an alpha coder, cool guys only");

        WebElement submitProduct = driver.findElement(By.name("add_product"));
        submitProduct.click();

        driver.get("http://www.smart1.zakbrinlee.com/products.php");

        // Check product was added to products page
        WebElement product = driver.findElement(By.xpath("//h1[contains(text(), 'Selenium Test Product')]"));
        String addedProduct = product.getText();
        assertEquals(addedProduct, PRODUCT);

        driver.quit();
    }

    @Test(expected = NoSuchElementException.class)
    public void stage2_testProductRemove() throws InterruptedException {
        System.setProperty(GECKO_DRIVER, GECKO_PATH);
        WebDriver driver = new FirefoxDriver();
        driver.get(LOGIN_PATH);

        // Click login button
        WebElement login = driver.findElement(By.xpath("//button[contains(text(), 'Login')]"));
        login.click();

        // Nav to product dashboard
        WebElement prodDash = driver.findElement(By.linkText("Products Dashboard"));
        prodDash.click();

        WebElement delete = driver.findElement(By.xpath("//tr[@id='Selenium Test Product']/td[@class='actions']/a[@class='btn btn-danger']"));
        delete.click();

        WebDriverWait wait = new WebDriverWait(driver, 10);
        Alert alert = wait.until(ExpectedConditions.alertIsPresent());
        driver.switchTo().alert();
        alert.accept();
        driver.switchTo().defaultContent();
        Thread.sleep(1000);

        driver.get("http://www.smart1.zakbrinlee.com/products.php");

        // Check product was removed from products page
        driver.findElement(By.xpath("//h1[contains(text(), 'Selenium Test Product')]"));

        driver.quit();
    }
}
