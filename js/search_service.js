const search = document.querySelector('#search')
const matchList = document.querySelector('#match-list')

// search in the citie json file all city name that match the search input value
const searchCity = async searchText => {
    const res = await fetch('./city.list.json');
    const cities = await res.json()

    let matches = cities.filter( city => {
        const regex = new RegExp(`^${searchText}`, 'gi');
        return city.name.match(regex);
    })

    // erase result and html search child when input is empty
    if (searchText.length === 0){
        matches = []
        matchList.innerHTML = '';
    }

    // order by Alphabetical
    orderedMatches = matches.sort((a, b) => {
        if(a.name > b.name){return 1}
        if(a.name < b.name){return -1}
        return 0
    });

    outputHtml(orderedMatches)
}


// Show result in HTML

const outputHtml = matches => {
    if(matches.length > 0){
        const html = matches.map(match => `
        <div class="search-item">${match.name}<span class="coord"> # Longitude : ${match.coord.lon} - Latitude : ${match.coord.lat}</span></div>
        `)
        .slice(0,6)
        .join('');

        matchList.innerHTML = html;
    }
}


const selectCity = e => {
    console.log(e.target.parentElement)
        if(e.target.classList.contains('search-item')){
            let taggedText = e.target.innerText
            search.value = taggedText.substring(0 ,taggedText.indexOf('#')-1); // retire tout derrière le # d'un search-item pour ne garder que le nom de la ville
            matchList.innerHTML = '';
        }
        if(e.target.classList.contains('coord')){
            let taggedText = e.target.parentElement.innerText
            search.value = taggedText.substring(0 ,taggedText.indexOf('#')-1); // le -1 sert a supprimer l'espace avant le #
            matchList.innerHTML = '';
        }
}


search.addEventListener('input', () => searchCity(search.value))
matchList.addEventListener('click', e => selectCity(e))
