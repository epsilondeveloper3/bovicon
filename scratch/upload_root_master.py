import ftplib

try:
    print("Connecting to FTP...")
    ftp = ftplib.FTP('ftp.epsilon-technology.com')
    print("Logging in...")
    ftp.login('u819285591.Bovican', 'Bovican@123')
    
    print("Uploading admin/include/rootMaster.php...")
    with open('admin/include/rootMaster.php', 'rb') as f:
        ftp.storbinary('STOR admin/include/rootMaster.php', f)
        
    print("Upload complete!")
    ftp.quit()
except Exception as e:
    print("FTP Error:", e)
