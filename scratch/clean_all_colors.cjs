const fs = require('fs');
const path = require('path');

const basePath = 'd:\\project_laravel\\web-kontraktor\\resources\\views';

function walkDir(dir, callback) {
    fs.readdirSync(dir).forEach(f => {
        let dirPath = path.join(dir, f);
        let isDirectory = fs.statSync(dirPath).isDirectory();
        if (isDirectory) {
            walkDir(dirPath, callback);
        } else {
            callback(dirPath);
        }
    });
}

const colorReplacements = [
    // Teal replacements
    [/teal-650/g, 'brand-primary'],
    [/teal-600/g, 'brand-primary'],
    [/teal-700/g, 'brand-primary'],
    [/teal-800/g, 'brand-primary'],
    [/teal-900/g, 'brand-primary'],
    [/teal-550/g, 'brand-accent'],
    [/teal-500/g, 'brand-accent'],
    [/teal-400/g, 'brand-accent'],
    [/teal-300/g, 'brand-accent'],
    [/teal-200/g, 'brand-primary/20'],
    [/teal-100/g, 'brand-primary/10'],
    [/teal-50/g, 'brand-primary/5'],
    
    // Emerald replacements (except WhatsApp)
    // We will do a custom replacement inside the file processing to avoid touching WhatsApp green
];

walkDir(basePath, (filePath) => {
    // Skip welcome.blade.php since it is not used
    if (filePath.endsWith('welcome.blade.php')) return;
    
    let content = fs.readFileSync(filePath, 'utf8');
    const original = content;
    
    // Replace teal- classes
    colorReplacements.forEach(([regex, replacement]) => {
        content = content.replace(regex, replacement);
    });
    
    // Replace specific emerald/completed statuses to brand accent or soft primary
    content = content.replace(/bg-emerald-100 text-emerald-800/g, 'bg-brand-primary/10 text-brand-primary');
    content = content.replace(/bg-emerald-50 text-emerald-700/g, 'bg-brand-primary/10 text-brand-primary');
    
    // Replace leftover border-teal-250 or border-teal-200
    content = content.replace(/border-teal-200/g, 'border-brand-primary/20');
    content = content.replace(/border-teal-305/g, 'border-brand-primary/30');
    content = content.replace(/border-teal-100/g, 'border-brand-primary/10');
    content = content.replace(/border-teal-300/g, 'border-brand-accent/30');

    // Replace login box shadow
    content = content.replace(/shadow-teal-500\/20/g, 'shadow-brand-accent/20');

    if (content !== original) {
        fs.writeFileSync(filePath, content, 'utf8');
        console.log(`Cleaned colors in: ${path.basename(filePath)}`);
    }
});
