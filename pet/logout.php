<?php


setcookie("user", '', time() - 3600);
setcookie("uid", '', time() - 3600);
echo "<script>alert(\"logout successfully!\")</script>";
echo "<script>location.href=\"/index.php\"</script>";


