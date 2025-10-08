#!/usr/bin/env python3
import re
import sys

def fix_duplicate_niks(filename):
    with open(filename, 'r') as f:
        content = f.read()

    # Find all NIK values and their positions
    nik_pattern = r"'nik' => '([^']+)'"
    matches = list(re.finditer(nik_pattern, content))

    # Count occurrences of each NIK
    nik_counts = {}
    for match in matches:
        nik = match.group(1)
        if nik not in nik_counts:
            nik_counts[nik] = 0
        nik_counts[nik] += 1

    # Find duplicates
    duplicates = {nik: count for nik, count in nik_counts.items() if count > 1}

    if not duplicates:
        print("No duplicates found")
        return

    print(f"Found {len(duplicates)} duplicate NIKs")

    # Process content to fix duplicates
    new_content = content
    nik_occurrence_count = {}

    # Process each match in reverse order to maintain positions
    for match in reversed(matches):
        nik = match.group(1)
        if nik in duplicates:
            if nik not in nik_occurrence_count:
                nik_occurrence_count[nik] = duplicates[nik]

            # If this is not the first occurrence, modify it
            if nik_occurrence_count[nik] > 1:
                # Create new unique NIK
                if nik == '-' or nik == '':
                    new_nik = f"NIK_UNIQUE_{nik_occurrence_count[nik]:03d}"
                else:
                    # Increment the last digits
                    if nik.isdigit():
                        new_nik = str(int(nik) + nik_occurrence_count[nik] - 1)
                    else:
                        new_nik = f"{nik}_{nik_occurrence_count[nik]:02d}"

                # Replace the NIK
                old_text = f"'nik' => '{nik}'"
                new_text = f"'nik' => '{new_nik}'"

                start, end = match.span()
                new_content = new_content[:start] + new_text + new_content[end:]

                print(f"Changed duplicate NIK '{nik}' to '{new_nik}'")

            nik_occurrence_count[nik] -= 1

    # Write back to file
    with open(filename, 'w') as f:
        f.write(new_content)

    print(f"Fixed duplicates in {filename}")

if __name__ == "__main__":
    if len(sys.argv) != 2:
        print("Usage: python3 fix_duplicates.py <seeder_file>")
        sys.exit(1)

    fix_duplicate_niks(sys.argv[1])
