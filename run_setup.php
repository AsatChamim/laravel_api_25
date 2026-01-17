<?php
/**
 * Laravel Setup Script
 * Jalankan dengan: php run_setup.php
 */

echo "=== Laravel Setup Script ===\n\n";

// 1. Check if vendor exists
if (!is_dir('vendor')) {
    echo "1. Installing Composer dependencies...\n";
    $output = [];
    $return_var = 0;
    exec('composer install --no-interaction 2>&1', $output, $return_var);
    echo implode("\n", $output) . "\n";
    if ($return_var !== 0) {
        echo "ERROR: Composer install failed!\n";
        exit(1);
    }
    echo "✓ Dependencies installed\n\n";
} else {
    echo "✓ Dependencies already installed\n\n";
}

// 2. Generate application key
echo "2. Generating application key...\n";
$output = [];
$return_var = 0;
exec('php artisan key:generate --force 2>&1', $output, $return_var);
echo implode("\n", $output) . "\n";
if ($return_var !== 0) {
    echo "WARNING: Key generation may have failed, but continuing...\n";
} else {
    echo "✓ Application key generated\n\n";
}

// 3. Clear and cache config
echo "3. Clearing and caching configuration...\n";
exec('php artisan config:clear 2>&1');
exec('php artisan config:cache 2>&1');
echo "✓ Configuration cached\n\n";

// 4. Run migrations
echo "4. Running database migrations...\n";
$output = [];
$return_var = 0;
exec('php artisan migrate --force 2>&1', $output, $return_var);
echo implode("\n", $output) . "\n";
if ($return_var !== 0) {
    echo "WARNING: Migrations may have failed, but continuing...\n";
} else {
    echo "✓ Migrations completed\n\n";
}

// 5. Ensure storage directories exist
echo "5. Ensuring storage directories exist...\n";
$dirs = [
    'storage/framework/cache',
    'storage/framework/sessions',
    'storage/framework/views',
    'storage/logs',
    'bootstrap/cache'
];

foreach ($dirs as $dir) {
    if (!is_dir($dir)) {
        mkdir($dir, 0755, true);
        echo "✓ Created: $dir\n";
    }
}
echo "\n";

echo "=== Setup Complete! ===\n";
echo "You can now run: php artisan serve\n";
echo "Then open: http://localhost:8000\n\n";
