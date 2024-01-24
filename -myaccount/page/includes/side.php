<div class="left-sidebar">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebar-menu">
                <li class="nav-devider"></li>
                <?php

                include("includes/links.php");
                $i = 0;
                foreach ($links as $top_key => $top_value) {
                    if (is_array($top_value)) {
                ?>

                        <li class="nav-label"><?php echo $top_key ?></li>

                        <?php
                        foreach ($top_value as $key => $value) {
                            if ($key == "icon") {
                                 $icon = $value;
                            } else {
                                if (
                                    array_key_exists(strstr(basename($_SERVER['PHP_SELF']), ".", true), $value)
                                ) { // this particular to if we can find key[link name] in side it. then that means the link is inside the drop down

                        ?>
                                    <li class="active"> <a class="has-arrow" href="#" aria-expanded="false"><i class="fa <?php echo $icon?>"></i><span class="hide-menu"><?php echo $key ?> </span></a>
                                    <?php
                                } else {
                                    ?>
                                    <li> <a class="has-arrow" href="#" aria-expanded="false"><i class="fa <?php echo $icon?>"></i><span class="hide-menu"><?php echo $key ?> </span></a>
                                        <?php
                                    }
                                    foreach ($value as $key => $value) {
                                        if (basename($_SERVER["PHP_SELF"]) == $key . '.php') {
                                        ?>
                                            <ul aria-expanded="false" class="collapse">
                                                <li><a href="<?php echo $key . '.php' ?>" class="active"><?php echo $value ?></a></li>
                                            </ul>
                                        <?php
                                        } else {
                                        ?>
                                            <ul aria-expanded="false" class="collapse">
                                                <li><a href="<?php echo $key . '.php' ?>"><?php echo $value ?></a></li>
                                            </ul>

                                    <?php
                                        }
                                    }
                                    ?>
                                    </li>
                    <?php
                            }
                        }
                    }
                }

                    ?>
            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</div>