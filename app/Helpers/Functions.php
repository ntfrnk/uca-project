<?php

if (! function_exists('user')) {
    /**
     * @return string
     */
    function user()
    {
        return auth()->user();
    }
}

if (! function_exists('getIcon')) {
    /**
     * @return string
     */
    function getIcon($name)
    {
        return config('icons.' . $name);
    }
}

if (! function_exists('isAdmin')) {
    /**
     * @return string
     */
    function isAdmin()
    {
        return auth()->user()->level->slug === 'admin';
    }
}

if (! function_exists('isTeacher')) {
    /**
     * @return string
     */
    function isTeacher()
    {
        return auth()->user()->level->slug === 'teacher';
    }
}

if (! function_exists('isStudent')) {
    /**
     * @return string
     */
    function isStudent()
    {
        return auth()->user()->level->slug === 'student';
    }
}