<?php

$conn = mysqli_connect("localhost","root","!Sparrtan1","loginsystem");
if (!$conn)
{
	die("Error: ". mysql_connect_error());
}