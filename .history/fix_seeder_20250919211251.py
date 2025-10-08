#!/usr/bin/env python3
import re
import sys

def fix_seeder_duplicates(filename):
    with open(filename, 'r') as f:
        lines = f.readlines()
    
    # Parse entries
    entries = []
    current_entry = []
    in_entry = False
    
    for i, line in enumerate(lines):
        if '[' in line and 'no_kk' in lines[i+1] if i+1 < len(lines) else False:
            if current_entry:
                entries.append((current_entry, len(current_entry)))
            current_entry = [line]
            in_entry = True
        elif in_entry:
            current_entry.append(line)
            if line.strip() == '],':
                entries.append((current_entry, len(current_entry)))
                current_entry = []
                in_entry = False
    
    # Extract NIKs and find duplicates
    nik_to_entries = {}
    
    for idx, (entry_lines, _) in enumerate(entries):
        entry_text = ''.join(entry_lines)
        nik_match = re.search(r"'nik' => '([^']*)'", entry_text)
        if nik_match:
            nik = nik_match.group(1)
            if nik not in nik_to_entries:
                nik_to_entries[nik] = []
            nik_to_entries[nik].append(idx)
    
    # Find entries to remove
    entries_to_remove = set()
    
    for nik, entry_indices in nik_to_entries.items():
        if len(entry_indices) > 1:
            if nik.isdigit():  # NIK is numeric - remove duplicates
                # Keep first, remove others
                for idx in entry_indices[1:]:
                    entries_to_remove.add(idx)
                    print(f"Removing duplicate numeric NIK: {nik}")
            elif nik in ['', '-', 'null']:  # Empty NIK - make unique with name
                for i, idx in enumerate(entry_indices):
                    if i > 0:  # Skip first occurrence
                        entry_text = ''.join(entries[idx][0])
                        name_match = re.search(r"'nama_lengkap' => '([^']*)'", entry_text)
                        if name_match:
                            name = name_match.group(1)
                            unique_nik = f"NIK_{name.replace(' ', '_')}_{i:03d}"
                            # Update the entry
                            new_entry = []
                            for line in entries[idx][0]:
                                if "'nik' =>" in line:
                                    line = re.sub(r"'nik' => '[^']*'", f"'nik' => '{unique_nik}'", line)
                                new_entry.append(line)
                            entries[idx] = (new_entry, len(new_entry))
                            print(f"Changed empty NIK to unique: {unique_nik}")
    
    # Rebuild file content
    new_lines = []
    
    # Add header (everything before first entry)
    first_entry_start = 0
    for i, line in enumerate(lines):
        if '[' in line and i+1 < len(lines) and 'no_kk' in lines[i+1]:
            first_entry_start = i
            break
        new_lines.append(line)
    
    # Add entries (excluding removed ones)
    for idx, (entry_lines, _) in enumerate(entries):
        if idx not in entries_to_remove:
            new_lines.extend(entry_lines)
    
    # Add footer (everything after last entry)
    # For now, just add the closing brackets
    new_lines.append("        ]);\n")
    new_lines.append("    }\n")
    new_lines.append("}\n")
    
    # Write back
    with open(filename, 'w') as f:
        f.writelines(new_lines)
    
    print(f"Fixed {len(entries_to_remove)} duplicate entries in {filename}")

if __name__ == "__main__":
    if len(sys.argv) != 2:
        print("Usage: python3 fix_seeder.py <seeder_file>")
        sys.exit(1)
    
    fix_seeder_duplicates(sys.argv[1])
