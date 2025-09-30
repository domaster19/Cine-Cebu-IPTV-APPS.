<?php
session_start();

// kapag hindi naka-login, redirect to login
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: login.html");
    exit;
}

// auto logout after 3 minutes (180 seconds)
$timeout = 180; // 5 minutes

if (isset($_SESSION['last_activity']) && (time() - $_SESSION['last_activity'] > $timeout)) {
    // destroy session
    session_unset();
    session_destroy();
    header("Location: login.html?session_expired=1");
    exit;
}

// update last activity time
$_SESSION['last_activity'] = time();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>CCTN EASY ACCESS</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="logo">CCTN EASY ACCESS</div>

    <div class="navwrap">
    <div class="searchbox">
        <input id="globalSearch" type="text" placeholder="Search apps/servers (e.g., Zabbix, Minglanilla, PPPOE)" autocomplete="off" />
        <button id="searchBtn" title="Search"><i class="fas fa-search"></i></button> 
        <div id="searchSuggest" class="search-suggestions"></div>
    </div>


    <div class="navbar">
        <!-- lahat ng dropdowns mo dito -->
    </div>
</div>


        <div class="navbar">
            <div class="dropdown">
                <button class="dropbtn" onclick="toggleDropdown('dropdown1')"><i class="fas fa-wifi"></i> DALO-RADIUS</button>
                <div class="dropdown-content" id="dropdown1">
                    <a href="http://139.135.79.2:8080/daloradius" target="_blank" data-group="DALO-RADIUS">ALCANTARA</a>
                    <a href="http://103.161.60.83:8080/login.php" target="_blank" data-group="DALO-RADIUS">BOGO DHCP</a>
                    <a href="http://103.161.60.83:8082/daloradius/login.php" target="_blank" data-group="DALO-RADIUS">BOGO PPPOE</a>
                    <a href="http://136.239.196.114:8080/login.php" target="_blank" data-group="DALO-RADIUS">BOHOL DHCP</a>
                    <a href="http://136.239.196.114:8083/daloradius/login.php" target="_blank" data-group="DALO-RADIUS">BOHOL PPPOE</a>
                    <a href="http://139.135.79.134:8080/login.php" target="_blank" data-group="DALO-RADIUS">BACOLOD</a>
                    <a href="http://126.209.3.146:8080/daloradius/login.php" target="_blank" data-group="DALO-RADIUS">BUTUAN</a>
                    <a href="http://203.177.196.166:8080/login.php" target="_blank" data-group="DALO-RADIUS">BANTAYAN ISLAND</a>
                    <a href="http://103.161.61.242:8080/daloradius/login.php" target="_blank" data-group="DALO-RADIUS">CINE CEBU MAIN</a>
                    <a href="http://103.224.94.2:8080/daloradius/login.php" target="_blank" data-group="DALO-RADIUS">CALBAYOG DHCP</a>
                    <a href="http://103.224.94.2:8081/daloradius/login.php" target="_blank" data-group="DALO-RADIUS">CALBAYOG PPPOE</a>
                    <a href="http://139.135.83.146:8888/login.php" target="_blank" data-group="DALO-RADIUS">CALAMBA</a>
                    <a href="http://103.161.60.74:8080/login.php" target="_blank" data-group="DALO-RADIUS">DANAO DHCP</a>
                    <a href="http://103.161.60.74:8082/daloradius/login.php" target="_blank" data-group="DALO-RADIUS">DANAO PPPOE</a>
                    <a href="http://103.161.60.50:8080/login.php" target="_blank" data-group="DALO-RADIUS">DALAGUETE</a>
                    <a href="http://61.245.13.250:8080/daloradius/login.php" target="_blank" data-group="DALO-RADIUS">GINGOOG</a>
                    <a href="http://103.161.60.18:8080/daloradius/login.php" target="_blank" data-group="DALO-RADIUS">LAPU2</a>
                    <a href="http://139.135.83.214:8080/daloradius/login.php" target="_blank" data-group="DALO-RADIUS">MARAWI</a>
                    <a href="http://103.161.60.114:8080/daloradius/login.php" target="_blank" data-group="DALO-RADIUS">MINGLANILLA</a>
                    <a href="http://122.55.222.234:8080/login.php" target="_blank" data-group="DALO-RADIUS">OZAMIS</a>
                    <a href="http://103.161.60.138:8080/daloradius/login.php" target="_blank" data-group="DALO-RADIUS">OLANGO</a>
                    <a href="http://139.135.78.166:8080/daloradius" target="_blank" data-group="DALO-RADIUS">SAMBOAN</a>
                    <a href="http://61.245.14.134:8080/login.php" target="_blank" data-group="DALO-RADIUS">SURIGAO</a>
                    <a href="http://115.146.175.82:8080/login.php" target="_blank" data-group="DALO-RADIUS">TOLEDO</a>
                </div>
            </div>

            <div class="dropdown">
                <button class="dropbtn" onclick="toggleDropdown('dropdown2')"><i class="fas fa-server"></i> VIRTUAL-MACHINE</button>
                <div class="dropdown-content" id="dropdown2">
                    <a href="https://139.135.79.2:8006/" target="_blank" data-group="VIRTUAL-MACHINE">ALCANTARA</a>
                    <a href="https://192.168.10.251/ui/#/login" target="_blank" data-group="VIRTUAL-MACHINE">CINE CEBU</a>
                    <a href="https://103.161.60.18:8006/" target="_blank" data-group="VIRTUAL-MACHINE">LAPU-LAPU</a>
                    <a href="https://103.161.60.114:8006/" target="_blank" data-group="VIRTUAL-MACHINE">MINGLANILLA</a>
                    <a href="https://139.135.83.214:8006/" target="_blank" data-group="VIRTUAL-MACHINE">MARAWI</a>
                    <a href="https://103.161.60.138:8006/" target="_blank" data-group="VIRTUAL-MACHINE">OLANGO ISLAND</a>
                    <a href="https://139.135.78.166:8006/" target="_blank" data-group="VIRTUAL-MACHINE">SAMBOAN</a>
                    <a href="https://61.245.13.250:8006/" target="_blank" data-group="VIRTUAL-MACHINE">GINGOOG</a>
                </div>
            </div>

            <div class="dropdown">
                <button class="dropbtn" onclick="toggleDropdown('dropdown3')"><i class="fas fa-chart-line"></i> ZABBIX-SERVER</button>
                <div class="dropdown-content" id="dropdown3">
                    <a href="http://139.135.79.2:8081/zabbix" target="_blank" data-group="ZABBIX-SERVER">ALCANTARA</a>
                    <a href="http://103.161.60.30:8081/zabbix" target="_blank" data-group="ZABBIX-SERVER">DANAO</a>
                    <a href="http://103.161.61.242:2205/zabbix/" target="_blank" data-group="ZABBIX-SERVER">CINE CEBU MAIN</a>
                    <a href="http://103.161.60.114:8081/zabbix" target="_blank" data-group="ZABBIX-SERVER">MINGLANILLA</a>
                    <a href="http://139.135.83.214:8081/zabbix/" target="_blank" data-group="ZABBIX-SERVER">MARAWI</a>
                    <a href="http://103.161.60.18:8081/zabbix" target="_blank" data-group="ZABBIX-SERVER">LAPU-LAPU</a>
                    <a href="http://203.177.196.166:8081/zabbix" target="_blank" data-group="ZABBIX-SERVER">BANTAYAN ISLAND</a>
                    <a href="http://61.245.13.250:8081/zabbix" target="_blank" data-group="ZABBIX-SERVER">GINGOOG</a>
                    <a href="http://136.239.196.114:8081/zabbix" target="_blank" data-group="ZABBIX-SERVER">BOHOL</a>
                    <a href="http://139.135.78.166:8081/zabbix" target="_blank" data-group="ZABBIX-SERVER">SAMBOAN</a>
                    <a href="http://115.146.175.82:8081" target="_blank" data-group="ZABBIX-SERVER">TOLEDO</a>
                </div>
            </div>

            <div class="dropdown">
                <button class="dropbtn" onclick="toggleDropdown('dropdown4')"><i class="fas fa-leaf"></i> CACTI-SERVER</button>
                <div class="dropdown-content" id="dropdown4">
                    <a href="http://103.161.61.242:2206/cacti/" target="_blank" data-group="CACTI-SERVER">Cacti Main</a>
                </div>
            </div>

            <div class="dropdown">
                <button class="dropbtn" onclick="toggleDropdown('dropdown5')"><i class="fas fa-tv"></i> WATCH IPTV</button>
                <div class="dropdown-content" id="dropdown5">
                    <a href="https://cignalplaytv.vercel.app/" target="_blank" data-group="WATCH IPTV">CIGNAL TV</a>
		    <a href="http://103.161.61.242:8060/iptv/" target="_blank" data-group="WATCH IPTV">CCTN TV</a>
                </div>
            </div>

            <div class="dropdown">
                <button class="dropbtn" onclick="toggleDropdown('dropdown6')"><i class="fas fa-tools"></i> MORE APPS</button>
                <div class="dropdown-content" id="dropdown6">
                    <a href="http://103.161.61.242/FIL_PRODUCTS_LIVE/CustomerCare/SingleView.aspx?MenuId=785" target="_blank" data-group="MORE APPS">SURE BILLING APP</a>
                    <a href="https://m365.cloud.microsoft/" target="_blank" data-group="MORE APPS">M365</a>
                    <a href="https://www.gmail.com" target="_blank" data-group="MORE APPS">GMAIL</a>
                    <a href="http://www.fast.com" target="_blank" data-group="MORE APPS">FAST.COM</a>
                    <a href="http://www.speedtest.net" target="_blank" data-group="MORE APPS">OOKLA SPEEDTEST</a>
                    <a href="https://ipcow.com/#google_vignette" target="_blank" data-group="MORE APPS">WHATS MY IP</a>
                </div>
            </div>

            <div class="dropdown">
                <button class="dropbtn" onclick="toggleDropdown('dropdown7')"><i class="fas fa-phone"></i> CONTACT US</button>
                <div class="dropdown-content" id="dropdown7">
                    <a href="tel:09096447000" data-group="CONTACT US">CSR1 09096447000</a>
                    <a href="tel:09088868328" data-group="CONTACT US">CSR2 09088868328</a>
                    <a href="tel:09629240564" data-group="CONTACT US">IT-DEPT 09629240564</a>
                </div>
            </div>

            <div class="dropdown">
                <button class="dropbtn" onclick="toggleDropdown('dropdown8')"><i class="fab fa-facebook-messenger"></i> FOR SUPPORT</button>
                <div class="dropdown-content" id="dropdown8">
                    <a href="https://www.facebook.com/cinecebu.noc" target="_blank" data-group="FOR SUPPORT">Message us on FACEBOOK</a>
                </div>
            </div>
        </div>
    </div>

    <div class="logo-section">
        <img src="logo.png" alt="Cine Cebu Logo">
    </div>
    
    <footer class="footer">
        <p>&copy; 2025 Cine Cebu Television Network. All rights reserved.</p>
    </footer>

    <script src="script.js"></script>

</body>
</html>
