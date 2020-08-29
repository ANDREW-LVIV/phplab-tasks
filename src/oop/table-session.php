<?php

include_once("Session.php");
$session = new Session();
include_once("Request.php");
$request = new Request();

?>

<table class="table table-bordered bg-white">

	<tr class="table-info">
		<th colspan="3" class="text-center h5">Session class</th>
	</tr>

	<tr class="text-center font-weight-bold text-uppercase text-info">
		<td width=35%>Description</td>
		<td width=25%></td>
		<td width=40%>Result</td>
	</tr>

	<tr>
		<td rowspan="2">
			<p class="font-weight-bold">`all(array $only = [])`</p>
			<p class="text-info"><span class="font-italic">returns all $_SESSION in the associative array. If $only is not empty - return only keys from $only parameter</span></p>
		</td>
		<td><code>$only = []</code></td>
		<td><pre><?php	print_r($session->all()); ?></pre></td>
	</tr>

	<tr>
		<td><code>$only = [<br>'key one' => 'value one',<br>'key two' => 'value two'<br>]</code></td>
		<td><pre><?php	print_r($session->all(['key one' => 'value one', 'key two' => 'value two']));	?></pre></td>
	</tr>

	<tr>
		<td>
			<p class="font-weight-bold">`get($key, $default = null)`</p>
			<p class="text-info"><span class="font-italic">returns $_SESSION value by key and $default if key does not exist</span></p>
		</td>
		<td><code>get('test_session', null)</code></td>
		<td><?=$session->get('test_session', 'create a session with a key "test_session" to see the result')?></td>
	</tr>

	<tr>
		<td>
			<p class="font-weight-bold">`set($key, $value)`</p>
			<p class="text-info"><span class="font-italic">sets data to session</span></p>
		</td>
		<td>
			<form action="" method="POST" class="form-inline">
				<input type="text" name="session_key" minlength="1" maxlength="25" class="form-control" placeholder="session key" value="" required>
				<input type="text" name="session_value" minlength="1" maxlength="25" class="form-control" placeholder="session value" value="" required>
				<input type="submit" class="btn btn-light" value="OK">
			</form>
		</td>
		<td>*</td>
	</tr>

	<tr>
		<td>
			<p class="font-weight-bold">`has($key)`</p>
			<p class="text-info"><span class="font-italic">return true if $key exists in $_SESSION</span></p>
		</td>
		<td>sets data to session with a key "test_session"</td>
		<td>
			'test_session': <?=var_export($session->has('test_session'))?>
		</td>
	</tr>

	<tr>
		<td>
			<p class="font-weight-bold">`remove($key)`</p>
			<p class="text-info"><span class="font-italic">removes session data by name</span></p>
		</td>
		<td>
			<form action="" method="POST" class="form-inline">
				<input type="text" name="session_key_unset" minlength="1" maxlength="25" class="form-control" placeholder="session key" value="" required>
				<input type="submit" class="btn btn-light" value="OK">
			</form>
		</td>
		<td>*</td>
	</tr>

	<tr>
		<td>
			<p class="font-weight-bold">`clear()`</p>
			<p class="text-info"><span class="font-italic">clears the session</span></p>
		</td>
		<td><a href="?unset_session=true">unset session</a></td>
		<td>*</td>
	</tr>

</table>
