<table class="table table-bordered bg-white">

	<tr class="table-info">
		<th colspan="3" class="text-center h5">Cookies class</th>
	</tr>

	<tr class="text-center font-weight-bold text-uppercase text-info">
		<td width=35%>Description</td>
		<td width=25%></td>
		<td width=40%>Result</td>
	</tr>

	<tr>
		<td rowspan="2">
			<p class="font-weight-bold">`all(array $only = [])`</p>
			<p class="text-info"><span class="font-italic">returns all $_COOKIES in the associative array. If $only is not empty - return only keys from $only parameter</span></p>
		</td>
		<td><code>$only = []</code></td>
		<td><pre><?php	print_r($cookies->all()); ?></pre></td>
	</tr>

	<tr>
		<td><code>$only = [<br>'key one' => 'value one',<br>'key two' => 'value two'<br>]</code></td>
		<td><pre><?php	print_r($cookies->all(['key one' => 'value one', 'key two' => 'value two']));	?></pre></td>
	</tr>

	<tr>
		<td>
			<p class="font-weight-bold">`get($key, $default = null)`</p>
			<p class="text-info"><span class="font-italic">returns $_COOKIE value by key and $default if key does not exist</span></p>
		</td>
		<td><code>get('PHPSESSID', null)</code></td>
		<td><?=$cookies->get('PHPSESSID', null)?></td>
	</tr>

	<tr>
		<td>
			<p class="font-weight-bold">`set($key, $value)`</p>
			<p class="text-info"><span class="font-italic">sets cookie</span></p>
		</td>
		<td>
			<form action="" method="POST" class="form-inline">
				<input type="text" name="cookie_key" minlength="1" maxlength="25" class="form-control" placeholder="cookie key" value="" required>
				<input type="text" name="cookie_value" minlength="1" maxlength="25" class="form-control" placeholder="cookie value" value="" required>
				<input type="submit" class="btn btn-light" value="OK">
			</form>
		</td>
		<td>*</td>
	</tr>

	<tr>
		<td>
			<p class="font-weight-bold">`has($key)`</p>
			<p class="text-info"><span class="font-italic">return true if $key exists in $_COOKIES</span></p>
		</td>
		<td>set a cookie with a key "cookie_one"</td>
		<td>
			'cookie_one': <?=var_export($cookies->has('cookie_one'))?>
		</td>
	</tr>

	<tr>
		<td>
			<p class="font-weight-bold">`remove($key)`</p>
			<p class="text-info"><span class="font-italic">removes cookie by name</span></p>
		</td>
		<td>
			<form action="" method="POST" class="form-inline">
				<input type="text" name="cookie_key_unset" minlength="1" maxlength="25" class="form-control" placeholder="cookie key" value="" required>
				<input type="submit" class="btn btn-light" value="OK">
			</form>
		</td>
		<td>*</td>
	</tr>

	<tr>
		<td>
			<p class="font-weight-bold">`remove_all()`</p>
			<p class="text-info"><span class="font-italic">removes all cookies</span></p>
		</td>
		<td><a href="?unset_cookies=true">unset all cookies</a></td>
		<td>*</td>
	</tr>

</table>
