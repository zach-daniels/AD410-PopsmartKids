import org.openqa.selenium.By;
import org.openqa.selenium.WebDriver;
import org.openqa.selenium.WebElement;
import org.openqa.selenium.firefox.FirefoxDriver;
import org.openqa.selenium.support.ui.ExpectedConditions;
import org.openqa.selenium.support.ui.WebDriverWait;

public class SeleniumPractice {

    public static void main(String[] args) {
        //Point to Geckodriver
        System.setProperty("webdriver.gecko.driver", "./src\\res/geckodriver.exe");

        // Create a new instance of the Firefox driver
        // Notice that the remainder of the code relies on the interface,
        // not the implementation.
        WebDriver driver = new FirefoxDriver();

       // Load home page
        driver.get("https://www.smart1.zakbrinlee.com/");

        // Wait for pop-up
        WebElement myDynamicElement = (new WebDriverWait(driver, 10))
                .until(ExpectedConditions.presenceOfElementLocated(By.className("swal2-buttonswrapper")));

        // Locate cancel button, click it
        WebElement cancel = driver.findElement(By.xpath("//button[@class='swal2-cancel swal2-styled']"));
        cancel.click();

        // Check page title
        System.out.println("Page title is " + driver.getTitle());

        // Navigate to products
        WebElement productNav = driver.findElement(By.linkText("Products"));
        productNav.click();

        // Should say "PopSmart Products Page"
        System.out.println("Page title is " + driver.getTitle());



    }
}