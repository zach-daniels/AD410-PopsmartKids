import org.junit.FixMethodOrder;
import org.junit.runners.MethodSorters;
import org.openqa.selenium.*;
import org.openqa.selenium.firefox.FirefoxDriver;

import org.junit.Test;

import org.openqa.selenium.support.ui.ExpectedConditions;
import org.openqa.selenium.support.ui.WebDriverWait;

import static org.junit.Assert.*;

@FixMethodOrder(MethodSorters.NAME_ASCENDING)
public class TestBlog {
    private static final String LOGIN_PATH ="https://www.smart1.zakbrinlee.com/admin/admin_login.php";
    private static final String TITLE = "Selenium Test Blog Post";

    private static final String GECKO_DRIVER = "webdriver.gecko.driver";
    private static final String GECKO_PATH = "./src/res/geckodriver.exe";

    @Test
    public void stage1_testAddBlogPost() {
        System.setProperty(GECKO_DRIVER, GECKO_PATH);
        WebDriver driver = new FirefoxDriver();
        driver.get(LOGIN_PATH);

        // Click login button
        WebElement login = driver.findElement(By.xpath("//button[contains(text(), 'Login')]"));
        login.click();

        // Nav to posts
        WebElement posts = driver.findElement(By.linkText("Posts"));
        posts.click();

        // Nav to posts
        WebElement addBlog = driver.findElement(By.linkText("Add New"));
        addBlog.click();

        // Fill out forms
        WebElement title = driver.findElement(By.name("title"));
        title.sendKeys(TITLE);

        WebElement author = driver.findElement(By.name("author"));
        author.sendKeys("Robot Jones");

        //Switch to desc iframe
        driver.switchTo().frame("myTextarea_ifr");
        WebElement body = driver.findElement(By.id("tinymce"));
        body.sendKeys("The series centers on Robot Jones (voiced by a text-to-voice program in season 1; " +
                "Bobby Block in season 2), who, as his name suggests, is a robot who lives in a small city in Delaware, " +
                "in a futuristic version of the 1980s in which robots are commonplace.[1] Robot attempts to learn of " +
                "human nature by attending Polyneux Middle School, where he makes three new friends: Timothy \"Socks\" " +
                "Morton (Kyle Sullivan), a tall boy who loves rock music; Mitch Davis (Gary LeRoi Gray), " +
                "a headphones-wearing boy whose eyes are hidden by his long hair; and Charles \"Cubey\" " +
                "Cubinacle (Myles Jeffrey), a shorter boy who loves video games and wears a Pac-Man T-shirt. " +
                "He also meets Shannon Westerburg (Grey DeLisle), a girl he develops a crush on, because of her " +
                "large retainer and metal prosthetic leg. ");

        // Switch back to default
        driver.switchTo().defaultContent();

        WebElement keywords = driver.findElement(By.name("keywords"));
        keywords.sendKeys("Slice of life, Comic science fiction, Greg Miller");

        WebElement submitPost = driver.findElement(By.name("add_post"));
        submitPost.click();

        driver.get("http://www.smart1.zakbrinlee.com/blog.php");
        WebElement post = driver.findElement(By.linkText(TITLE));
        post.click();

        WebElement postTitle = driver.findElement(By.xpath("//h1[contains(text(), 'Selenium Test Blog Post')]"));
        String blogPost = postTitle.getText();
        assertEquals(blogPost, TITLE);

        driver.quit();
    }

    @Test (expected = NoSuchElementException.class)
    public void stage2_testDeleteBlogPost() throws InterruptedException {
        System.setProperty(GECKO_DRIVER, GECKO_PATH);
        WebDriver driver = new FirefoxDriver();
        driver.get(LOGIN_PATH);

        // Click login button
        WebElement login = driver.findElement(By.xpath("//button[contains(text(), 'Login')]"));
        login.click();

        WebElement delete = driver.findElement(By.xpath("//tr[@id='Selenium Test Blog Post']/td[@class='actions']/a[@class='btn btn-danger']"));
        delete.click();

        WebDriverWait wait = new WebDriverWait(driver, 10);
        Alert alert = wait.until(ExpectedConditions.alertIsPresent());
        driver.switchTo().alert();
        alert.accept();
        driver.switchTo().defaultContent();
        Thread.sleep(1000);

        driver.get("http://www.smart1.zakbrinlee.com/blog.php");

        // Check product was removed from products page
        driver.findElement(By.xpath("//h2[contains(text(), 'Selenium Test Blog Post')]"));

        driver.quit();
    }
}
