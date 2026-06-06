import struct
import zlib

def analyze_png(file_path):
    with open(file_path, 'rb') as f:
        signature = f.read(8)
        if signature != b'\x89PNG\r\n\x1a\n':
            print("Not a valid PNG file")
            return
        
        while True:
            chunk_length_bytes = f.read(4)
            if not chunk_length_bytes:
                break
            chunk_length = struct.unpack('>I', chunk_length_bytes)[0]
            chunk_type = f.read(4)
            
            if chunk_type == b'IHDR':
                ihdr_data = f.read(chunk_length)
                width, height, bit_depth, color_type, compression, filter_method, interlace = struct.unpack('>IIBBBBB', ihdr_data)
                print("Width:", width, "Height:", height)
                print("Bit depth:", bit_depth)
                print("Color type:", color_type, "(2=RGB, 3=Indexed, 6=RGBA)")
            elif chunk_type == b'PLTE':
                plte_data = f.read(chunk_length)
                print("Palette size:", len(plte_data) // 3)
                colors = []
                for i in range(0, len(plte_data), 3):
                    colors.append((plte_data[i], plte_data[i+1], plte_data[i+2]))
                print("Sample palette colors:", colors[:10])
            elif chunk_type == b'IDAT':
                # We can skip IDAT data for now
                f.seek(chunk_length, 1)
            else:
                f.seek(chunk_length, 1)
            
            # Skip CRC
            f.seek(4, 1)

print("--- logo.png ---")
analyze_png('public/images/logo.png')
print("--- logo11.png ---")
analyze_png('public/images/logo11.png')
print("--- logo_vertical.png ---")
analyze_png('public/images/logo_vertical.png')
