import org.openqa.selenium.By;
import org.openqa.selenium.WebDriver;
import org.openqa.selenium.WebElement;
import org.openqa.selenium.firefox.FirefoxDriver;

import org.junit.Test;

import static org.junit.Assert.*;

public class TestNavigation {
    private static final String HOME_PAGE = "PopSmartKids Home";
    private static final String PRODUCTS_PAGE = "PopSmartKids Products";
    private static final String SAFE_ZONE_PAGE = "PopSmartKids Safe Zone";
    private static final String ABOUT_PAGE = "PopSmartKids About Us";
    private static final String BLOG_PAGE = "PopSmartKids Blog";
    private static final String CONTACT_US_PAGE = "PopSmartKids Contact Us";
    private static final String PRIVACY_PAGE = "Privacy Policy";
    private static final String TERMS_PAGE = "Terms of Use";
    private static final String API_PAGE = "API Documentation";
    private static final String FACEBOOK_PAGE = "Pop Smart Kids - Internet Company - 1 Review - 9 Photos | Facebook";
    private static final String TWITTER_PAGE = "popsmartkids (@popsmartkids) | Twitter";

    private static final String SITE_PATH = "https://www.smart1.zakbrinlee.com/";
    private static final String GECKO_DRIVER = "webdriver.gecko.driver";
    private static final String GECKO_PATH = "./src\\res/geckodriver.exe";

    @Test
    public void testProductNavigation() {
        System.setProperty(GECKO_DRIVER, GECKO_PATH);
        WebDriver driver = new FirefoxDriver();
        driver.get(SITE_PATH);
        clickPopup(driver);

        navigate(driver, "Products", true);
        assertEquals(driver.getTitle(), PRODUCTS_PAGE);

        driver.quit();
    }

    @Test
    public void testSafeZoneNavigation() {
        System.setProperty(GECKO_DRIVER, GECKO_PATH);
        WebDriver driver = new FirefoxDriver();
        driver.get(SITE_PATH);
        clickPopup(driver);

        navigate(driver, "Safe Zone", true);
        assertEquals(driver.getTitle(), SAFE_ZONE_PAGE);

        driver.quit();
    }

    @Test
    public void testAboutNavigation() {
        System.setProperty(GECKO_DRIVER, GECKO_PATH);
        WebDriver driver = new FirefoxDriver();
        driver.get(SITE_PATH);
        clickPopup(driver);

        navigate(driver, "About Us", true);
        assertEquals(driver.getTitle(), ABOUT_PAGE);

        driver.quit();
    }

    @Test
    public void testBlogNavigation() {
        System.setProperty(GECKO_DRIVER, GECKO_PATH);
        WebDriver driver = new FirefoxDriver();
        driver.get(SITE_PATH);
        clickPopup(driver);

        navigate(driver, "Blog", true);
        assertEquals(driver.getTitle(), BLOG_PAGE);

        driver.quit();
    }

    @Test
    public void testContactUsNavigation() {
        System.setProperty(GECKO_DRIVER, GECKO_PATH);
        WebDriver driver = new FirefoxDriver();
        driver.get(SITE_PATH);
        clickPopup(driver);

        navigate(driver, "Contact Us", true);
        assertEquals(driver.getTitle(), CONTACT_US_PAGE);

        driver.quit();
    }

    @Test
    public void testPrivacyNavigation() {
        System.setProperty(GECKO_DRIVER, GECKO_PATH);
        WebDriver driver = new FirefoxDriver();
        driver.get(SITE_PATH);
        clickPopup(driver);

        navigate(driver, "Privacy Policy", true);
        assertEquals(driver.getTitle(), PRIVACY_PAGE);

        driver.quit();
    }

    @Test
    public void testTermsNavigation() {
        System.setProperty(GECKO_DRIVER, GECKO_PATH);
        WebDriver driver = new FirefoxDriver();
        driver.get(SITE_PATH);
        clickPopup(driver);

        navigate(driver, "Terms of Use", true);
        assertEquals(driver.getTitle(), TERMS_PAGE);

        driver.quit();
    }

    @Test
    public void testHomeNavigation() {
        System.setProperty(GECKO_DRIVER, GECKO_PATH);
        WebDriver driver = new FirefoxDriver();
        driver.get(SITE_PATH);
        clickPopup(driver);

        navigate(driver, "Products", true);
        navigate(driver, "Home", true);
        assertEquals(driver.getTitle(), HOME_PAGE);

        driver.quit();
    }

    @Test
    public void testAPINavigation() {
        System.setProperty(GECKO_DRIVER, GECKO_PATH);
        WebDriver driver = new FirefoxDriver();
        driver.get(SITE_PATH);
        clickPopup(driver);

        navigate(driver, "API", true);
        assertEquals(driver.getTitle(), API_PAGE);

        driver.quit();
    }

    @Test
    public void testFacebookNavigation() {
        System.setProperty(GECKO_DRIVER, GECKO_PATH);
        WebDriver driver = new FirefoxDriver();
        driver.get(SITE_PATH);
        clickPopup(driver);

        navigate(driver, "//a[@class='fa fa-facebook']", false);
        assertEquals(driver.getTitle(), FACEBOOK_PAGE);

        driver.quit();
    }

    @Test
    public void testTwitterNavigation() {
        System.setProperty(GECKO_DRIVER, GECKO_PATH);
        WebDriver driver = new FirefoxDriver();
        driver.get(SITE_PATH);
        clickPopup(driver);

        navigate(driver, "//a[@class='fa fa-twitter']", false);
        assertEquals(driver.getTitle(), TWITTER_PAGE);

        driver.quit();
    }

    private void navigate(WebDriver driver, String id, boolean isLinkText) {
        if (isLinkText) {
            WebElement nav = driver.findElement(By.linkText(id));
            nav.click();
        } else {
            WebElement nav = driver.findElement(By.xpath(id));
            nav.click();
        }
    }

    private void clickPopup(WebDriver driver) {
        // Locate cancel button, click it
        WebElement cancel = driver.findElement(By.xpath("//button[@class='swal2-cancel swal2-styled']"));
        cancel.click();
    }
}


