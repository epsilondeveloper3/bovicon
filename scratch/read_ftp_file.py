import ftplib
import io

try:
    ftp = ftplib.FTP('ftp.epsilon-technology.com')
    ftp.login('u819285591.Bovican', 'Bovican@123')
    
    # Read admin/include/masterConfig.php
    print("Reading admin/include/masterConfig.php from FTP...")
    buf = io.BytesIO()
    ftp.retrbinary('RETR admin/include/masterConfig.php', buf.write)
    print("Content of admin/include/masterConfig.php on Server:")
    print(buf.getvalue().decode('utf-8'))
    
    # Read admin/include/rootMaster.php
    print("\nReading admin/include/rootMaster.php from FTP...")
    buf2 = io.BytesIO()
    ftp.retrbinary('RETR admin/include/rootMaster.php', buf2.write)
    print("Content of admin/include/rootMaster.php on Server:")
    print(buf2.getvalue().decode('utf-8'))
    
    ftp.quit()
except Exception as e:
    print("FTP Error:", e)
