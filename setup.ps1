# Laravel Setup Script
Write-Host "=== Laravel Setup Script ===" -ForegroundColor Green

# Check if .env exists
if (-not (Test-Path .env)) {
    Write-Host "Creating .env file..." -ForegroundColor Yellow
    # .env file should already be created
}

# Install Composer dependencies
Write-Host "`nInstalling Composer dependencies..." -ForegroundColor Yellow
composer install --no-interaction

if ($LASTEXITCODE -ne 0) {
    Write-Host "Composer install failed!" -ForegroundColor Red
    exit 1
}

# Generate application key
Write-Host "`nGenerating application key..." -ForegroundColor Yellow
php artisan key:generate

# Clear and cache config
Write-Host "`nClearing and caching configuration..." -ForegroundColor Yellow
php artisan config:clear
php artisan config:cache

# Clear and cache routes
Write-Host "`nClearing and caching routes..." -ForegroundColor Yellow
php artisan route:clear
php artisan route:cache

# Run migrations
Write-Host "`nRunning database migrations..." -ForegroundColor Yellow
php artisan migrate --force

# Set storage permissions (Windows doesn't need chmod, but we can ensure directories exist)
Write-Host "`nEnsuring storage directories exist..." -ForegroundColor Yellow
if (-not (Test-Path "storage\framework\cache")) { New-Item -ItemType Directory -Path "storage\framework\cache" -Force }
if (-not (Test-Path "storage\framework\sessions")) { New-Item -ItemType Directory -Path "storage\framework\sessions" -Force }
if (-not (Test-Path "storage\framework\views")) { New-Item -ItemType Directory -Path "storage\framework\views" -Force }
if (-not (Test-Path "storage\logs")) { New-Item -ItemType Directory -Path "storage\logs" -Force }

Write-Host "`n=== Setup Complete! ===" -ForegroundColor Green
Write-Host "You can now run: php artisan serve" -ForegroundColor Cyan
