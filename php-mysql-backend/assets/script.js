document.querySelector("form").addEventListener("submit", function(e){
    let ime = document.querySelector("input[name='ime']").value.trim();
    let prezime = document.querySelector("input[name='prezime']").value.trim();
    let email = document.querySelector("input[name='email']").value.trim();
    
    if(ime.length < 2 || prezime.length < 2){
        alert("Ime i prezime moraju imati najmanje 2 karaktera!");
        e.preventDefault();
    }
    
    let emailPattern = /^[^ ]+@[^ ]+\.[a-z]{2,3}$/;
    if(!email.match(emailPattern)){
        alert("Email nije validan!");
        e.preventDefault();
    }
});
