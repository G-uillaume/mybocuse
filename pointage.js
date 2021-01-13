let checkIn = document.getElementById('checkin');
console.log('checkIn:', checkIn)
let checkOut = document.getElementById('checkout');
console.log('checkOut:', checkOut)


let checkInVerif = true;
let checkOutVerif = false;

checkIn.addEventListener('click', check);

checkOut.addEventListener('click', check);

function check(){
    if(checkInVerif && !checkOutVerif){
        console.log('checkOutVerif:', checkOutVerif)
        console.log('checkInVerif:', checkInVerif)
        checkInVerif = false;
        checkOutVerif = true;
        checkIn.disabled = true;
        checkOut.disabled = false;
        }
    else if(!checkInVerif && checkOutVerif){
        console.log('checkOutVerif:', checkOutVerif)
        checkInVerif = true;
        console.log('checkInVerif:', checkInVerif)
        checkOutVerif = false;
        checkIn.disabled = false;
        checkOut.disabled = true;
    }
}
