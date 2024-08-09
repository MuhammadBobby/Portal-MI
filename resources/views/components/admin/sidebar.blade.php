<?php
$menus = [
    [
        'href' => '/admin',
        'icon' => 'bx bxs-dashboard',
        'text' => 'Dashboard',
        'active' => true,
    ],
    [
        'href' => '/admin/news',
        'icon' => 'bx bxs-news',
        'text' => 'News',
    ],
    [
        'href' => '/admin/categories',
        'icon' => 'bx bxs-category',
        'text' => 'Categories',
    ],
    [
        'href' => '/admin/users',
        'icon' => 'bx bxs-user',
        'text' => 'Users',
    ],
];

$secondaryMenus = [
    [
        'href' => '/',
        'icon' => 'bx bxs-home',
        'text' => 'Back to website',
    ],
    [
        'href' => '#',
        'icon' => 'bx bxs-log-out-circle',
        'text' => 'Logout',
        'class' => 'logout',
    ],
];
?>


<section id="sidebar">
    <a href="#" class="brand">
        <img src="/assets/logo/logoMI.png" alt="logo MI" class="w-16">
        <span class="text">Portal MI</span>
    </a>
    <ul class="side-menu top">
        <?php foreach ($menus as $menu): ?>
        <li class="<?= isset($menu['active']) && $menu['active'] ? 'active' : '' ?>">
            <a href="<?= $menu['href'] ?>">
                <i class='<?= $menu['icon'] ?>'></i>
                <span class="text"><?= $menu['text'] ?></span>
            </a>
        </li>
        <?php endforeach; ?>
    </ul>
    <ul class="side-menu">
        <?php foreach ($secondaryMenus as $menu): ?>
        <li>
            <a href="<?= $menu['href'] ?>" class="<?= $menu['class'] ?? '' ?>">
                <i class='<?= $menu['icon'] ?>'></i>
                <span class="text"><?= $menu['text'] ?></span>
            </a>
        </li>
        <?php endforeach; ?>
    </ul>
</section>



{{-- <script src="/js/sidebar.js"></script> --}}
