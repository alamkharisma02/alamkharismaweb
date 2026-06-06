const fs = require('fs');
const path = require('path');

const viewsDir = path.join(__dirname, '../resources/views');

function walk(dir) {
    let results = [];
    const list = fs.readdirSync(dir);
    list.forEach(file => {
        const fullPath = path.join(dir, file);
        const stat = fs.statSync(fullPath);
        if (stat && stat.isDirectory()) {
            results = results.concat(walk(fullPath));
        } else if (file.endsWith('.blade.php')) {
            results.push(fullPath);
        }
    });
    return results;
}

const files = walk(viewsDir);

files.forEach(filePath => {
    let content = fs.readFileSync(filePath, 'utf8');
    let original = content;

    // Replace fallback default site name string
    content = content.replace(/['"]Alam Kharisma Bersaudara['"]/g, "'PT Alam Kharisma Bersaudara'");
    content = content.replace(/['"]Alam Kharisma['"]/g, "'PT Alam Kharisma Bersaudara'");
    
    // Replace text span branding
    content = content.replace(/>Alam Kharisma<\/span>\s*<span class="text-brand-primary font-bold text-xs sm:text-sm md:text-base tracking-\[0\.2em\] uppercase">Bersaudara<\/span>/g, '>Alam Kharisma Bersaudara</span>');
    content = content.replace(/>Alam\s+Kharisma<\/span>/g, '>PT Alam Kharisma Bersaudara</span>');

    if (content !== original) {
        fs.writeFileSync(filePath, content, 'utf8');
        console.log(`Updated: ${path.relative(viewsDir, filePath)}`);
    }
});
