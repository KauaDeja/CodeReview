<?php
  if (isset($_GET["count"]) and 
            ($_GET["count"] > 0) and
            ($_GET["count"] <= 4)) {
    echo system("ping pentesterlab.com -c ".$_GET['count']);
  } 

?>
