#!/bin/bash

# Fix all photo fallbacks in struktur.blade.php
sed -i '' 's/onerror="this\.style\.display=.*hidden.*"/onerror="this.src='\''{{ asset('\''images\/struktur\/default-person.png'\'') }}'\''; this.onerror=null;"/g' resources/views/pages/struktur.blade.php

echo "✅ All photo fallbacks updated!"
