<?php

function getWpExcludedSymbols(string $fileName): array
{
    $filePath = __DIR__.'/vendor/sniccowp/php-scoper-wordpress-excludes/generated/'.$fileName;

    return json_decode(
        file_get_contents($filePath),
        true,
    );
}

$wpConstants = getWpExcludedSymbols('exclude-wordpress-constants.json');
$wpClasses = getWpExcludedSymbols('exclude-wordpress-classes.json');
$wpFunctions = getWpExcludedSymbols('exclude-wordpress-functions.json');

// Add assert to the excluded functions to prevent conflicts
$wpFunctions[] = 'assert';

return [
    'prefix' => 'JGWebDevWPSiteBooster', // Change this to your unique prefix
    'finders' => [],
    'patchers' => [],
    'exclude-namespaces' => [
        // Classes/functions/constants you want to keep global (not prefixed)
        'WP_*',
        'JGWPSiteBoostSettings',
        'JGWPLazyLoadImages',
        'Composer', // Don't prefix Composer's own classes
    ],
    'exclude-constants' => $wpConstants,
    'exclude-classes' => $wpClasses,
    'exclude-functions' => $wpFunctions,
];