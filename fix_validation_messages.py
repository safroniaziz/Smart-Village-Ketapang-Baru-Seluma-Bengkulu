#!/usr/bin/env python3
"""
Script to fix validation message format in create.blade.php
This will ensure every field has proper invalid-feedback div structure
"""

import re

def fix_error_messages(content):
    # Pattern to match @error...@enderror blocks with invalid-feedback
    pattern = r'@error\(\'([^\']+)\'\)\s*<div class="invalid-feedback">\{\{\s*\$message\s*\}\}</div>\s*@enderror'

    def replacement(match):
        field_name = match.group(1)
        return f'<div class="invalid-feedback">@error(\'{field_name}\'){{{{ $message }}}}@enderror</div>'

    # Replace all occurrences
    fixed_content = re.sub(pattern, replacement, content, flags=re.MULTILINE | re.DOTALL)

    return fixed_content

# Read the file
with open('/Users/jurusankoding/docker/smart-village/resources/views/admin/data-warga/create.blade.php', 'r') as f:
    content = f.read()

# Fix the content
fixed_content = fix_error_messages(content)

# Write back to file
with open('/Users/jurusankoding/docker/smart-village/resources/views/admin/data-warga/create.blade.php', 'w') as f:
    f.write(fixed_content)

print("Fixed validation message format in create.blade.php")
