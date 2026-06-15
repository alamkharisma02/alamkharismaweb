const fs = require('fs');
const path = require('path');

const files = [
    'resources/views/video_gallery.blade.php',
    'resources/views/testimonials.blade.php',
    'resources/views/services.blade.php',
    'resources/views/projects/show.blade.php',
    'resources/views/projects/index.blade.php',
    'resources/views/profile.blade.php',
    'resources/views/partials/hero.blade.php',
    'resources/views/partials/divisions.blade.php',
    'resources/views/partials/cinematic-break.blade.php',
    'resources/views/partials/cinematic-break-2.blade.php',
    'resources/views/partials/advantages.blade.php',
    'resources/views/partials/contact.blade.php',
    'resources/views/layouts/app.blade.php',
    'resources/views/layouts/admin.blade.php',
    'resources/views/admin/settings.blade.php',
    'resources/css/app.css'
];

const basePath = 'd:\\project_laravel\\web-kontraktor';

files.forEach(file => {
    const fullPath = path.join(basePath, file);
    if (fs.existsSync(fullPath)) {
        let content = fs.readFileSync(fullPath, 'utf8');
        
        // Count replacements
        const countPrimaryOld = (content.match(/#0A1E13/gi) || []).length;
        const countPrimaryHoverOld = (content.match(/#050F09/gi) || []).length;
        
        // Replace colors
        content = content.replace(/#0A1E13/gi, '#101F3C');
        content = content.replace(/#050F09/gi, '#0A1428');
        
        // Replace tailwind class variants for dark green theme
        content = content.replace(/emerald-950/g, 'slate-950');
        content = content.replace(/emerald-900/g, 'slate-900');
        
        fs.writeFileSync(fullPath, content, 'utf8');
        console.log(`Recolored ${file}: Replaced ${countPrimaryOld} matches of primary and ${countPrimaryHoverOld} matches of hover.`);
    } else {
        console.log(`File not found: ${file}`);
    }
});
