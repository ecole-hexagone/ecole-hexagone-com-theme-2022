<?php
/**
 * 3rd party plugins mods
 * - WP Offload Media lite (support for Scaleway Object Storage)
 *
 * @package Hexagone_2022
 */

/**
 * WP Offload Media lite
 * sources: https://github.com/deliciousbrains/wp-amazon-s3-and-cloudfront-tweaks/blob/master/amazon-s3-and-cloudfront-tweaks.php
 */

add_filter( 'as3cf_aws_s3_client_args', 'scaleway_s3_client_args' );

function scaleway_s3_client_args( $args ) {
    // $region = $args['region'];
    $args['endpoint'] = 'https://s3.fr-par.scw.cloud';
    return $args;
}

add_filter( 'as3cf_aws_get_regions', 'scaleway_s3_get_regions' );

function scaleway_s3_get_regions( $regions ) {
    $regions = array(
        'fr-par' => 'Paris',
        // 'nl-ams' => 'Amsterdam',
        // 'pl-var' => 'Warsaw',
    );

    return $regions;
}

add_filter( 'as3cf_aws_s3_url_domain', 'scaleway_s3_url_domain', 10, 5 );

function scaleway_s3_url_domain( $domain, $bucket, $region, $expires, $args ) {
    return $bucket . '.s3.' . $region . '.scw.cloud';
}

add_filter( 'as3cf_aws_s3_console_url', 'scaleway_s3_console_url' );
add_filter( 'as3cf_aws_s3_console_url_suffix_param', 'scaleway_s3_console_url_suffix_param' );

function scaleway_s3_console_url( $url ) {
    return 'https://console.scaleway.com/object-storage/buckets/fr-par/';
}

function scaleway_s3_console_url_suffix_param( $bucket ) {
    return '';
}