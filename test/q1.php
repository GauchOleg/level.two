<table width="100%">
	<tr>
		<td align="left">
		<p>Сколько будет 2*2?</p>
		<form action='<?php echo $_SERVER['REQUEST_URI']?>' method='post'>
			<input type='radio' name='answer' value='<?= ++$q?>'>3<br>
			<input type='radio' name='answer' value='<?= ++$q?>'>4<br>
			<input type='radio' name='answer' value='<?= ++$q?>'>5<br>
			<input type='hidden' name='title' value='Ответьте на вопрос'>
			<input type='submit' value='Ответить'>
		</form>
		</td>
	</tr>
</table>