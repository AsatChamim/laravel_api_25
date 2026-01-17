@echo off
chcp 65001 >nul
echo === Laravel Setup Script ===
echo.

if not exist vendor (
    echo [1/4] Installing Composer dependencies...
    call composer install --no-interaction
    if errorlevel 1 (
        echo ERROR: Composer install failed!
        pause
        exit /b 1
    )
    echo OK: Dependencies installed
) else (
    echo OK: Dependencies already installed
)

echo.
echo [2/4] Generating application key...
call php artisan key:generate --force
if errorlevel 1 (
    echo WARNING: Key generation may have issues, but continuing...
) else (
    echo OK: Application key generated
)

echo.
echo [3/4] Clearing and caching configuration...
call php artisan config:clear
call php artisan config:cache
echo OK: Configuration cached

echo.
echo [4/4] Running database migrations...
call php artisan migrate --force
if errorlevel 1 (
    echo WARNING: Migrations may have issues, but continuing...
) else (
    echo OK: Migrations completed
)

echo.
echo === Setup Complete! ===
echo.
echo Starting Laravel server...
echo Server will be available at: http://localhost:8000
echo Press Ctrl+C to stop the server
echo.
call php artisan serve
pause
