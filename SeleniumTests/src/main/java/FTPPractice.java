import org.apache.commons.net.ftp.FTPClient;
import org.apache.commons.net.ftp.FTPFile;

import java.io.IOException;

public class FTPPractice {
    private static final String REMOTE_IMAGE_PATH = "smart1.zakbrinlee.com/images/pizza.jpg";

    public static void main(String[] args) throws IOException {
        FTPClient ftpClient = new FTPClient();
        ftpClient.connect("smart1.zakbrinlee.com", 21);
        System.out.println(ftpClient.getReplyCode());
        System.out.println(ftpClient.login("goldteam1", "6#vWHD_$"));

        FTPFile[] remoteFiles = ftpClient.listFiles(REMOTE_IMAGE_PATH);
        if (remoteFiles.length > 0) {
            System.out.println("File " + remoteFiles[0].getName() + " exists");
        } else {
            System.out.println("File " + REMOTE_IMAGE_PATH + " does not exists");
        }

    }
}

