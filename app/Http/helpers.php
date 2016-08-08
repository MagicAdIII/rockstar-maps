<?php

if (! function_exists('elixirAsset')) {
    /**
     * Generate the correct path of given asset based on app environment.
     *
     * @param string $file
     *
     * @return string
     */
    function elixirAsset($file) {
        if (env('APP_ENV') === 'production') {
            return elixir($file);
        }

        return asset($file);
    }
}
