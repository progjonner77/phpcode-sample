<aside id="layout-menu" class="layout-menu menu-vertical menu
          bg-menu-theme">
    <div class="app-brand demo ">
        <a href="index.php" class="app-brand-link">
            <span class="app-brand-logo demo">
                <img src="../assets/img/logo/logo.png" />
                <span class="app-brand-text demo menu-text fw-bolder ms-2"></span>
            </span>

        </a>

        <a href="javascript:void(0);" class="layout-menu-toggle menu-link
              text-large ms-auto d-block d-xl-none">
            <i class="bx bx-chevron-left bx-sm align-middle"></i>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>
    <ul class="menu-inner py-1">

        <?php

        include("includes/links.php");
        $i = 0;

        foreach ($links as $main_top_key => $main_top_value) {

        ?>
            <li class="menu-header small text-uppercase">
                <span class="menu-header-text"><?php echo $main_top_key ?></span>
            </li>

            <?php
            foreach ($main_top_value as $top_key => $top_value) {
                if (is_array($top_value)) {


                    $icon = $top_value["icon"];
                    if (
                        array_key_exists(strstr(basename($_SERVER['PHP_SELF']), ".", true), $top_value)
                    ) { // this particular to if we can find key[link name] in side it. then that means the link is inside the drop down


            ?>


                        <li class="menu-item active">
                            <a href="javascript:void(0);" class="menu-link menu-toggle">
                                <i class="menu-icon tf-icons bx <?php echo $icon ?>"></i>
                                <div data-i18n="Layouts"><?php echo $top_key ?></div>
                            </a>
                        <?php
                    } else {
                        ?>
                        <li class="menu-item">
                            <a href="javascript:void(0);" class="menu-link menu-toggle">
                                <i class="menu-icon tf-icons bx <?php echo $icon ?>"></i>
                                <div data-i18n="Layouts"><?php echo $top_key ?></div>
                            </a>

                        <?php
                    }


                        ?><ul class="menu-sub"><?php
                                                foreach ($top_value as $key => $value) {
                                                    if ($key == "icon") {
                                                        $icon = $key;
                                                    } else {
                                                        if (basename($_SERVER["PHP_SELF"]) == $key . '.php') {
                                                ?>
                                        <li class="menu-item active">
                                            <a href="<?php echo $key . '.php' ?>" class="menu-link">
                                                <div data-i18n="Without menu"><?php echo $value ?></div>
                                            </a>
                                        </li>
                                    <?php
                                                        } else {
                                    ?>
                                        <li class="menu-item">
                                            <a href="<?php echo $key . '.php' ?>" class="menu-link">
                                                <div data-i18n="Without menu"><?php echo $value ?></div>
                                            </a>
                                        </li>
                            <?php
                                                        }
                                                    }
                                                }
                            ?>

                        </ul>

                        </li>

            <?php
                }
            }
        }
            ?>
    </ul>
</aside>