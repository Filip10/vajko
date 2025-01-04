

window.onload = async () => {
    //idPostu = document.getElementById('cisloPostu').value;

    data = {id: 3, pocetLikov: 0}

    document.getElementById('like').onclick = () => {
        fetch('http://localhost/?c=Like&a=toggleViaJson', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(data)
        }).then(response => response.json()).then(data => {
            document.getElementById('like').innerHTML = `${data.pocetLikov}`
        }).catch((error) => {
            document.getElementById('like').innerText = 'Error: ' + error
        })
    }
}