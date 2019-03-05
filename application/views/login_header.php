<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">  
<title>Celia Tour Login</title>

<!-- Bootstrap CSS -->
<link rel="stylesheet" href="<?php echo base_url('assets/css/BOOTSTRAP_FINAL.min.css'); ?>">
    
<?php 
    error_reporting(7);
    if (!ini_get('display_errors')) {
        ini_set('display_errors', '0');
    }
?>
</head>
<body>

<?php
if (isset($error)) {
	echo "<p class='text-center' style='color:red:'>".$error."</p>";
}
if (isset($mensaje)) {
	echo "<p class='text-center' style='color:green'>".$mensaje."</p>";
}
?>
