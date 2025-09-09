#!/bin/bash

# Save everything before line 525 and scripts from line 895 onward
head -n 525 resources/views/pages/struktur.blade.php > temp_struktur.blade.php
echo "" >> temp_struktur.blade.php
echo "@push('scripts')" >> temp_struktur.blade.php
tail -n +900 resources/views/pages/struktur.blade.php >> temp_struktur.blade.php

# Replace original file
mv temp_struktur.blade.php resources/views/pages/struktur.blade.php

echo "✅ Old BPD section cleaned up!"
