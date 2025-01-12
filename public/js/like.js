window.onload = async () => {
    document.addEventListener('click', function(event) {
        if (event.target.matches('.likeAJAX')) {
            const button = event.target;

            const idPostu = button.getAttribute('data-id');
            const data = {id: idPostu, pocetLikov: 0};

            // Send the fetch request for the clicked button only
            fetch('http://localhost/?c=Like&a=toggleViaJson', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify(data)
            })
                .then(response => response.json())
                .then(data => {
                    button.innerHTML = `${data.pocetLikov} ľudia to označili ako užitočné`;
                })
                .catch((error) => {
                    button.innerText = 'Error: ' + error;
                });
        }
    });
}
