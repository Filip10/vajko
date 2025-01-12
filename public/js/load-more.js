data = {offset: 6}

window.onload = async () => {
    document.getElementById('load-more').onclick = () => {
        fetch('http://localhost/?c=Post&a=showMore', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(data)
        }).then(response => response.json()).then(data => {
            document.getElementById('load-more').innerHTML = `Offset: ${data.offset}`
        }).catch((error) => {
            document.getElementById('load-more').innerText = 'Error: ' + error
        })
    }
}