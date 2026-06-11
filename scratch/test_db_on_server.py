import ftplib
import urllib.request
import io

try:
    ftp = ftplib.FTP('ftp.epsilon-technology.com')
    ftp.login('u819285591.Bovican', 'Bovican@123')
    
    # 1. Create temporary db_test.php
    php_code = """<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include("admin/include/config.php");
if ($con) {
    echo "SUCCESS_DB_CONNECTED";
} else {
    echo "FAILED_DB_CONNECTION";
}
?>"""
    
    bio = io.BytesIO(php_code.encode('utf-8'))
    print("Uploading db_test.php...")
    ftp.storbinary('STOR db_test.php', bio)
    
    # 2. Fetch the test page
    print("Fetching db_test.php from server...")
    try:
        url = "https://bovican.epsilon-technology.com/db_test.php"
        req = urllib.request.Request(url, headers={'User-Agent': 'Mozilla/5.0'})
        with urllib.request.urlopen(req) as response:
            html = response.read().decode('utf-8')
            print("Response from server:")
            print(html)
    except Exception as url_err:
        print("Error fetching URL:", url_err)
        
    # 3. Clean up (delete db_test.php from server)
    print("Deleting db_test.php from server...")
    ftp.delete('db_test.php')
    
    ftp.quit()
except Exception as e:
    print("FTP/Execution Error:", e)
