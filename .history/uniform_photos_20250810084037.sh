#!/bin/bash

FILE="resources/views/pages/struktur.blade.php"

# Make all photo containers uniform size (20x20) and square with border
sed -i '' 's/w-18 h-18 bg-white\/20 rounded-full/w-20 h-20 bg-white\/20 rounded-xl border-2 border-white\/30/g' "$FILE"
sed -i '' 's/w-16 h-16 bg-white\/20 rounded-full/w-20 h-20 bg-white\/20 rounded-xl border-2 border-white\/30/g' "$FILE"
sed -i '' 's/w-24 h-24 bg-white\/20 rounded-full/w-24 h-24 bg-white\/20 rounded-xl border-2 border-white\/30/g' "$FILE"

# Fix government structure photos
sed -i '' 's/w-20 h-20 bg-white\/20 rounded-full/w-20 h-20 bg-white\/20 rounded-xl border-2 border-white\/30/g' "$FILE"

# Fix Kaur/Kasi photos
sed -i '' 's/w-16 h-16 bg-yellow-500 rounded-full/w-18 h-18 bg-yellow-500 rounded-xl border-2 border-yellow-300/g' "$FILE"
sed -i '' 's/w-16 h-16 bg-orange-500 rounded-full/w-18 h-18 bg-orange-500 rounded-xl border-2 border-orange-300/g' "$FILE"
sed -i '' 's/w-16 h-16 bg-teal-500 rounded-full/w-18 h-18 bg-teal-500 rounded-xl border-2 border-teal-300/g' "$FILE"
sed -i '' 's/w-16 h-16 bg-purple-500 rounded-full/w-18 h-18 bg-purple-500 rounded-xl border-2 border-purple-300/g' "$FILE"

# Fix Kepala Dusun photos
sed -i '' 's/w-16 h-16 bg-white\/20 rounded-full/w-18 h-18 bg-white\/20 rounded-xl border-2 border-white\/30/g' "$FILE"

echo "✅ All photos made uniform and professional!"
