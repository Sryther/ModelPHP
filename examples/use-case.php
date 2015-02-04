<?php
$root = $_SERVER['DOCUMENT_ROOT'];
require_once($root.'/model.class.php');
require_once($root.'/user.class.php');

$db = null; // This is the DB connection

///
/// New user
///

$user = new User();

$user->_username = "jdoe";
$user->FullName = "John Doe";
$user->Password = "ksdiKoDkjP20XC?B8XNSVBOZ";
$user->Email = "jdoe@domain.com";

/*
 * No need to set this because it is equal to the defaults defined in the model
 * $user->IsAdmin = false;
 * $user->RememberToken = '';
 */

/*
 * The user is created in the database
 * We need to set $forceCreate to true (2nd parameter) because we set
 * manually the username.
 */
$user->save($db, true);

///
/// Existant user
//

/*
 * Look for the user with the primary key equal to jdoe sinc the primary
 * key is the username
 */
$user = User::Get($db, "jdoe");
if ($user) {
    $user->Email = "another@email.com";
    /*
     * Since the user exists, it doesn't create a new user but update it.
     */
    $user->save($db);
} else {
    // handle error
}

/*
 * Remove the user from the database
 */
$user->Delete($db);
?>
