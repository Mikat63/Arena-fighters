<?php

// spl_autoload_register(function ($className) {
//     // Base directory (src)
//     $baseDir = __DIR__ . '/../src/';

//     // Déterminer le répertoire en fonction du suffixe du nom de la classe
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

//     // Construire le chemin complet du fichier
//     $file = $baseDir . $directory . '/' . $className . '.php';

//     // Charge le fichier si trouvé
//     if (file_exists($file)) {
//         require $file;
//     }
// });



spl_autoload_register(function ($className) {
    // Base directory (src)
    $baseDir = __DIR__ . '/../src/';

    // Déterminer le répertoire principal en fonction du suffixe
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

    // Recherche récursive dans le répertoire
    $file = findFileRecursively($baseDir . $directory, $className . '.php');

    if ($file && file_exists($file)) {
        require $file;
    }
});

/**
 * Recherche un fichier récursivement dans un répertoire
 */
function findFileRecursively(string $directory, string $filename): ?string
{
    if (!is_dir($directory)) {
        return null;
    }

    // Vérifier d'abord à la racine du répertoire
    $directPath = $directory . '/' . $filename;
    if (file_exists($directPath)) {
        return $directPath;
    }

    // Parcourir les sous-dossiers
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
