<header class="header">
    <nav class="nav container aling-items-center">
        <div>
            <a href="/" class="nav__brand-logo">
                LOGO
            </a>
        </div>
        <div>
            <ul>
                <li>
                    <a href="/about" class="<?php if (isset($app_name)) echo check_app_name($app_name, "about", 'active') ?>">
                        About
                    </a>
                </li>
                <li>
                <a href="/contact" class="<?php if (isset($app_name)) echo check_app_name($app_name, 'contact', 'active') ?>">
                        Contact
                    </a>
                </li>
            </ul>
        </div>
    </nav>
</header>