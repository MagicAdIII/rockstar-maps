#!/bin/bash

# Installs the project by running build processes.

## Checking dependencies
if [ ! -f /usr/bin/gdal2tiles.py ]; then
	echo "[!] gdal2tiles is required. Run 'sudo apt-get install gdal-bin python-gdal'."; exit 1;
fi

# /usr/bin/gdal2tiles.py -p raster -z 0-5 -w  none GTAV_SATELLITE_8192x8192.png satellite
# /usr/bin/gdal2tiles.py -p raster -z 0-5 -w  none GTAV_ATLUS_8192x8192.png atlas
# /usr/bin/gdal2tiles.py -p raster -z 0-5 -w  none GTAV_ROADMAP_8192x8192.png road
