<?php namespace EveningDesign\Boiler\Support;

class Helpers {

    public static function makeTemplateFilename($filename) {
        return __DIR__ . '/../templates/' .$filename;
    }

    public static function makeConstantsFilename($filename = "") {
        return app_path("Constants")."/$filename";
    }

    public static function makeHttpFilename($filename = "") {
        return app_path("Http")."/$filename";
    }

    public static function makeModelFilename($filename = "") {
        return app_path("Models")."/$filename";
    }

    public static function makeControllerFilename($filename = "") {
        return app_path("Http/Controllers")."/$filename";
    }

    public static function makeRequestsFilename($filename = "") {
        return app_path("Http/Requests")."/$filename";
    }

    public static function makeViewsFilename($filename = "") {
        return base_path("resources/views")."/$filename";
    }

    public static function ensureDirectory($directory) {
        if(!file_exists($directory)) {
            mkdir($directory);
        }
    }

    public static function makeHumanFriendly($text) {
        return ucwords(str_replace("_", " ", snake_case($text)));
    }

    public static function getLayout()
    {
        return config('boiler.blade.layout');
    }

    public static function getContentSection()
    {
        return config('boiler.blade.sections.content');
    }

    public static function getHeading()
    {
        return config('boiler.styling.headings');
    }

    public static function getButtonSize()
    {
        return config('boiler.styling.classes.button-size');
    }

    public static function getTableClass()
    {
        return config('boiler.styling.classes.table');
    }

}