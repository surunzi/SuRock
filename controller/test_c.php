<?php
class Test extends Controller {

function __construct() {
	parent::__construct();
}

public function index() {
	if ('6' == SessionUtil::get('user_id')) {
        echo 'fuck';
    }
}

}