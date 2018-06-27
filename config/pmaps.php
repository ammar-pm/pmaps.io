<?php

return [

    'general' => [
        'aws_s3' => 'https://s3.amazonaws.com/palterramaps'
    ],

    'emails' => [
        'from' => 'help@pmaps.io',
        'bcc' => 'maps@quartetoffice.org',
        'replyto' => 'help@pmaps.io',
    ],

    'map' => [
        'lat' => 31.768319,
        'lng' => 35.213710,
        'zoom' => 8,
        'maxzoom' => 18,
        'tileset' => [
        	"id"    => 1,
        	"url"   => "https://cartodb-basemaps-{s}.global.ssl.fastly.net/light_all/{z}/{x}/{y}.png",
        	"title" => "CARTO",
        ],
    ],

    'heatmap' => [
        'radius'                  => 25,
        'blur'                    => 15,
        'heat_max_zoom'           => 5,
        'minimum_opacity'         => 5,
        'maximum_point_intensity' => 1,
        'gradient_outer_amount'   => 0.5,
        'gradient_outer_color'    => "blue",
        'gradient_center_amount'  => 0.65,
        'gradient_center_color'   => "lime",
        'gradient_inner_amount'   => 1,
        'gradient_inner_color'    => "red",
    ],

    'usage' => [
        'Private' => "Private Sector",
        'NGO'        => "NGO",
        'Government'    => "Government",
    ],

    'visibilities' => [
       'team'      => "Team",
       'community' => "Community",
       'publishers' => "Publishers",
    ],

    'plans' => [
        'basic' => 'Basic',
        'publisher' => 'Publisher',
        'admin' => 'Admin',
    ],

    'arcgis_types' => [
        'dynamicMapLayer' => "Dynamic Map Layer",
        'featureLayer'    => "Feature Layer",
        'tiledMapLayer'   => "Tiled Map Layer",
        'imageMapLayer'   => "Image Map Layer",
    ],

    'csv' => [
        'application/vnd.ms-excel',
        'text/csv',
        'csv',
    ],

    'json' => [
        'text/plain',
        'text/json',
        'json',
        'application/octet-stream',
    ],

    'zip' => [  
        'application/zip',
        'zip',
        'application/x-zip-compressed',
    ],
];
