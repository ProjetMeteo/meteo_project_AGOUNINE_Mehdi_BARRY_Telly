document.addEventListener("DOMContentLoaded", function() {
    let buttonUnlock = document.querySelector('#unlock');

    buttonUnlock.addEventListener('click', function(e) {
        e.preventDefault
        let inputs = document.querySelectorAll('.disable-input')
        Array.from(inputs).forEach(function(input) {
            input.disabled = false;
        })
    })
})