<table width="100%">
	<tr>
		<td align="left">
		<p>Сколько будет 3*3?</p>
		<form action='<?php echo $_SERVER['REQUEST_URI']?>' method='post'>
			<input type='radio' name='answer' value='<?= ++$q?>'>6<br>
			<input type='radio' name='answer' value='<?= ++$q?>'>8<br>
			<input type='radio' name='answer' value='<?= ++$q?>'>9<br>
			<input type='hidden' name='title' value='Ответьте на вопрос'>
			<input type='submit' value='Ответить'>
		</form>
		</td>
	</tr>
</table>