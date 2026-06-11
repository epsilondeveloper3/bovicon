import urllib.request
import urllib.parse

url = "https://bovican.epsilon-technology.com/admin/loginAuth.php"
data = urllib.parse.urlencode({
    'email': 'admin@bovicon.com',
    'pass': 'admin123'
}).encode('utf-8')

# Custom opener to prevent automatic redirect following
class NoRedirectHandler(urllib.request.HTTPRedirectHandler):
    def redirect_request(self, req, fp, code, msg, headers, newurl):
        return None

opener = urllib.request.build_opener(NoRedirectHandler)
req = urllib.request.Request(url, data=data, headers={'User-Agent': 'Mozilla/5.0'})

try:
    print("Sending login request...")
    with opener.open(req) as response:
        print("Status code:", response.getcode())
        print("Headers:")
        for k, v in response.headers.items():
            print(f"  {k}: {v}")
except urllib.error.HTTPError as e:
    print("HTTP Status code:", e.code)
    print("Headers:")
    for k, v in e.headers.items():
        print(f"  {k}: {v}")
except Exception as e:
    print("Error:", e)
