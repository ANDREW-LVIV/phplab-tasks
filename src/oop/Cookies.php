<?php

// Cookies
class Cookies {

	private $cookies;
	private $multiple_cookies;

	public function __construct() {
		$this->cookies = $_COOKIE;
		$this->multiple_cookies = isset($_SERVER['HTTP_COOKIE']) ? $_SERVER['HTTP_COOKIE'] : null;

	}

	// returns all $_COOKIES in the associative array. If $only is not empty - return only keys from $only parameter
	public function all(array $only = []): array {
		return empty($only) ? $this->cookies : array_keys($only);
	}

	// returns $_COOKIE value by key and $default if key does not exist
	public function get(string $key, string $default = null): ?string {
		return array_key_exists($key, $this->cookies) ? $this->cookies[$key] : $default;
	}

	// sets data to session
	public function set(string $key, string $value) {
		setcookie($key, $value, time() + (86400 * 30), "/");
	}

	// return true if $key exists in $_COOKIES
	public function has(string $key): bool {
		return !empty($this->get($key));
	}

	// removes cookie by name
	public function remove(string $key) {
		setcookie($key, "", time()-3600, "/");
	}

	// removes all cookies
	public function remove_all() {
		if (isset($this->multiple_cookies)) {
			$cookies = explode(';', $this->multiple_cookies);
			foreach($cookies as $cookie) {
				$parts = explode('=', $cookie);
				$name = trim($parts[0]);
				setcookie($name, '', time()-1000);
				setcookie($name, '', time()-1000, '/');
			}
		}
	}

}

?>