// Dropdown toggle function (ginagamit ng onclick sa HTML)
function toggleDropdown(id) {
    const dropdowns = document.querySelectorAll('.dropdown-content');
    // Isara ang lahat ng dropdown maliban sa kasalukuyan
    dropdowns.forEach(menu => { 
        if (menu.id !== id) menu.style.display = 'none'; 
    });
    // I-toggle (buksan/isara) ang kasalukuyang dropdown
    const current = document.getElementById(id);
    current.style.display = current.style.display === 'block' ? 'none' : 'block';
}

// Isara ang dropdown kapag nag-click sa labas
window.addEventListener('click', function(event) {
    if (!event.target.matches('.dropbtn')) {
        document.querySelectorAll('.dropdown-content').forEach(menu => { menu.style.display = 'none'; });
    }
});

// --- Search Functionality ---

const input = document.getElementById('globalSearch');
const btn = document.getElementById('searchBtn');
const suggest = document.getElementById('searchSuggest');

// Kunin ang lahat ng links mula sa dropdowns at i-store sa isang array
const links = Array.from(document.querySelectorAll('.dropdown-content a')).map(a => ({
    text: a.textContent.trim(),
    href: a.getAttribute('href'), // Gagamitin ang friendly slug
    group: a.dataset.group || '',
    el: a
}));

// Function para gawing lowercase ang string
function normalize(str){ return str.toLowerCase(); }

// Search logic
function search(q){
    const n = normalize(q);
    if(!n) return []; 
    
    return links
        .map(item => {
            const t = normalize(item.text + ' ' + item.group);
            let score = -1;
            // Mas mataas na score kung nagsisimula sa query
            if (t.startsWith(n)) score = 2;
            // Normal na score kung may lamang query
            else if (t.includes(n)) score = 1;
            return { item, score };
        })
        .filter(x => x.score > 0)
        // I-sort (unahin ang may mataas na score, tapos ang mas maikling text)
        .sort((a,b)=> b.score - a.score || a.item.text.length - b.item.text.length)
        .slice(0, 12)
        .map(x => x.item);
}

// Render (ipakita) ang search suggestions
function renderSuggestions(results){
    if(!results.length){ suggest.style.display = 'none'; suggest.innerHTML = ''; return; }
    
    suggest.innerHTML = results.map(r => `
        <div class="item" data-href="${r.href}">
            <div>${r.text}</div>
            <div class="tag">${r.group}</div>
        </div>`).join('');
        
    suggest.style.display = 'block';
}

// Event listener para sa pag-type sa search bar
input.addEventListener('input', (e)=>{
    const q = e.target.value.trim();
    renderSuggestions(search(q));
});

// Event listener para sa Enter key (para mag-search agad) at Escape key
input.addEventListener('keydown', (e)=>{
    if(e.key === 'Enter'){
        const q = input.value.trim();
        const results = search(q);
        // Kung may result, buksan ang unang link
        if(results.length){ window.open(results[0].href, '_blank'); suggest.style.display = 'none'; }
    }
    if(e.key === 'Escape'){ suggest.style.display = 'none'; }
});

// Event listener para sa click ng Search button
btn.addEventListener('click', ()=>{
    const q = input.value.trim();
    const results = search(q);
    // Kung may result, buksan ang unang link
    if(results.length){ window.open(results[0].href, '_blank'); suggest.style.display = 'none'; }
});

// Event listener para sa pag-click ng suggestion item
suggest.addEventListener('click', (e)=>{
    const target = e.target.closest('.item');
    if(target){
        const href = target.getAttribute('data-href');
        window.open(href, '_blank');
        suggest.style.display = 'none';
        // Ilagay ang text sa search box pagkatapos mag-click
        input.value = target.querySelector('div').textContent.trim();
    }
});

// Isara ang suggestions kapag nag-click sa labas ng search box
document.addEventListener('click', (e)=>{
    if(!e.target.closest('.searchbox')){ suggest.style.display = 'none'; }
});