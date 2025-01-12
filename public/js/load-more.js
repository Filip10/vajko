data = {offset: 0, array: []}

window.onload = async () => {
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
                    document.getElementById('post-container').append(data.array[i])
                }
            }
        }).catch((error) => {
            document.getElementById('load-more').innerText = 'Error: ' + error
        })
    }
}