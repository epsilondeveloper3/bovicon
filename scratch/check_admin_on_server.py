import ftplib
import urllib.request
import io

try:
    ftp = ftplib.FTP('ftp.epsilon-technology.com')
    ftp.login('u819285591.Bovican', 'Bovican@123')
    
    # 1. Create temporary check_admin.php
    php_code = """<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include("admin/include/config.php");
if (!$con) {
    die("DB connection failed");
}

$res = mysqli_query($con, "SHOW TABLES LIKE 'adminUser'");
if (mysqli_num_rows($res) == 0) {
    echo "TABLE_DOES_NOT_EXIST";
} else {
    $res2 = mysqli_query($con, "SELECT id, username, email, password FROM adminUser");
    if (mysqli_num_rows($res2) == 0) {
        echo "TABLE_IS_EMPTY";
    } else {
        echo "USERS:";
        while ($row = mysqli_fetch_assoc($res2)) {
            echo "\\n" . $row['id'] . " | " . $row['username'] . " | " . $row['email'] . " | " . $row['password'];
        }
    }
}
?>"""
    
    bio = io.BytesIO(php_code.encode('utf-8'))
    print("Uploading check_admin.php...")
    ftp.storbinary('STOR check_admin.php', bio)
    
    # 2. Fetch the test page
    print("Fetching check_admin.php from server...")
    try:
        url = "https://bovican.epsilon-technology.com/check_admin.php"
        req = urllib.request.Request(url, headers={'User-Agent': 'Mozilla/5.0'})
        with urllib.request.urlopen(req) as response:
            html = response.read().decode('utf-8')
            print("Response from server:")
            print(html)
    except Exception as url_err:
        print("Error fetching URL:", url_err)
        
    # 3. Clean up (delete check_admin.php from server)
    print("Deleting check_admin.php from server...")
    ftp.delete('check_admin.php')
    
    ftp.quit()
except Exception as e:
    print("FTP/Execution Error:", e)
