<?php

if (isset($_POST['year'])) {
  $year = (float) $_POST['year'];
  $month = (float) $_POST['month'];
  $date = (float)$_POST['date'];
  $hour = (float)$_POST['hour'];
  $min = (float)$_POST['min'];
  $sec = (float)$_POST['sec'];
  calculateAge();
}

function calculateAge()
{
  global $year, $month, $date, $hour, $min, $sec;
  // $Cyear = date("Y");
  // $Cmonth = date("m");
  // $Cdate = date("d");
  // $Chour = date("H");
  // $Cmin = date("i");
  // $Csec = date("s");

  $date1 = date_create($year . "-" . $month . "-" . $date . " " . $hour . ":" . $min . ":" . $sec);
  $date2 = date_create(date('Y-m-d H:i:s'));
  $diff = date_diff($date2, $date1);

  echo  $diff->format("%Y years %m months %d days %h hours %i minutes %s seconds");
}
