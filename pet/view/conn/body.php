<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="/index.php">Pet Love</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="/php/shop.php">Shop</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/php/match.php?status=2">Dating</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/php/forum.php?page=1">Forum</a>
                </li>
            </ul>
            <?php
            if(!isset($_COOKIE['user'])){
                echo "<a class=\"navbar-text\" style=\"margin-right:20px;\" href=\"/php/login.php\">Login</a>
                      <a class=\"navbar-text\"  href=\"/php/register.php\">Register</a>";
            }else{


                if($_COOKIE['flag'] == 1){
                   echo "<ul class=\"navbar-nav d-flex\" style=\"margin-right: 100px;\">
                        <li class=\"nav-item dropdown\">
                          <a class=\"nav-link dropdown-toggle\" href=\"\" id=\"navbarDropdownMenuLink\" role=\"button\" data-bs-toggle=\"dropdown\" aria-expanded=\"false\">{$_COOKIE['user']}</a>
                          <ul class=\"dropdown-menu\" aria-labelledby=\"navbarDropdownMenuLink\" style=\"width: 80px;\">
                            <li><a class=\"dropdown-item\" href=\"/php/userPet.php\">Information</a></li>
                            <li><a class=\"dropdown-item\" href=\"/php/chats.php\">chats</a></li>
                            <li><a class=\"dropdown-item\" href=\"/php/userPost.php\">Post Forum</a></li>
                            <li><a class=\"dropdown-item\" href=\"/php/manager.php\">Go Manager</a></li>
                          </ul>
                        </li>
                        <li class=\"nav-item\">
                          <a href=\"../logout.php\">Logout</a>
                        </li>
                      </ul>";
                }
                if($_COOKIE['flag'] == 2){
                   echo "<ul class=\"navbar-nav d-flex\" style=\"margin-right: 100px;\">
                        <li class=\"nav-item dropdown\">
                          <a class=\"nav-link dropdown-toggle\" href=\"\" id=\"navbarDropdownMenuLink\" role=\"button\" data-bs-toggle=\"dropdown\" aria-expanded=\"false\">{$_COOKIE['user']}</a>
                          <ul class=\"dropdown-menu\" aria-labelledby=\"navbarDropdownMenuLink\" style=\"width: 80px;\">
                            <li><a class=\"dropdown-item\" href=\"/php/userPet.php\">Information</a></li>
                            <li><a class=\"dropdown-item\" href=\"/php/chats.php\">chats</a></li>
                            <li><a class=\"dropdown-item\" href=\"/php/userPost.php\">Post Forum</a></li>
                          </ul>
                        </li>
                        <li class=\"nav-item\">
                          <a href=\"../logout.php\">Logout</a>
                        </li>
                      </ul>";
                }
            }
            ?>
        </div>
    </div>
</nav>