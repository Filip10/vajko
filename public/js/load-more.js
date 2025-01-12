data = {offset: 0, array: []}

    document.getElementById('load-more').onclick = () => {
        data.offset = document.getElementById('load-more').getAttribute('data-offset')
        fetch('http://localhost/?c=Post&a=showMore', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(data)
        }).then(response => response.json()).then(data => {
            document.getElementById('load-more').setAttribute('data-offset', data.offset)
            for (let i = 0; i < 6; i++) {
                if (data.array[i] !== undefined) {
                    post = data.array[i];
                    const postHTML = `
                <div class="col-md-6 mb-3">
                    <div class="row g-0 border rounded overflow-hidden flex-md-row mb-2 shadow-sm h-md-250 position-relative">
                        <div class="col p-4 d-flex flex-column position-static">
                            <h3 class="mb-2">${post.nazov}</h3>
                            <div class="mb-1 text-body-secondary">${post.datumPublikovania}</div>
                            <p class="card-text mb-3">${post.popis}</p>
                            <div class="row mb-2">
                                <div class="col">
                                    ${post.cestas.map(cesta => `
                                        <a href="${cesta.url}" type="button" class="btn btn-outline-${
                    cesta.cesta.startsWith('D') || cesta.cesta.startsWith('R') ? 'success' :
                        cesta.cesta.startsWith('II') ? 'primary' :
                            cesta.cesta.startsWith('I') ? 'warning' : 'dark'
                }">${cesta.cesta}</a>
                                    `).join('')}
                                </div>
                            </div>
                            <a href="${post.zdroj}" class="icon-link gap-1 icon-link-hover" style="margin-bottom: 0.8em">
                                Čítať viac
                                <svg class="bi"><use xlink:href="#chevron-right"></use></svg>
                            </a>
                        </div>
                        <div class="col-auto d-none d-lg-block">
                            <svg class="bd-placeholder-img" width="200" height="100%" xmlns="http://www.w3.org/2000/svg"
                                role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice"
                                focusable="false"><title>Placeholder</title>
                                <rect width="100%" height="100%" fill="#55595c"></rect>
                                <image href="obrazky/logo_${post.zdrojSkrateny}.png" x="0" y="0" width="100%" height="100%"/>
                            </svg>
                        </div>
                    </div>
                    <button data-id="${post.id}" class="likeAJAX btn btn-primary">${post.likeCount} ľudia to označili ako užitočné</button>
                </div>
            `;
                    document.getElementById('post-container').insertAdjacentHTML('beforeend', postHTML);
                } else {
                    document.getElementById('load-more').style.display = 'none';
                }
            }
        }).catch((error) => {
            document.getElementById('load-more').innerText = 'Error: ' + error
        })

}