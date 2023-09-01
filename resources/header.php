<div class="header-content">
    <div class="header-top">
        <div class="logo-header"><a href="index.php"><img class="logo-img" src="images/header/logo-nuevo-pequenio.png"></a></div>
        <div class="redes-header">
            <div class="text-header-top"><span>Visita nuestras redes:</span></div>
            <div class="iconos-header">
                <div><a href="https://www.tiktok.com/@zehlendorfwheels"><img class="iconos-redes icono-tiktok"></a></div>
                <div><a href="https://www.youtube.com/watch?v=rCDRzrONTnE&ab_channel=AutoMundoTV"><img class="iconos-redes icono-youtube"></a></div>
                <div><a href="https://www.instagram.com/aroszehlendorf/"><img class="iconos-redes icono-instagram"></a></div>
                <div><a href="https://www.facebook.com/zehlendorfperu"><img class="iconos-redes icono-facebook"></a></div>
            </div>
        </div>
    </div>
    <div class="header-bottom">
        <div class="menu-header">
            <a href="aros.php" <?php if ($_SERVER['PHP_SELF'] == '/NUEVO ZEHLENDORF/aros.php') echo 'class="active"'; ?>>
                <div class="text-menu-header">Aros</div>
            </a>
            <a href="llantas.php" <?php if ($_SERVER['PHP_SELF'] == '/NUEVO ZEHLENDORF/llantas.php') echo 'class="active"'; ?>>
                <div class="text-menu-header">Llantas</div>
            </a>
            <a href="#" <?php if ($_SERVER['PHP_SELF'] == '#.php') echo 'class="active"'; ?>>
                <div class="text-menu-header">Faros</div>
            </a>
            <a href="#" <?php if ($_SERVER['PHP_SELF'] == '#.php') echo 'class="active"'; ?>>
                <div class="text-menu-header">Accesorios</div>
            </a>
        </div>
        <div class="barra-buscar">
            <input class="input-buscar" type="text" placeholder="Buscar...">
            <button class="btn-buscar">Buscar</button>
        </div>
    </div>
</div>