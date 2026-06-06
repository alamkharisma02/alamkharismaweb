import os
import sys

try:
    from PIL import Image
    im = Image.open('public/images/logo.png')
    print("Format:", im.format)
    print("Size:", im.size)
    print("Mode:", im.mode)
    
    # Get colors
    pixels = list(im.getdata())
    non_transparent = [p for p in pixels if len(p) < 4 or p[3] > 10]
    print("Total pixels:", len(pixels))
    print("Non-transparent pixels:", len(non_transparent))
    
    # Print sample colors
    unique_colors = set(non_transparent[:1000])
    print("Sample unique colors:", list(unique_colors)[:10])
except Exception as e:
    print("Error:", e)
