<style>
table.result
{
	background:#E6ECFF none repeat scroll 0% 0%;
	border-collapse:collapse;
	width:100%;
}

table.result th
{
	background:#CCD9FF none repeat scroll 0% 0%;
	text-align:left;
}

table.result th, table.result td
{
	border:1px solid #BFCFFF;
	padding:0.2em;
}

td.passed
{
	background-color: #60BF60;
	border: 1px solid silver;
	padding: 2px;
}

td.warning
{
	background-color: #FFFFBF;
	border: 1px solid silver;
	padding: 2px;
}

td.failed
{
	background-color: #FF8080;
	border: 1px solid silver;
	padding: 2px;
}
</style>
<table class="result">
<tr><th>Name</th><th>Result</th><th>Required By</th><th>Memo</th></tr>
<?php foreach($requirements as $requirement): ?>
<tr>
	<td>
	<?php echo $requirement[0]; ?>
	</td>
	<td class="<?php echo $requirement[2] ? 'passed' : ($requirement[1] ? 'failed' : 'warning'); ?>">
	<?php echo $requirement[2] ? 'Passed' : ($requirement[1] ? 'Failed' : 'Warning'); ?>
	</td>
	<td>
	<?php echo $requirement[3]; ?>
	</td>
	<td>
	<?php echo $requirement[4]; ?>
	</td>
</tr>
<?php endforeach; ?>
</table>

<table>
<tr>
<td class="passed">&nbsp;</td><td>passed</td>
<td class="failed">&nbsp;</td><td>failed</td>
<td class="warning">&nbsp;</td><td>warning</td>
</tr>
</table>