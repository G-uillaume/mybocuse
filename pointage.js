const checkin = document.querySelector('#enter');
const checkout = document.querySelector('#out');
let check = false
let checkinBool = false
let checkoutBool = false
checkin.addEventListener('click', () => {
    if (!check) {
        let formData = new FormData() // ON SIMULE UN INPUT
        formData.append("enter", "enter") // ON REMPLIT LE "FAUX" FORMULAIRE AVEC UNE VALEUR QUELCONQUE POUR POUVOIR LE RECUPERER EN PHP
        fetch('pointage.php', { // ON CHARGE pointage.php COMME SI ON ENVOYAIT UN FORMULAIRE AVEC LA METHODE POST
                method: 'POST',
                body: formData
            })
            .then(response => response.text())
            .then(text => {
                // document.querySelector('.pointage2').innerHTML = text
                checkin.textContent = text
            })
        checkin.disabled = true
        checkout.disabled = false
        check = true
        checkinBool = true
    } else {
        checkin.disabled = false
        checkout.disabled = true
    }
})
checkout.addEventListener('click', () => {
    if (check) {
        let formData = new FormData()
        formData.append("getOut", "getOut")
        fetch('pointage.php', {
                method: 'POST',
                body: formData
            })
            .then(response => response.text())
            .then(text => {
                // document.querySelector('.pointage2').innerHTML = text
                checkout.textContent = text
            })
        checkout.disabled = true
        checkin.disabled = true
        check = false
        checkoutBool = true
    } else {
        checkout.disabled = false
        checkin.disabled = true
    }
})


let newDate = new Date()
// if (newDate.getHours() == 0) {
//     checkinBool = false
//     checkoutBool = false
// } 

if (checkinBool && checkoutBool && newDate.getHours() <= 23 && newDate.getHours() > 17) {
    checkin.disabled = true
    checkout.disabled = true
} else {
    checkin.disabled = false
    checkout.disabled = false
}