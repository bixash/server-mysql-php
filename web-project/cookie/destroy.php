<?php
setcookie('username', '', time() - 3600); // destroy the username cookie by setting the expiration time in the past
setcookie('email', '', time() - (2 * 3600)); // destroy the email cookie by setting the expiration time in the past