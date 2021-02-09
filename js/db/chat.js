function sendMessage(instId) {
    var name = document.getElementById('name');
    var surname = document.getElementById('surname');
    var email = document.getElementById('email');
    var contact = document.getElementById('contact');
    var message = document.getElementById('message');
    var uid = uuidv4();
    var userUid = "";

    firebase.auth().onAuthStateChanged(function(user) {
        if (user) {
            userUid = user.uid.toString().trim();
        } else {
            sendMessageError("Mensagem nao enviada, faça login", 1);
        }
    });

    var data = {
        uid: uid,
        userUid: userUid,
        name: email,
        surname: surname,
        contact: email,
        message: message
    }

    firebase.database().ref().child('institution').child(instId).child('message').child(uid).set(data, function(error) {
        if (error) {
            sendMessageError("Mensagem nao enviada", 2);
        } else {
            sendMessageSuccess();
        }
    });

}


//show dialog: message sent successfully//
function sendMessageSuccess() {
    Swal.fire({
        position: 'top-end',
        icon: 'success',
        title: 'Mensagem enviada com sucesso',
        showConfirmButton: false,
        timer: 1500
    })

    window.location.reload(true)

}

//@code the variable code is used to check the error code//
function sendMessageError(error, codeError) {
    var loginError = 1;
    Swal.fire({
        icon: 'error',
        title: 'Oops...',
        text: error,
    })

    if (codeError == loginError) {
        location.href = "intro.php"
    }
}
}
}