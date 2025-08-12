# Script para generar favicons desde logo original
# Coloca tu logo original como "logo.png" en public/ y ejecuta:

# Favicon 32x32 (requerido)
convert logo.png -resize 32x32 favicon-32x32.png

# Favicon 16x16 (complementario)
convert logo.png -resize 16x16 favicon-16x16.png

# Android Chrome 512x512 (requerido)
convert logo.png -resize 512x512 android-chrome-512x512.png

# Android Chrome 192x192 (recomendado)
convert logo.png -resize 192x192 android-chrome-192x192.png

# Apple Touch Icon 180x180
convert logo.png -resize 180x180 apple-touch-icon.png

# Favicon.ico multitamaño (incluye 256x256)
convert logo.png \( -clone 0 -resize 16x16 \) \( -clone 0 -resize 32x32 \) \( -clone 0 -resize 48x48 \) \( -clone 0 -resize 256x256 \) -delete 0 favicon.ico
