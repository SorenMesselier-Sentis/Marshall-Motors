window.onload = () => {
    document.querySelectorAll('.like-popup .like-btn').forEach(modal => {
        modal.addEventListener('click', () => {

            let content = modal.parentNode.children[1]
            content.style.height = content.style.height === '260px' ? '0' : '260px'

            content.addEventListener('submit', (e) => {
                e.preventDefault();
                const inputName = content.querySelector('.input-like-name');
                const inputEmail = content.querySelector('.input-like-email');
                const inputOffer = content.querySelector('.input-like-offer');

                // Call API
                fetch(`/api/likes`, {
                    headers: {
                        'Accept': 'application/json',
                        'Content-Type': 'application/json'
                    },
                    method: "POST",
                    body: JSON.stringify({
                        name: inputName.value,
                        email: inputEmail.value,
                        offer: inputOffer.value
                    })
                })

                // Reset form inputs
                inputName.value = ""
                inputEmail.value = ""
            })
        })
    })

}

