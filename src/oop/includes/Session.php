<?php

// Session
class Session {

	private $session;

	public function __construct() {
		$this->session = &$_SESSION;
	}

	// returns all $_SESSION in the associative array. If $only is not empty - return only keys from $only parameter
	public function all(array $only = []): array {
		return empty($only) ? $this->session : array_keys($only);
	}

	// returns $_SESSION value by key and $default if key does not exist
	public function get(string $key, string $default = null): ?string {
		return array_key_exists($key, $this->session) ? $this->session[$key] : $default;
	}

	// sets data to session
	public function set(string $key, string $value) {
		$this->session[$key] = $value;
	}

	// return true if $key exists in $_SESSION
	public function has(string $key): bool {
		return !empty($this->get($key));
	}

	// removes session data by name
	public function remove(string $key) {
		unset($this->session[$key]);
	}

	// clears the session
	public function clear() {
		session_destroy();
	}

}

?>