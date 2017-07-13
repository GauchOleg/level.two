<table width="100%">
	<tr>
		<td align="left">
		<p>Сколько будет 5*5?</p>
		<form action='<?php echo $_SERVER['REQUEST_URI']?>' method='post'>
			<input type='radio' name='answer' value='<?= ++$q?>'>25<br>
			<input type='radio' name='answer' value='<?= ++$q?>'>20<br>
			<input type='radio' name='answer' value='<?= ++$q?>'>15<br>
			<input type='hidden' name='title' value='Получите результат'>
			<input type='submit' value='Ответить'>
		</form>
		</td>
	</tr>
</table>