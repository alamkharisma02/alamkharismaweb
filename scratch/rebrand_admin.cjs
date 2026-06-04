const fs = require('fs');
const path = require('path');

const basePath = 'd:\\project_laravel\\web-kontraktor\\resources\\views';

const adminFiles = [
    'layouts/admin.blade.php',
    'admin/testimonials/index.blade.php',
    'admin/testimonials/edit.blade.php',
    'admin/testimonials/create.blade.php',
    'admin/settings.blade.php',
    'admin/projects/index.blade.php',
    'admin/projects/edit.blade.php',
    'admin/projects/create.blade.php',
    'admin/login.blade.php',
    'admin/leads/index.blade.php',
    'admin/leads/show.blade.php',
    'admin/dashboard.blade.php',
    'admin/articles/index.blade.php',
    'admin/articles/edit.blade.php',
    'admin/articles/create.blade.php'
];

const replacements = [
    [/bg-teal-650/g, 'bg-brand-primary'],
    [/bg-teal-600/g, 'bg-brand-primary'],
    [/bg-teal-700/g, 'bg-brand-primary'],
    [/text-teal-650/g, 'text-brand-accent'],
    [/text-teal-600/g, 'text-brand-accent'],
    [/text-teal-700/g, 'text-brand-primary'],
    [/text-teal-500\/80/g, 'text-brand-accent'],
    [/text-teal-500/g, 'text-brand-accent'],
    [/bg-teal-500\/10/g, 'bg-brand-primary/10'],
    [/bg-teal-500/g, 'bg-brand-accent'],
    [/hover:bg-teal-400/g, 'hover:bg-brand-accent-hover'],
    [/hover:bg-teal-700/g, 'hover:bg-brand-primary-hover'],
    [/focus:ring-teal-500/g, 'focus:ring-brand-accent'],
    [/focus:border-teal-500/g, 'focus:border-brand-accent'],
    [/border-teal-500\/20/g, 'border-brand-accent/20'],
    [/hover:border-teal-500/g, 'hover:border-brand-accent'],
    [/hover:text-teal-600/g, 'hover:text-brand-accent'],
    [/shadow-teal-500\/10/g, 'shadow-brand-accent/10'],
    [/bg-teal-100/g, 'bg-brand-primary/10'],
    [/text-teal-800/g, 'text-brand-primary'],
    [/text-teal-550/g, 'text-brand-accent'],
    [/text-emerald-500/g, 'text-brand-accent'],
    [/text-emerald-600/g, 'text-brand-primary'],
    [/bg-emerald-500/g, 'bg-brand-accent'],
    [/hover:bg-emerald-450/g, 'hover:bg-brand-accent-hover'],
    [/hover:bg-emerald-400/g, 'hover:bg-brand-accent-hover']
];

adminFiles.forEach(file => {
    const filePath = path.join(basePath, file.replace(/\//g, '\\'));
    if (!fs.existsSync(filePath)) {
        console.log(`Skipping file (not found): ${filePath}`);
        return;
    }
    let content = fs.readFileSync(filePath, 'utf8');
    const original = content;

    replacements.forEach(([regex, replacement]) => {
        content = content.replace(regex, replacement);
    });

    if (content !== original) {
        fs.writeFileSync(filePath, content, 'utf8');
        console.log(`Successfully rebranded: ${file}`);
    } else {
        console.log(`No changes made to: ${file}`);
    }
});
