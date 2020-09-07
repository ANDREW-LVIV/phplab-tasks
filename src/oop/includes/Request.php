<?php
include_once("Session.php");
include_once("Cookies.php");

// replaces default PHP global variables and functions by an object-oriented layer
class Request {

	private  $get;
	private  $post;
	private  $request_method;
	private  $ip;
	private  $ua;
	private  $referer;
	private  $request_uri;
	private  $cookies;
	private  $session;

	public function __construct() {
		$this->get = $_GET;
		$this->post = $_POST;
		$this->request_method = $_SERVER['REQUEST_METHOD'];
		$this->ip = isset($_SERVER['HTTP_X_FORWARDED_FOR']) ? $_SERVER['HTTP_X_FORWARDED_FOR'] : $_SERVER['REMOTE_ADDR']; 
		$this->ua = $_SERVER['HTTP_USER_AGENT'];
		$this->ua_lang = $_SERVER['HTTP_ACCEPT_LANGUAGE'];
		$this->referer = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : 'referrer link is empty';
		$this->request_uri = $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
		$this->cookies = new Cookies();
		$this->session = new Session();
	}

	// returns $_GET parameter by $key and $default if does not exist
	public function get(string $key, string $default = null): ?string {
		return array_key_exists($key, $this->get) ? $this->get[$key] : $default;
	}

	// returns $_POST parameter by $key and $default if does not exist
	public function post(string $key, string $default = null): ?string {
		return array_key_exists($key, $this->post) ? $this->post[$key] : $default;
	}

	// returns $_GET or $_POST parameter by $key. If both are present - return $_POST. If both ate empty - return $default
	public function request(string $key, string $default = null): ?string {
		if(!empty($_POST)) {
			$result = $this->post($key);
		} elseif (!empty($_GET)) {
			$result = $this->get($key);
		} else {
			$result = $default;  
		}

		return $result;
	}

	// returns all $_GET + $_POST parameters in the associative array. If $only is not empty - return only keys from $only parameter
	public function all(array $only = []): array {
		return empty($only) ? array_merge($this->get, $this->post) : array_keys($only);
	}

	// return true if $key exists in $_GET or $_POST
	public function has($key): bool {
		return !empty($this->request($key));
	}

	// returns users IP
	public function ip(): string {
		return $this->ip;
	}

	// returns users browser User Agent
	public function userAgent(): string {
		return $this->ua;
	}

	// returns users browser User Agent Language
	public function userAgentLang(): string {
		return $this->ua_lang;
	}

	// returns Referer URL
	public function refererURL(): ?string {
		return $this->referer ? $this->referer : null;
	}

	// returns current URI
	public function requestURI(): ?string {
		return $this->request_uri ? $this->request_uri : null;
	}

	// returns Cookie object
	public function cookies() {
		return $this->cookies;
	}

	// returns Session object
	public function session() {
		return $this->session;
	}

}

?>