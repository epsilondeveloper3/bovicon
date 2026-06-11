import ftplib

try:
    print("Connecting to FTP...")
    ftp = ftplib.FTP('ftp.epsilon-technology.com')
    print("Logging in...")
    ftp.login('u819285591.Bovican', 'Bovican@123')
    print("Login successful!")
    print("Current directory:", ftp.pwd())
    print("Listing files:")
    ftp.retrlines('LIST')
    ftp.quit()
except Exception as e:
    print("FTP Error:", e)
