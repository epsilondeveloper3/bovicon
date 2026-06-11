import ftplib
import urllib.request
import io

try:
    ftp = ftplib.FTP('ftp.epsilon-technology.com')
    ftp.login('u819285591.Bovican', 'Bovican@123')
    
    # 1. Create temporary list_tables.php
    php_code = """<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include("admin/include/config.php");
if (!$con) {
    die("DB connection failed");
}

$res = mysqli_query($con, "SHOW TABLES");
if (mysqli_num_rows($res) == 0) {
    echo "NO_TABLES_FOUND";
} else {
    echo "TABLES:";
    while ($row = mysqli_fetch_array($res)) {
        echo "\\n- " . $row[0];
    }
}
?>"""
    
    bio = io.BytesIO(php_code.encode('utf-8'))
    print("Uploading list_tables.php...")
    ftp.storbinary('STOR list_tables.php', bio)
    
    # 2. Fetch the test page
    print("Fetching list_tables.php from server...")
    try:
        url = "https://bovican.epsilon-technology.com/list_tables.php"
        req = urllib.request.Request(url, headers={'User-Agent': 'Mozilla/5.0'})
        with urllib.request.urlopen(req) as response:
            html = response.read().decode('utf-8')
            print("Response from server:")
            print(html)
    except Exception as url_err:
        print("Error fetching URL:", url_err)
        
    # 3. Clean up (delete list_tables.php from server)
    print("Deleting list_tables.php from server...")
    ftp.delete('list_tables.php')
    
    ftp.quit()
except Exception as e:
    print("FTP/Execution Error:", e)
