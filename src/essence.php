<?php
class essence {
	const CURL_TIMEOUT = 3600;
    const CONNECT_TIMEOUT = 30;

	protected $url;
	protected $fields; //POST Fields
	protected $header; //HEADER
	protected $connect = true; //CONNECTION TIME OUT ERRORS
	protected $cookies = false; //GENERATE COOKIES FILE

	protected $proxy; //PROXY LINK
	protected $proxyusr; //PROXY USER
	protected $proxypss; //PROXY PASS

	protected $verifySsl = false; //VERIFY SSL

	protected $resolve;
	protected $ipv4 = false;
	protected $emptyencoding = false;
	protected $verbose;

	protected $maxRedirects = 3;

	public function __construct(string $link) {
		$this->url = $link;
	}

	public function header(array $header = []) {
		$this->header = $header;
		return $this;
	}

	public function connectTimeOut(bool $connect = true) {
		$this->connect = $connect;
		return $this;
	}

	public function cookies(bool $cookies = true) {
		$this->cookies = $cookies;
		return $this;
	}

	public function verifySsl(bool $verify = true) {
		$this->verifySsl = $verify;
		return $this;
	}

	public function resolve() {
		$host = [implode(":", [(isset($this->url)?$this->url:null), 443, gethostbyname((isset($this->url)?$this->url:null))])];
		$this->resolve = $host;
		return $this;
	}

	public function proxy(string $proxy, string $proxyusr = "root", string $proxypss = "root") {
		$this->proxy = $proxy;
		$this->proxyusr = $proxyusr;
		$this->proxypss = $proxypss;
		return $this;
	}

	public function ipv4(bool $ipv4 = true) {
		$this->ipv4 = $ipv4;
		return $this;
	}

	public function emptyEncoding(bool $empty = true) {
		$this->emptyencoding = $empty;
		return $this;
	}

	public function verbose(bool $verbose = true) {
		$this->verbose = $verbose;
		return $this;
	}

	public function maxRedirects(int $max = 0) {
		$this->maxRedirects = $max;
		return $this;
	}

	public function get(array $get = []) {
		$this->url = $this->url."?".http_build_query($get);
		$ch = curl_init();

		curl_setopt($ch, CURLOPT_URL, $this->url);
		curl_setopt($ch, CURLOPT_HTTPHEADER, ($this->header == true)?$this->header:[]);
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch, CURLOPT_MAXREDIRS, $this->maxRedirects);
		if(isset($this->connect)) {
			curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, self::CURL_TIMEOUT);
            curl_setopt($ch, CURLOPT_LOW_SPEED_LIMIT, 0);
            curl_setopt($ch, CURLOPT_TIMEOUT, self::CURL_TIMEOUT);
		}
		if(isset($this->cookies)) {
			curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd().'/cookies.txt');
            curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd().'/cookies.txt');
		}
		if(isset($this->proxy)) {
			curl_setopt($ch, CURLOPT_PROXY, $this->proxy);
            curl_setopt($ch, CURLOPT_HTTPPROXYTUNNEL, 0);
            if(isset($this->proxyusr) && isset($this->proxypss)) {
            	curl_setopt($ch, CURLOPT_PROXYUSERPWD, $this->proxyusr.":".$this->proxypss);
            }
		}
		if(isset($this->verifySsl)) {
			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
		}
		if(isset($this->resolve)) {
			curl_setopt($ch, CURLOPT_RESOLVE, $this->resolve);
		}
		if(isset($this->ipv4)) {
			curl_setopt($ch, CURLOPT_IPRESOLVE, CURL_IPRESOLVE_V4);
		}
		if(isset($this->emptyencoding)) {
			curl_setopt($ch, CURLOPT_ENCODING,  '');
		}
		if(isset($this->verbose)) {
			curl_setopt($ch, CURLOPT_VERBOSE, $this->verbose);
		}

		if(curl_error($ch)) {
			throw new Exception("Essence error ({$curl_errno($cn)}): ".$curl_error($ch));
		}

		$page = curl_exec($ch);
		return $page;
	}

	public function post(array $fields = []) {
		$this->fields = http_build_query($fields);
		$ch = curl_init();

		curl_setopt($ch, CURLOPT_URL, $this->url);
		curl_setopt($ch, CURLOPT_HTTPHEADER, ($this->header == true)?$this->header:[]);
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch, CURLOPT_MAXREDIRS, $this->maxRedirects);
		if(isset($this->connect)) {
			curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, self::CURL_TIMEOUT);
            curl_setopt($ch, CURLOPT_LOW_SPEED_LIMIT, 0);
            curl_setopt($ch, CURLOPT_TIMEOUT, self::CURL_TIMEOUT);
		}
		if(isset($this->cookies)) {
			curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd().'/cookies.txt');
            curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd().'/cookies.txt');
		}
		if(isset($this->proxy)) {
			curl_setopt($ch, CURLOPT_PROXY, $this->proxy);
            curl_setopt($ch, CURLOPT_HTTPPROXYTUNNEL, 0);
            if(isset($this->proxyusr) && isset($this->proxypss)) {
            	curl_setopt($ch, CURLOPT_PROXYUSERPWD, $this->proxyusr.":".$this->proxypss);
            }
		}
		if(isset($this->verifySsl)) {
			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
		}
		if(isset($this->resolve)) {
			curl_setopt($ch, CURLOPT_RESOLVE, $this->resolve);
		}
		if(isset($this->ipv4)) {
			curl_setopt($ch, CURLOPT_IPRESOLVE, CURL_IPRESOLVE_V4);
		}
		if(isset($this->emptyencoding)) {
			curl_setopt($ch, CURLOPT_ENCODING,  '');
		}
		curl_setopt($ch, CURLOPT_POSTFIELDS, $this->fields);
		curl_setopt($ch, CURLOPT_POST, 1);

		if(curl_error($ch)) {
			throw new Exception("Essence error ({$curl_errno($cn)}): ".$curl_error($ch));
		}

		$page = curl_exec($ch);
		return $page;
	}
}