let url_parts = window.location.pathname.split('/')
const links = document.querySelector('#ariane-links')

// Start with home link
addLink('Home', '/', url_parts[1] == '')

// Add next links
for (let i = 1; i < url_parts.length; i++) {
    addLink(url_parts[i], url_parts.slice(0, i + 1).join('/'), i == url_parts.length - 1)
}

// Function to display link
function addLink(label, href, isLast) {
    links.innerHTML += `<a href="${href}">${label}</a>`
    if (!isLast) links.innerHTML += `<p> > </p>`
}