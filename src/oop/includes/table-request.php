<table class="table table-bordered bg-white">

	<tr class="table-info">
		<th colspan="3" class="text-center h5">Request class</th>
	</tr>

	<tr class="text-center font-weight-bold text-uppercase text-info">
		<td width=35%>Description</td>
		<td width=25%></td>
		<td width=40%>Result</td>
	</tr>

	<tr>
		<td>
			<p class="font-weight-bold">`get($key, $default = null)`</p>
			<p class="text-info"><span class="font-italic">returns $_GET parameter by $key and $default if does not exist</span></p>
		</td>
		<td>
			<form action="" method="GET" class="form-inline">
				<input type="text" name="request_get" minlength="1" maxlength="25" class="form-control" placeholder="e.g. get" value="<?=$request->get('request_get', null)?>" required>
				<input type="submit" class="btn btn-light" value="OK">
			</form>
			<code>'request_get'</code>
		</td>
		<td><?=$request->get('request_get', 'send some text via GET method to see the result')?></td>
	</tr>

	<tr>
		<td>
			<p class="font-weight-bold">`post($key, $default = null)`</p>
			<p class="text-info"><span class="font-italic">returns $_POST parameter by $key and $default if does not exist</span></p>
		</td>
		<td>
			<form action="" method="POST" class="form-inline">
				<input type="text" name="request_post" minlength="1" maxlength="25" class="form-control" placeholder="e.g. post" value="<?=$request->post('request_post', null)?>" required>
				<input type="submit" class="btn btn-light" value="OK">
			</form>
			<code>'request_post'</code>
		</td>
		<td><?=$request->post('request_post', 'send some text via POST method to see the result')?></td>
	</tr>

	<tr>
		<td>
			<p class="font-weight-bold">`request($key, $default = null)`</p>
			<p class="text-info"><span class="font-italic">returns $_GET or $_POST parameter by $key. If both are present - return $_POST. If both ate empty - return $default</span></p>
		</td>
		<td><code>'request_get'<br>'request_post'</code></td>
		<td>
			<?=$request->request('request_get', 'send some text via GET')?>
			<?=$request->request('request_post', 'or POST method to see the result')?>
		</td>
	</tr>

	<tr>
		<td rowspan="2">
			<p class="font-weight-bold">`all(array $only = [])`</p>
			<p class="text-info"><span class="font-italic">returns all $_GET + $_POST parameters in the associative array. If $only is not empty - return only keys from $only parameter</span></p>
		</td>
		<td><code>$only = []</code></td>
		<td><pre><?php	print_r($request->all());	?></pre></td>
	</tr>

	<tr>
		<td><code>$only = [<br>'key one' => 'value one',<br>'key two' => 'value two'<br>]</code></td>
		<td><pre><?php	print_r($request->all(['key one' => 'value one', 'key two' => 'value two']));	?></pre></td>
	</tr>

	<tr>
		<td>
			<p class="font-weight-bold">`has($key)`</p>
			<p class="text-info"><span class="font-italic">return true if $key exists in $_GET or $_POST</span></p>
		</td>
		<td><code>has('request_get')<br>has('request_post')<br>has('some_key')</code></td>
		<td>
			'request_get': <?=var_export($request->has('request_get'))?><br>
			'request_post': <?=var_export($request->has('request_post'))?><br>
			'some_key': <?=var_export($request->has('some_key'))?>
		</td>
	</tr>

	<tr>
		<td>
			<p class="font-weight-bold">`ip()`</p>
			<p class="text-info"><span class="font-italic">returns users IP</span></p>
		</td>
		<td>*</td>
		<td><?=$request->ip()?></td>
	</tr>

	<tr>
		<td>
			<p class="font-weight-bold">`userAgent()`</p>
			<p class="text-info"><span class="font-italic">returns users browser User Agent</span></p>
		</td>
		<td>*</td>
		<td><?=$request->userAgent()?></td>
	</tr>

	<tr>
		<td>
			<p class="font-weight-bold">`userAgentLang()`</p>
			<p class="text-info"><span class="font-italic">returns users browser User Agent Language</span></p>
		</td>
		<td>*</td>
		<td><?=$request->userAgentLang()?></td>
	</tr>

	<tr>
		<td>
			<p class="font-weight-bold">`refererURL()`</p>
			<p class="text-info"><span class="font-italic">returns Referer URL</span></p>
		</td>
		<td><a href="<?=$request->requestURI()?>">link</a></td>
		<td><?=$request->refererURL()?></td>
	</tr>

	<tr>
		<td>
			<p class="font-weight-bold">`requestURI()`</p>
			<p class="text-info"><span class="font-italic">returns current URI</span></p>
		</td>
		<td>*</td>
		<td><?=$request->requestURI()?></td>
	</tr>

</table>
