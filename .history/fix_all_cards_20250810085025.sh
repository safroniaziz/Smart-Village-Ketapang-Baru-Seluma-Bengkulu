#!/bin/bash

FILE="resources/views/pages/struktur.blade.php"

echo "🎯 Fixing all organizational cards..."

# Fix BPD cards - make them uniform height
sed -i '' 's/min-w-\[190px\] relative overflow-hidden/min-w-[190px] h-[320px] relative overflow-hidden/g' "$FILE"
sed -i '' 's/min-w-\[160px\] relative overflow-hidden/min-w-[160px] h-[280px] relative overflow-hidden/g' "$FILE"

# Fix Government structure cards - make Kepala Desa professional
sed -i '' 's/bg-gradient-to-br from-blue-600 to-indigo-700 rounded-2xl p-8 text-white/bg-white rounded-2xl p-8 text-center shadow-2xl border border-gray-100 hover:shadow-3xl transition-all duration-300 h-[400px] relative overflow-hidden/g' "$FILE"

# Fix Sekretaris Desa card
sed -i '' 's/bg-white rounded-2xl p-6 shadow-lg border-2 border-green-200/bg-white rounded-2xl p-6 shadow-xl border border-gray-100 hover:shadow-2xl transition-all duration-300 h-[320px]/g' "$FILE"

echo "✅ All cards fixed and made uniform!"
