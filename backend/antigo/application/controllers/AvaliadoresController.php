<?php

require('APIController.php');

require_once(APPPATH . '/models/AvaliadoresModel.php');

$apicontroller = new APIController();

$apicontroller->index();
$apicontroller->detail();
$apicontroller->create();
$apicontroller->update();
$apicontroller->delete();