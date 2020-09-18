<?php

/**
 * Require a view.
 *
 * @param string $name
 * @param array $data
 *
 * @return mixed
 */
function view(string $name, array $data = [])
{
    extract($data);

    return require "app/views/{$name}.php";
}

/**
 * Redirect to a new page.
 *
 * @param string $name
 */
function redirect(string $name)
{
    header("Location: /$name");
}