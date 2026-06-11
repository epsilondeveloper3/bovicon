import ftplib

try:
    print("Connecting to FTP...")
    ftp = ftplib.FTP('ftp.epsilon-technology.com')
    print("Logging in...")
    ftp.login('u819285591.Bovican', 'Bovican@123')
    
    print("Uploading admin/loginAuth.php...")
    with open('admin/loginAuth.php', 'rb') as f:
        ftp.storbinary('STOR admin/loginAuth.php', f)
        
    print("Upload complete!")
    ftp.quit()
except Exception as e:
    print("FTP Error:", e)
