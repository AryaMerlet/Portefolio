<?php

namespace Components\Interfaces;

interface Administrable
{
    public static function add();
    public static function delete();
    public static function modif();
    public static function get();
    public static function retrieve();
}