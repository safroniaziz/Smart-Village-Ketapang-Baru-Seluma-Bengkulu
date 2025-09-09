#!/bin/bash

FILE="resources/views/pages/struktur.blade.php"

echo "🎯 Fixing all photo sizes to use valid Tailwind classes..."

# Replace w-22 h-22 with w-20 h-20 (valid Tailwind class)
sed -i '' 's/w-22 h-22/w-20 h-20/g' "$FILE"

echo "✅ All photos now use w-20 h-20 (80px x 80px) - valid Tailwind!"
