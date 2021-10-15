document.addEventListener("DOMContentLoaded", function() {
    let buttonUnlock = document.querySelector('#unlock');
    let buttonDelete = document.querySelector('#deleteAccount');

    // on écoute le bouton 'modifier les infos du compte' et quand celui ci est cliqué , on désactivé l'attribut 'disabled' des inputs
    buttonUnlock.addEventListener('click', function(e) {
        e.preventDefault
        let inputs = document.querySelectorAll('.disable-input')
        Array.from(inputs).forEach(function(input) {
            input.disabled = false;
        })
    })

    buttonDelete.addEventListener('click', function(e){
        e.preventDefault;
        if(confirm('Etes vous sur de vouloir supprimer définitivement votre compte ?')){
            window.location.href = "php_utils/deleteAccount.php"
        }
    })

})