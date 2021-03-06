<?php declare(strict_types=1);

$shipID = $var['ship_id'];
$newShip = AbstractSmrShip::getBaseShip(Globals::getGameType($player->getGameID()), $shipID);
$cost = $ship->getCostToUpgrade($shipID);

if ($newShip['AlignRestriction'] == BUYER_RESTRICTION_EVIL && $player->getAlignment() > ALIGNMENT_EVIL) {
	create_error('You can\'t buy smuggler ships!');
}

if ($newShip['AlignRestriction'] == BUYER_RESTRICTION_GOOD && $player->getAlignment() < ALIGNMENT_GOOD) {
	create_error('You can\'t buy federal ships!');
}

if ($newShip['RaceID'] != RACE_NEUTRAL && $player->getRaceID() != $newShip['RaceID']) {
	create_error('You can\'t buy other race\'s ships!');
}

// do we have enough cash?
if ($player->getCredits() < $cost) {
	create_error('You do not have enough cash to purchase this ship!');
}

// take the money from the user
if ($cost > 0) {
	$player->decreaseCredits($cost);
} else {
	$player->increaseCredits(-$cost);
}

// assign the new ship
$ship->decloak();
$ship->disableIllusion();
$ship->setShipTypeID($shipID);


// update again
$ship->removeUnderAttack();
$ship->update();
$player->update();

$player->log(LOG_TYPE_HARDWARE, 'Buys a ' . $ship->getName() . ' for ' . $cost . ' credits');

$container = create_container('skeleton.php', 'current_sector.php');
transfer('LocationID');
forward($container);
