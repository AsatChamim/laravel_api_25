@echo off
chcp 65001 >nul
echo Starting Laravel Server...
echo.
echo Server will be available at: http://localhost:8000
echo Press Ctrl+C to stop the server
echo.
php artisan serve
