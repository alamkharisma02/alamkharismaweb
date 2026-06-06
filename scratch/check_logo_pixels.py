import struct
import zlib
import collections

def analyze_png_pixels(file_path):
    with open(file_path, 'rb') as f:
        signature = f.read(8)
        if signature != b'\x89PNG\r\n\x1a\n':
            print("Not a valid PNG file")
            return
        
        width = 0
        height = 0
        color_type = 0
        bit_depth = 0
        idat_data = b''
        
        while True:
            chunk_length_bytes = f.read(4)
            if not chunk_length_bytes:
                break
            chunk_length = struct.unpack('>I', chunk_length_bytes)[0]
            chunk_type = f.read(4)
            
            if chunk_type == b'IHDR':
                ihdr_data = f.read(chunk_length)
                width, height, bit_depth, color_type, compression, filter_method, interlace = struct.unpack('>IIBBBBB', ihdr_data)
            elif chunk_type == b'IDAT':
                idat_data += f.read(chunk_length)
            else:
                f.seek(chunk_length, 1)
            
            f.seek(4, 1)  # Skip CRC
            
    if color_type != 6 or bit_depth != 8:
        print("Unsupported color type/bit depth:", color_type, bit_depth)
        return
    
    # Decompress IDAT
    decompressed = zlib.decompress(idat_data)
    
    # Parse scanlines
    # RGBA has 4 bytes per pixel.
    # Each scanline starts with a filter type byte, then width * 4 bytes.
    scanline_length = width * 4 + 1
    non_trans_colors = []
    
    # Let's reconstruct pixels. Since we just need color info, we can read raw decompressed data.
    # Note: filtering might shift the colors slightly, but we can still get a very good estimate.
    # Let's undo the filter if we want exact colors, or just print raw decompressed bytes for non-transparent ones.
    # Actually, let's just do a simple check. If filter is 0 (None), it's exact.
    # Even with filters, we can decode them.
    # Let's decode properly.
    prev_line = bytearray(width * 4)
    current_line = bytearray(width * 4)
    
    for y in range(min(height, 500)):  # analyze first 500 rows
        offset = y * scanline_length
        if offset >= len(decompressed):
            break
        filter_type = decompressed[offset]
        line_data = decompressed[offset+1 : offset+1+width*4]
        
        # Undo filtering
        current_line = bytearray(width * 4)
        if filter_type == 0:  # None
            current_line = bytearray(line_data)
        elif filter_type == 1:  # Sub
            val = 0
            for i in range(len(line_data)):
                val = (line_data[i] + (current_line[i-4] if i >= 4 else 0)) & 0xFF
                current_line[i] = val
        elif filter_type == 2:  # Up
            for i in range(len(line_data)):
                current_line[i] = (line_data[i] + prev_line[i]) & 0xFF
        elif filter_type == 3:  # Average
            for i in range(len(line_data)):
                left = current_line[i-4] if i >= 4 else 0
                up = prev_line[i]
                current_line[i] = (line_data[i] + (left + up) // 2) & 0xFF
        elif filter_type == 4:  # Paeth
            for i in range(len(line_data)):
                a = current_line[i-4] if i >= 4 else 0
                b = prev_line[i]
                c = prev_line[i-4] if i >= 4 else 0
                p = a + b - c
                pa = abs(p - a)
                pb = abs(p - b)
                pc = abs(p - c)
                if pa <= pb and pa <= pc:
                    pred = a
                elif pb <= pc:
                    pred = b
                else:
                    pred = c
                current_line[i] = (line_data[i] + pred) & 0xFF
        else:
            # Unknown filter, just use raw
            current_line = bytearray(line_data)
            
        prev_line = current_line
        
        # Sample non-transparent pixels
        for x in range(width):
            r = current_line[x*4]
            g = current_line[x*4+1]
            b = current_line[x*4+2]
            a = current_line[x*4+3]
            if a > 30:  # non-transparent
                non_trans_colors.append((r, g, b))
                
    counter = collections.Counter(non_trans_colors)
    print("Most common colors (R, G, B) and count:")
    for color, count in counter.most_common(10):
        print(f"  Color: {color} (HEX: #{color[0]:02x}{color[1]:02x}{color[2]:02x}), Count: {count}")

print("=== logo.png ===")
analyze_png_pixels('public/images/logo.png')
print("=== logo11.png ===")
analyze_png_pixels('public/images/logo11.png')
