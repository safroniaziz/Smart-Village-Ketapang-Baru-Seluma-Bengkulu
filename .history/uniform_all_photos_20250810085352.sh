#!/bin/bash

FILE="resources/views/pages/struktur.blade.php"

echo "🎯 Making ALL photos exactly the same size (22x22)..."

# Change all photo sizes to w-22 h-22
sed -i '' 's/w-28 h-28/w-22 h-22/g' "$FILE"
sed -i '' 's/w-24 h-24/w-22 h-22/g' "$FILE"
sed -i '' 's/w-20 h-20/w-22 h-22/g' "$FILE"
sed -i '' 's/w-18 h-18/w-22 h-22/g' "$FILE"
sed -i '' 's/w-16 h-16/w-22 h-22/g' "$FILE"

echo "✅ All photos are now uniform 22x22!"
