<?php

function elixirAsset($file) {
	if (env('APP_ENV') === 'production') {
		return elixir($file);
	}

	return asset($file);
}