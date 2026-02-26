<?php

// spl_autoload_register(function ($className) {
//     // Base directory (src)
//     $baseDir = __DIR__ . '/../src/';

//     // Determine the directory based on the class name suffix
//     switch (true) {
//         case substr($className, -10) === 'Repository':
//             $directory = 'Repositories';
//             break;
//         case substr($className, -7) === 'Manager':
//             $directory = 'Managers';
//             break;
//         case substr($className, -6) === 'Mapper':
//             $directory = 'Mappers';
//             break;
//         default:
//             $directory = 'Entities';
//             break;
//     }

//     // Build the full file path
//     $file = $baseDir . $directory . '/' . $className . '.php';

//     // Load the file if found
//     if (file_exists($file)) {
//         require $file;
//     }
// });



spl_autoload_register(function ($className) {
    // Base directory (src)
    $baseDir = __DIR__ . '/../src/';

    // Determine the main directory based on the suffix
    switch (true) {
        case substr($className, -10) === 'Repository':
            $directory = 'Repositories';
            break;
        case substr($className, -7) === 'Manager':
            $directory = 'Managers';
            break;
        case substr($className, -6) === 'Mapper':
            $directory = 'Mappers';
            break;
        default:
            $directory = 'Entities';
            break;
    }

    // Recursive search in the directory
    $file = findFileRecursively($baseDir . $directory, $className . '.php');

    if ($file && file_exists($file)) {
        require $file;
    }
});

/**
 * Recherche un fichier récursivement dans un répertoire
 * Search for a file recursively in a directory
 */
function findFileRecursively(string $directory, string $filename): ?string
{
    if (!is_dir($directory)) {
        return null;
    }

    // First check at the root of the directory
    $directPath = $directory . '/' . $filename;
    if (file_exists($directPath)) {
        return $directPath;
    }

    // Browse subfolders
    $iterator = new RecursiveIteratorIterator(
        new RecursiveDirectoryIterator($directory, RecursiveDirectoryIterator::SKIP_DOTS),
        RecursiveIteratorIterator::SELF_FIRST
    );

    foreach ($iterator as $file) {
        if ($file->isFile() && $file->getFilename() === $filename) {
            return $file->getPathname();
        }
    }

    return null;
}
