<?php if (isset($PreviewVote)) { ?><table class="standard"><tr><td><?php echo bbifyMessage($PreviewVote); ?></td></tr></table><?php } ?>
<form name="VoteForm" method="POST" action="<?php echo $VoteFormHREF; ?>">
	Question: <input type="text" name="question" required value="<?php if (isset($PreviewVote)) { echo htmlspecialchars($PreviewVote); } ?>" /><br />
	Days to end: <input type="number" name="days" required value="<?php if (isset($Days)) { echo htmlspecialchars($Days); } ?>" /><br />
	<input type="submit" name="action" value="Create Vote" />&nbsp;<input type="submit" name="action" value="Preview Vote" />
</form>
<br /><br />

	<?php if (isset($PreviewOption)) { ?><table class="standard"><tr><td><?php echo bbifyMessage($PreviewOption); ?></td></tr></table><?php } ?>
<form name="VoteForm" method="POST" action="<?php echo $VoteFormHREF; ?>">
	Vote: <select id="vote" name="vote"><?php
		foreach ($CurrentVotes as $CurrentVote) {
			?><option value="<?php echo $CurrentVote['ID']; ?>"<?php if (isset($VoteID) && $CurrentVote['ID'] == $VoteID) { ?>selected="selected"<?php } ?>><?php echo bbifyMessage($CurrentVote['Question']); ?></option><?php
		} ?>
	</select><br />
	Option: <input type="text" name="option" required value="<?php if (isset($PreviewOption)) { echo htmlspecialchars($PreviewOption); } ?>" /><br />
	<input type="submit" name="action" value="Add Option" />&nbsp;<input type="submit" name="action" value="Preview Option" />
</form>
