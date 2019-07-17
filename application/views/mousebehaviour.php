<?php
echo heading("Mouse Behaviour");

if( $_POST )
{
    $smb = $_POST['smb'];
    $user = $smb['username'];
    $pass = $smb['password'];
    $url = 'smb://storage.ncbs.res.in';

    // Create new state:
    $state = smbclient_state_new();

    // Initialize the state with workgroup, username and password:
    smbclient_state_init($state, null, 'testuser', 'password');

    // Open a directory:
    $dir = smbclient_opendir($state, $url);

    // Loop over the directory contents, print each node:
    while (($entry = smbclient_readdir($state, $dir)) !== false) {
            echo "{$entry['name']} : {$entry['type']}\n";
    }
    // Close the directory handle:
    smbclient_closedir($state, $dir);

    // Free the state:
    smbclient_state_free($state);
}


?>
<form action="#" method="post">
    Storage username <input type="text" name="username" />
    Storage username <input type="password" name="password" />
    <button type="submit">Submit</button>
</form>
