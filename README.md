# ESSENCE

<!---Esses são exemplos. Veja https://shields.io para outras pessoas ou para personalizar este conjunto de escudos. Você pode querer incluir dependências, status do projeto e informações de licença aqui--->

![GitHub repo size](https://img.shields.io/github/repo-size/iuricode/README-template?style=for-the-badge)
![GitHub language count](https://img.shields.io/github/languages/count/iuricode/README-template?style=for-the-badge)
![GitHub forks](https://img.shields.io/github/forks/iuricode/README-template?style=for-the-badge)
![Bitbucket open issues](https://img.shields.io/bitbucket/issues/iuricode/README-template?style=for-the-badge)
![Bitbucket open pull requests](https://img.shields.io/bitbucket/pr-raw/iuricode/README-template?style=for-the-badge)

<img src="ESSENCE.png" alt="exemplo imagem">
> Essa lib foi feita com o intuito de facilitar a criação de requests com o php sem necessitar usar o curl nativo, criado especialmente para requests one-line.

## ☕ Usando o Essence

Para usar o essence deveremos adicionar o require dentro do seu code principal.

```php
require __DIR__."/essence.php";
```

## 🚀 Documentação

| Função                                                                       |                                                       |
|------------------------------------------------------------------------------|-------------------------------------------------------|
| `(new essence(string $link))->functions...`                                  | Core para as outras funções                           |
| `header(["User-Agent: ...", "Host: ..."])`                                   | Adiciona um header                                    |
| `cookies(bool $cookies)`                                                     | Lista os cookies retornados em um arquivo cookies.txt |
| `connectTimeOut(bool $connect)`                                              | Erros de conexão                                      |
| `verifySsl(bool $verify)`                                                    | Verifica o SSL                                        |
| `resolve()`                                                                  | Resolve Domain                                        |
| `ipv4(bool $ipv4)`                                                           | IP Resolve IPV4                                       |
| `emptyEncoding(bool $empty)`                                                 | Deixa o encoding nulo aceitando todos os tipos        |
| `verbose(bool $verbose)`                                                     | Verbose                                               |
| `maxRedirects(int $max)`                                                     | Máximo de redirects em uma request                    |
| `proxy(string $proxy, string $proxyusr = "root", string $proxypss = "root")` | Adiciona proxy (HTTP/HTTPS)                           |

No final de request usar:

| Função                   |                                                             |
|--------------------------|-------------------------------------------------------------|
| `get(array $get=[])`     | Cria a requisição GET passando os parâmetros numa lista     |
| `post(array $fields=[])` | Cria uma requisição POST passando os POST Fields numa lista |

## 💻 Exemplos

Requisição GET com proxy
```php
echo (new essence("http://meuip.com/"))->header(["User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:89.0) Gecko/20100101 Firefox/89.0"])->cookies()->verifySsl()->proxy("201.49.72.226:8080")->resolve()->ipv4()->emptyEncoding()->get();
```
Requisição GET
```php
echo (new essence("http://meuip.com/"))->header(["User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:89.0) Gecko/20100101 Firefox/89.0"m "Host: meuip.com"])->cookies()->ipv4()->emptyEncoding()->get(["test"=> "test");
```
Requisição POST
```php
echo (new essence("http://meuip.com/"))->post(["test"=> "test"]);
```
