const fs = require('fs');
const path = require('path');

const basePath = 'd:\\project_laravel\\web-kontraktor\\resources\\views';

const fileReplacements = {
    'gallery.blade.php': [
        [/bg-teal-500\/5/g, 'bg-brand-accent/5'],
        [/bg-teal-500\/10/g, 'bg-brand-accent/10'],
        [/text-teal-700/g, 'text-brand-primary'],
        [/border-teal-500\/20/g, 'border-brand-accent/20'],
        [/bg-teal-500/g, 'bg-brand-primary'],
        [/text-teal-600/g, 'text-brand-primary'],
        [/hover:text-teal-500/g, 'hover:text-brand-accent'],
        [/text-teal-500/g, 'text-brand-accent'],
        [/bg-emerald-105/g, 'bg-brand-primary'],
        [/bg-teal-105/g, 'bg-brand-primary'],
        [/bg-emerald-100 text-emerald-800/g, 'bg-emerald-500/10 text-emerald-600'],
        [/bg-teal-100 text-teal-800/g, 'bg-brand-primary/10 text-brand-primary'],
        [/text-teal-600 hover:text-teal-500/g, 'text-brand-primary hover:text-brand-accent'],
        [/border-teal-500/g, 'border-brand-primary'],
        [/bg-teal-500 hover:bg-teal-400/g, 'bg-brand-accent hover:bg-brand-accent-hover'],
        [/shadow-teal-500\/10/g, 'shadow-brand-accent/10']
    ],
    'video_gallery.blade.php': [
        [/bg-teal-500\/5/g, 'bg-brand-accent/5'],
        [/bg-teal-500\/10/g, 'bg-brand-accent/10'],
        [/text-teal-700/g, 'text-brand-primary'],
        [/border-teal-500\/20/g, 'border-brand-accent/20'],
        [/bg-teal-100 text-teal-800/g, 'bg-brand-primary/10 text-brand-primary'],
        [/text-teal-500/g, 'text-brand-accent'],
        [/bg-teal-500\/90/g, 'bg-brand-accent/90'],
        [/text-teal-600/g, 'text-brand-accent'],
        [/hover:text-teal-650/g, 'hover:text-brand-accent'],
        [/hover:text-teal-600/g, 'hover:text-brand-accent']
    ],
    'testimonials.blade.php': [
        [/bg-teal-500\/5/g, 'bg-brand-accent/5'],
        [/bg-teal-500\/10/g, 'bg-brand-accent/10'],
        [/text-teal-700/g, 'text-brand-primary'],
        [/border-teal-500\/20/g, 'border-brand-accent/20'],
        [/text-teal-500/g, 'text-brand-accent'],
        [/text-teal-505/g, 'text-brand-accent'],
        [/text-teal-500\/30/g, 'text-brand-accent/30'],
        [/bg-teal-500\/10/g, 'bg-brand-primary/10'],
        [/bg-teal-500 hover:bg-teal-400/g, 'bg-brand-accent hover:bg-brand-accent-hover'],
        [/shadow-teal-500\/10/g, 'shadow-brand-accent/10']
    ],
    'profile.blade.php': [
        [/bg-teal-500\/5/g, 'bg-brand-accent/5'],
        [/bg-teal-500\/10/g, 'bg-brand-accent/10'],
        [/text-teal-700/g, 'text-brand-primary'],
        [/border-teal-500\/20/g, 'border-brand-accent/20'],
        [/text-teal-650/g, 'text-brand-accent'],
        [/text-teal-600/g, 'text-brand-accent'],
        [/from-teal-500 to-teal-600/g, 'from-brand-primary to-brand-primary-hover'],
        [/text-teal-500/g, 'text-brand-accent'],
        [/bg-teal-505/g, 'bg-brand-primary'],
        [/bg-teal-500\/5 border border-teal-500\/20/g, 'bg-brand-primary/5 border border-brand-primary/20'],
        [/bg-teal-500\/10 text-teal-700/g, 'bg-brand-primary/10 text-brand-primary'],
        [/text-teal-900/g, 'text-brand-primary'],
        [/bg-teal-100 text-teal-700/g, 'bg-brand-primary/10 text-brand-primary'],
        [/bg-teal-500 hover:bg-teal-400/g, 'bg-brand-accent hover:bg-brand-accent-hover'],
        [/shadow-teal-500\/10/g, 'shadow-brand-accent/10']
    ],
    'career.blade.php': [
        [/bg-teal-500\/5/g, 'bg-brand-accent/5'],
        [/bg-teal-500\/10/g, 'bg-brand-accent/10'],
        [/text-teal-700/g, 'text-brand-primary'],
        [/border-teal-500\/20/g, 'border-brand-accent/20'],
        [/bg-teal-100 text-teal-700/g, 'bg-brand-primary/10 text-brand-primary'],
        [/text-teal-500/g, 'text-brand-accent'],
        [/text-teal-550/g, 'text-brand-accent'],
        [/bg-teal-500/g, 'bg-brand-accent'],
        [/hover:bg-teal-400/g, 'hover:bg-brand-accent-hover'],
        [/shadow-teal-500\/10/g, 'shadow-brand-accent/10']
    ],
    'articles/index.blade.php': [
        [/bg-teal-505/g, 'bg-brand-primary'],
        [/bg-teal-500\/10/g, 'bg-brand-accent/5'],
        [/text-teal-500/g, 'text-brand-accent'],
        [/bg-teal-500\/10 border border-teal-500\/30/g, 'bg-brand-accent/10 border border-brand-accent/30'],
        [/bg-teal-500 text-slate-950/g, 'bg-brand-primary text-white border-brand-primary'],
        [/bg-slate-100 hover:bg-slate-200 text-slate-600/g, 'bg-slate-100 hover:bg-slate-200 text-brand-primary'],
        [/focus:ring-teal-500/g, 'focus:ring-brand-accent'],
        [/hover:text-teal-650/g, 'hover:text-brand-accent'],
        [/hover:text-teal-600/g, 'hover:text-brand-accent'],
        [/text-teal-600 hover:text-teal-500/g, 'text-brand-primary hover:text-brand-accent']
    ],
    'articles/show.blade.php': [
        [/bg-teal-505/g, 'bg-brand-primary'],
        [/text-teal-600/g, 'text-brand-accent'],
        [/bg-teal-500\/10 text-teal-600 border border-teal-500\/20/g, 'bg-brand-accent/10 text-brand-accent border border-brand-accent/20'],
        [/bg-teal-550/g, 'bg-brand-accent'],
        [/bg-teal-500/g, 'bg-brand-accent'],
        [/hover:bg-teal-450/g, 'hover:bg-brand-accent-hover'],
        [/hover:bg-teal-400/g, 'hover:bg-brand-accent-hover'],
        [/focus:ring-teal-500/g, 'focus:ring-brand-accent'],
        [/hover:text-teal-600/g, 'hover:text-brand-accent'],
        [/text-teal-500/g, 'text-brand-accent']
    ],
    'home.blade.php': [
        [/bg-teal-500\/10/g, 'bg-brand-accent/10'],
        [/text-teal-400/g, 'text-brand-accent'],
        [/border-teal-500\/30/g, 'border-brand-accent/30'],
        [/from-teal-500 to-teal-450/g, 'from-brand-accent to-brand-accent-hover'],
        [/from-teal-500 to-teal-400/g, 'from-brand-accent to-brand-accent-hover'],
        [/bg-teal-550/g, 'bg-brand-accent'],
        [/bg-teal-505/g, 'bg-brand-primary'],
        [/bg-teal-500/g, 'bg-brand-accent'],
        [/hover:bg-teal-400/g, 'hover:bg-brand-accent-hover'],
        [/shadow-teal-500\/20/g, 'shadow-brand-accent/20'],
        [/text-teal-500/g, 'text-brand-accent'],
        [/from-teal-500 to-teal-600/g, 'from-brand-primary to-brand-primary-hover'],
        [/text-teal-600/g, 'text-brand-accent'],
        [/hover:border-teal-500\/40/g, 'hover:border-brand-accent/40'],
        [/bg-teal-500\/10/g, 'bg-brand-primary/10'],
        [/text-teal-700/g, 'text-brand-primary'],
        [/hover:bg-teal-500/g, 'hover:bg-brand-primary-hover'],
        [/hover:text-slate-950/g, 'hover:text-white'],
        [/border-teal-500/g, 'border-brand-accent'],
        [/bg-teal-500\/5/g, 'bg-brand-accent/5'],
        [/border-teal-500\/10/g, 'border-brand-accent/10'],
        [/activeStep === (\d+) \? 'border-teal-500/g, 'activeStep === $1 ? \'border-brand-primary'],
        [/activeStep === (\d+) \? 'bg-teal-500/g, 'activeStep === $1 ? \'bg-brand-primary'],
        [/text-teal-500 transition-transform/g, 'text-brand-accent transition-transform'],
        [/text-teal-700/g, 'text-brand-primary'],
        [/border-teal-500\/20/g, 'border-brand-accent/20'],
        [/hover:text-teal-500/g, 'hover:text-brand-accent'],
        [/hover:bg-teal-500/g, 'hover:bg-brand-primary'],
        [/bg-teal-650/g, 'bg-brand-primary'],
        [/bg-teal-600/g, 'bg-brand-primary']
    ]
};

Object.entries(fileReplacements).forEach(([file, replacements]) => {
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
