<?php declare(strict_types=1);
$template->assign('PageTopic', 'Delete Album Entry - Confirmation');
$template->assign('ConfirmAlbumDeleteHref', SmrSession::getNewHREF(create_container('album_delete_processing.php', '')));
