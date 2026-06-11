import urllib.request
import urllib.parse
import http.cookiejar

# Use a cookie jar to maintain session
cj = http.cookiejar.CookieJar()
opener = urllib.request.build_opener(urllib.request.HTTPCookieProcessor(cj))

# 1. Login POST request
login_url = "https://bovican.epsilon-technology.com/admin/loginAuth.php"
data = urllib.parse.urlencode({
    'email': 'admin@bovicon.com',
    'pass': 'admin123'
}).encode('utf-8')

try:
    print("Simulating admin login...")
    req_login = urllib.request.Request(login_url, data=data, headers={'User-Agent': 'Mozilla/5.0'})
    res_login = opener.open(req_login)
    print("Login Response Status:", res_login.getcode())
    print("Cookies after login:")
    for cookie in cj:
        print(f"  {cookie.name} = {cookie.value}")
        
    # 2. Access dashboard.php
    dashboard_url = "https://bovican.epsilon-technology.com/admin/dashboard.php"
    print("\\nFetching dashboard.php with session...")
    req_dash = urllib.request.Request(dashboard_url, headers={'User-Agent': 'Mozilla/5.0'})
    res_dash = opener.open(req_dash)
    html = res_dash.read().decode('utf-8')
    print("Dashboard Response Status:", res_dash.getcode())
    
    # 3. Check for errors or verify content
    if "Failed to connect to MySQL" in html:
        print("ALERT: MySQL connection error detected in dashboard!")
    elif "Notice:" in html or "Warning:" in html or "Fatal error:" in html:
        print("ALERT: PHP Warning/Notice/Error detected in dashboard!")
        # Print lines around the error
        lines = html.split('\\n')
        for i, line in enumerate(lines):
            if any(err in line for err in ["Notice:", "Warning:", "Fatal error:"]):
                print(f"Error at line {i}: {line}")
    elif "Dashboard" in html:
        print("SUCCESS: Dashboard loaded successfully and contains 'Dashboard' title!")
    else:
        print("ALERT: Dashboard loaded but might be empty or redirecting. Content length:", len(html))
        print(html[:500])
        
except Exception as e:
    print("Error during dashboard test:", e)
