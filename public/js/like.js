

window.onload = async () => {
    const buttons = document.querySelectorAll(".likeAJAX");

    buttons.forEach(button => {
        button.addEventListener("click", () => {
            const idPostu = button.getAttribute('data-id');
            data = {id: idPostu, pocetLikov: 0}

            fetch('http://localhost/?c=Like&a=toggleViaJson', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify(data)
            }).then(response => response.json()).then(data => {
                button.innerHTML = `${data.pocetLikov}`
            }).catch((error) => {
                button.innerText = 'Error: ' + error
            })
        });
    });
}