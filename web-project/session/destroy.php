<?php
session_start(); // start the session
session_destroy(); // destroy the session
unset($_SESSION['username']); // unset the username variable from the session