<?php
// Setup gotchas

// Initial XAMPP install on Windows 10 returns Forbidden 403 from browser on localhost
// Resolve by:
// adding both projects (DRV:/project/folder/roots) AND root (DRV:/xampp/htdocs) as vhost entries.

// Initial shutdown of XAMPP on Windows 10 triggers Access Error failure
// Resolve by:
// Running xampp-control.exe permanently as Administrator by default under properties -> compatibility.

// Add code-runner extension, include php executable to settings and PATH to run scripts in editor.

// include "phpinfo.php";
// include "examples.php";
include "One/simple.php";
