const fs = require('fs');
const path = require('path');

// Copy JS files to dist
const jsDir = path.join(__dirname, '../js');
const distJsDir = path.join(__dirname, '../dist/js');
const assetsDir = path.join(__dirname, '../assets');
const distAssetsDir = path.join(__dirname, '../dist/assets');

// Create directories if they don't exist
if (!fs.existsSync(distJsDir)) {
  fs.mkdirSync(distJsDir, { recursive: true });
}
if (!fs.existsSync(distAssetsDir)) {
  fs.mkdirSync(distAssetsDir, { recursive: true });
}

// Copy JS files
const jsFiles = fs.readdirSync(jsDir);
jsFiles.forEach(file => {
  if (file.endsWith('.js')) {
    fs.copyFileSync(
      path.join(jsDir, file),
      path.join(distJsDir, file)
    );
    console.log(`Copied ${file} to dist/js/`);
  }
});

// Copy assets (logo, images, etc.)
if (fs.existsSync(assetsDir)) {
  const assetFiles = fs.readdirSync(assetsDir);
  assetFiles.forEach(file => {
    const srcPath = path.join(assetsDir, file);
    const destPath = path.join(distAssetsDir, file);
    const stat = fs.statSync(srcPath);
    
    if (stat.isFile() && !file.endsWith('.md')) {
      fs.copyFileSync(srcPath, destPath);
      console.log(`Copied ${file} to dist/assets/`);
    }
  });
}

console.log('Assets copied successfully!');

