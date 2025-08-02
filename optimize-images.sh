#!/bin/bash

# Image Optimization Script for ISMC Theme
# This script converts images to WebP format and creates responsive sizes

IMAGES_DIR="./images"
QUALITY=85

# Check if webp tools are installed
if ! command -v cwebp &> /dev/null; then
    echo "cwebp could not be found. Please install webp tools:"
    echo "macOS: brew install webp"
    echo "Ubuntu: sudo apt-get install webp"
    exit 1
fi

# Create WebP versions of all JPG and PNG files
echo "Converting images to WebP format..."

for file in "$IMAGES_DIR"/*.{jpg,jpeg,png,JPG,JPEG,PNG}; do
    if [ -f "$file" ]; then
        filename=$(basename "$file")
        name="${filename%.*}"
        webp_file="$IMAGES_DIR/$name.webp"
        
        if [ ! -f "$webp_file" ]; then
            echo "Converting $filename to WebP..."
            cwebp -q $QUALITY "$file" -o "$webp_file"
        else
            echo "WebP version of $filename already exists"
        fi
    fi
done

# Create responsive image sizes for hero images
echo "Creating responsive sizes for hero images..."

# Hero image sizes
for size in "small:768:432" "medium:1200:675" "large:1920:1080"; do
    size_name=$(echo $size | cut -d: -f1)
    width=$(echo $size | cut -d: -f2)
    height=$(echo $size | cut -d: -f3)
    
    # Process hero-image.jpg
    if [ -f "$IMAGES_DIR/hero-image.jpg" ]; then
        output_jpg="$IMAGES_DIR/hero-image-$size_name.jpg"
        output_webp="$IMAGES_DIR/hero-image-$size_name.webp"
        
        if [ ! -f "$output_jpg" ]; then
            echo "Creating hero-image-$size_name.jpg ($width x $height)"
            convert "$IMAGES_DIR/hero-image.jpg" -resize "${width}x${height}^" -gravity center -crop "${width}x${height}+0+0" "$output_jpg"
        fi
        
        if [ ! -f "$output_webp" ]; then
            echo "Creating hero-image-$size_name.webp ($width x $height)"
            cwebp -q $QUALITY "$output_jpg" -o "$output_webp"
        fi
    fi
done

# Create story image sizes
echo "Creating responsive sizes for story images..."

for size in "small:400:300" "medium:600:450" "large:800:600"; do
    size_name=$(echo $size | cut -d: -f1)
    width=$(echo $size | cut -d: -f2)
    height=$(echo $size | cut -d: -f3)
    
    for story_image in "$IMAGES_DIR"/{Hatsumi_01,Vinu_01,Yan_01,Mindy_01,Kenji_01}.jpg; do
        if [ -f "$story_image" ]; then
            filename=$(basename "$story_image")
            name="${filename%.*}"
            
            output_jpg="$IMAGES_DIR/$name-$size_name.jpg"
            output_webp="$IMAGES_DIR/$name-$size_name.webp"
            
            if [ ! -f "$output_jpg" ]; then
                echo "Creating $name-$size_name.jpg ($width x $height)"
                convert "$story_image" -resize "${width}x${height}^" -gravity center -crop "${width}x${height}+0+0" "$output_jpg"
            fi
            
            if [ ! -f "$output_webp" ]; then
                echo "Creating $name-$size_name.webp ($width x $height)"
                cwebp -q $QUALITY "$output_jpg" -o "$output_webp"
            fi
        fi
    done
done

# Create logo sizes
echo "Creating logo sizes..."

if [ -f "$IMAGES_DIR/ISMC_primary_logo.png" ]; then
    for size in "small:300" "medium:400" "large:600"; do
        size_name=$(echo $size | cut -d: -f1)
        width=$(echo $size | cut -d: -f2)
        
        output_png="$IMAGES_DIR/ISMC_primary_logo-$size_name.png"
        output_webp="$IMAGES_DIR/ISMC_primary_logo-$size_name.webp"
        
        if [ ! -f "$output_png" ]; then
            echo "Creating ISMC_primary_logo-$size_name.png (width: $width)"
            convert "$IMAGES_DIR/ISMC_primary_logo.png" -resize "${width}x" "$output_png"
        fi
        
        if [ ! -f "$output_webp" ]; then
            echo "Creating ISMC_primary_logo-$size_name.webp (width: $width)"
            cwebp -q $QUALITY "$output_png" -o "$output_webp"
        fi
    done
fi

echo "Image optimization complete!"
echo ""
echo "Summary of optimizations:"
echo "✓ WebP versions created for better compression"
echo "✓ Responsive image sizes generated"
echo "✓ Hero images optimized for different screen sizes"
echo "✓ Story images optimized for modal display"
echo "✓ Logo images optimized for different pixel densities"
echo ""
echo "Next steps:"
echo "1. Test your website's loading performance"
echo "2. Run a Lighthouse audit to check LCP improvements"
echo "3. Monitor Core Web Vitals in Google Search Console"