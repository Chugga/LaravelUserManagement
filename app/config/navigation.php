<?php
/*
 * This file is to be used for storing navigation options for the application. You may set whether the application will utilize a sidebar and/or navbar, and which pages/routes will be available.
 */


return array(
    /*
     * Does the application utilize a top navbar?
     */
    "navbar" => true,

    /*
     * Does the application utilize a side navbar?
     */
    "sidebar" => false,

    /*
     * Navbar menu items
     */

    'navbar_items' => array(
        array(
            'display' => '',
            'icon' => '',
            'privilege' => '',
            'links' => array(
                'display' => '',
                'icon' => '',
                'privilege' => '',
                'route_name' => '',
            ),
        ),
        array(
            'display' => '',
            'icon' => '',
            'privilege' => '',
            'route_name' => '',
        ),
    ),

    /*
     * Sidebar menu items
     */

    'sidebar_items' => array(
        /*array(
            'display' => '',
            'icon' => '',
            'privilege' => '',
            'links' => array(
                'display' => '',
                'icon' => '',
                'privilege' => '',
                'route_name' => '',
            ),
        ),*/
        array(
            'display' => 'Checklists',
            'icon' => 'fa-clipboard',
            'privilege' => 0,
            'route_name' => 'checklists.index'
        ),
        array(
            'display' => 'Clients',
            'icon' => 'fa-archive',
            'privilege' => 0,
            'route_name' => 'clients.index'
        ),
        array(
            'display' => 'Users',
            'icon' => 'fa-users',
            'privilege' => 10,
            'route_name' => 'users.index'
        ),
        array(
            'display' => 'Logout',
            'icon' => 'fa-sign-out',
            'privilege' => 0,
            'route_name' => 'logout',
        ),
    ),
);