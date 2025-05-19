#!/bin/bash
set -e

# Ensure .env exists
if [ ! -f .env ]; then
  echo "📄 Copying .env.example to .env..."
  cp .env.example .env
fi

echo "🔧 Building and starting containers (first boot)..."
docker compose up --build -d

echo "⏳ Waiting for Laravel to generate APP_KEY..."
APP_KEY=""
while [ -z "$APP_KEY" ]; do
  APP_KEY=$(docker compose exec -T app php artisan config:show app.key 2>/dev/null || echo "")
  sleep 1
done

echo "✅ APP_KEY detected: $APP_KEY"
echo "🔁 Restarting containers to reload environment with correct APP_KEY..."
docker compose down
docker compose up -d