<?php declare(strict_types=1);

$template->assign('PageTopic', 'Racial Standings');

Menu::rankings(2, 2);

$ranks = [];
$db->query('SELECT race_id, sum(deaths) as death_sum FROM player JOIN race USING(race_id) WHERE game_id = ' . $db->escapeNumber($player->getGameID()) . ' GROUP BY race_id ORDER BY death_sum DESC, race_name ASC');
while ($db->nextRecord()) {
	$race_id = $db->getInt('race_id');
	if ($player->getRaceID() == $race_id) {
		$style = ' class="bold"';
	} else {
		$style = '';
	}

	$ranks[] = [
		'style' => $style,
		'race_id' => $db->getInt('race_id'),
		'death_sum' => $db->getInt('death_sum'),
	];
}
$template->assign('Ranks', $ranks);
