import os
import ftplib

# 1. Rename locally
local_old = os.path.join('admin', 'htaccess')
local_new = os.path.join('admin', '.htaccess')

if os.path.exists(local_old):
    try:
        if os.path.exists(local_new):
            os.remove(local_new)
        os.rename(local_old, local_new)
        print("Local rename successful!")
    except Exception as e:
        print("Error renaming locally:", e)
else:
    print("Local htaccess file not found or already renamed.")

# 2. Rename on FTP server
try:
    print("Connecting to FTP...")
    ftp = ftplib.FTP('ftp.epsilon-technology.com')
    print("Logging in...")
    ftp.login('u819285591.Bovican', 'Bovican@123')
    
    ftp.cwd('admin')
    print("FTP: Renaming htaccess to .htaccess...")
    
    # Check if .htaccess already exists on server, delete it first
    files = ftp.nlst()
    if '.htaccess' in files:
        ftp.delete('.htaccess')
        
    if 'htaccess' in files:
        ftp.rename('htaccess', '.htaccess')
        print("FTP rename successful!")
    else:
        print("FTP 'htaccess' file not found.")
        
    ftp.quit()
except Exception as e:
    print("FTP Error:", e)
