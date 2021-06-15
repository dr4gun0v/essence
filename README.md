# 🔥 ESSENCE - PHP Lib for Web Requests

<img src="ESSENCE.png" alt="Essence Preview">

![GitHub repo size](https://img.shields.io/github/repo-size/dr4gun0v/essence?style=for-the-badge)
![GitHub language count](https://img.shields.io/github/languages/count/dr4gun0v/essence?style=for-the-badge)
![GitHub forks](https://img.shields.io/github/forks/dr4gun0v/essence?style=for-the-badge)

<br>

The lib main goal is to easily make requests with PHP without using native curl, created specifically to one-line requests.

<br><br>

## ☕ How to use Essence

🇺🇸 To use **Essence** you need to add the `require` inside your main code

```php
require __DIR__."/essence.php";
```

<br><br>

## 🚀 Documentation

| Function                                                                     | Description                                    |
|------------------------------------------------------------------------------|------------------------------------------------|
| `(new essence(string $link))->functions...`                                  | Core to other functions                        |
| `header(["User-Agent: ...", "Host: ..."])`                                   | Add header                                     |
| `cookies(bool $cookies)`                                                     | List all cookies returned on a cookie.txt file |
| `connectTimeOut(bool $connect)`                                              | Connection errors                              |
| `verifySsl(bool $verify)`                                                    | Verify SSL                                     |
| `resolve()`                                                                  | Domain Resolve                                 |
| `ipv4(bool $ipv4)`                                                           | IPV4 Resolve                                   |
| `emptyEncoding(bool $empty)`                                                 | Define the encoding null, accepting any type   |
| `verbose(bool $verbose)`                                                     | Verbose Mode                                   |
| `maxRedirects(int $max)`                                                     | Max number of redirects in a request           |
| `proxy(string $proxy, string $proxyusr = "root", string $proxypss = "root")` | Add Proxy (HTTP/HTTPS)                         |

At the end of each request use:

| Function                 | Description                                        |
|--------------------------|----------------------------------------------------|
| `get(array $get=[])`     | Create a GET request with the parameters in a list |
| `post(array $fields=[])` | Create a POST request with the fields in a list    |

<br><br>

## 💻 Examples

#### GET Request with Proxy
```php
echo (new essence("http://meuip.com/"))->header(["User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:89.0) Gecko/20100101 Firefox/89.0"])->cookies()->verifySsl()->proxy("201.49.72.226:8080")->resolve()->ipv4()->emptyEncoding()->get();
```

<br>

#### GET Request
```php
echo (new essence("http://meuip.com/"))->header(["User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:89.0) Gecko/20100101 Firefox/89.0"m "Host: meuip.com"])->cookies()->ipv4()->emptyEncoding()->get(["test"=> "test");
```

<br>

#### POST Request
```php
echo (new essence("http://meuip.com/"))->post(["test"=> "test"]);
```
