function signup() {

    let admin_verification ="qwerty123";

    var request_1 = prompt("Enter admin passcode provided by super admin : 'lloyd'");

    if (request_1 != admin_verification) {
        alert("Kindly Contact Admin lloyd for admin signing up");    
    }
    else if (request_1==admin_verification){
    alert("Super admin 'lloyd' is currently working on admin registration forms kindly wait");
    }
    
}
