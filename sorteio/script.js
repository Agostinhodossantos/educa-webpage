var $inner = $('.inner'),
    $spin = $('#spin'),
    // $reset = $('#reset'),
    $data = $('.data'),
    $mask = $('.mask'),
    maskDefault = 'Sorteio de Prêmio',
    timer = 9000;

var red = [32, 19, 21, 25, 34, 27, 36, 30, 23, 5, 16, 1, 14, 9, 18, 7, 12, 3];

//$reset.hide();

$mask.text(maskDefault);

start();

$spin.on('click', function() {


});

function start() {

    // get a random number between 0 and 36 and apply it to the nth-child selector
    var randomNumber = Math.floor(Math.random() * 36),
        color = null;
    $inner.attr('data-spinto', randomNumber).find('li:nth-child(' + randomNumber + ') input').prop('checked', 'checked');
    // prevent repeated clicks on the spin button by hiding it
    $(this).hide();
    // disable the reset button until the ball has stopped spinning
    // $reset.addClass('disabled').prop('disabled','disabled').show();

    $('.placeholder').remove();


    setTimeout(function() {
        $mask.text(maskDefault);
    }, timer / 2);

    setTimeout(function() {
        $mask.text(maskDefault);
    }, timer + 500);



    // remove the disabled attribute when the ball has stopped
    setTimeout(function() {
        // $reset.removeClass('disabled').prop('disabled','');
        //if($.inArray(randomNumber, red) !== -1){ color = 'red'} else { color = 'black'};
        if ($.inArray(randomNumber, red) !== -1) { color = '' } else { color = '' };
        //  if(randomNumber == 0){color = 'green'};
        if (randomNumber == 0) { color = '' };

        $('.result-number').text(randomNumber);
        $('.result-color').text(color);
        $('.result').css({ 'background-color': '' + color + '' });
        $data.addClass('reveal');
        $inner.addClass('rest');

        $thisResult = '<li class="previous-result color-' + color + '"><span class="previous-number">' + randomNumber + '</span><span class="previous-color">' + color + '</span></li>';

        sessionStorage.setItem('played', 'true');


        var query = window.location.search.substring(1);
        var vars = query.split("=");
        var numSort = vars[1];



        if (numSort == randomNumber) {
            win();
        } else {
            lose();
        }
        //location.href="../raffle.php?rand="+randomNumber;
        $('.previous-list').prepend($thisResult);


    }, timer);


}


//
// $reset.on('click',function(){
//   // remove the spinto data attr so the ball 'resets'
//   $inner.attr('data-spinto','').removeClass('rest');
//   $(this).hide();
//   $spin.show();
//   $data.removeClass('reveal');
// });

// so you can swipe it too
var myElement = document.getElementById('plate');
var mc = new Hammer(myElement);
mc.on("swipe", function(ev) {
    if (!$reset.hasClass('disabled')) {
        if ($spin.is(':visible')) {
            $spin.click();
        } else {
            $reset.click();
        }
    }
});


// function end game
function win() {
    var gift = ["Bolsa de estudo", "Bicicleta", "Camisetas", "Laptop"];
    var giftWin = Math.floor(Math.random() * gift.length);

    Swal.fire({
        // title: 'Boooom (:',
        // text: 'Parabéns você ganhou ' + gift[giftWin],
        imageUrl: 'img/you_win.jpg',
        confirmButtonText: 'OK',
        allowOutsideClick: false,
        imageWidth: 400,
        imageHeight: 400,
        imageAlt: 'Custom image',
    }).then((result) => {
        if (result.isConfirmed) {
            Swal.fire(
                'Parabéns',
                'Volte mais tarde.',
                'success'
            )


            firebase.auth().onAuthStateChanged(function(user) {

                if (user) {

                    firebase.database().ref('users').on('value', function(snapshot) {
                        snapshot.forEach(function(item) {

                            if (item.val().userId !== null && item.val().userId !== undefined) {
                                var db_uid = item.val().userId.toString().trim();
                                var user_uid = user.uid.toString().trim();

                                if (db_uid == user_uid) {
                                    var name = item.val().name;
                                    createRandUser(user_uid, name, gift[giftWin], 2, uuidv4());
                                    return;
                                }

                            }

                        });
                    });

                } else {
                    location.href = 'intro.php';
                }

            });



        }
    })


}

function lose() {
    Swal.fire({
        text: 'Volte a tentar mais tarde.',
        imageUrl: 'img/you_lose.jpg',
        confirmButtonText: 'Terminar',
        allowOutsideClick: false,
        imageWidth: 400,
        imageHeight: 400,
        imageAlt: 'Custom image',
    }).then((result) => {
        if (result.isConfirmed) {
            Swal.fire(
                'Obrigado!',
                'Volte mais tarde.',
                'success'
            )

            endGame('lose');
        }
    })
}

function createRandUser(uid, name, gift, numRand, uidRand) {
    var data = {
        uid: uid,
        name: name,
        gift: gift,
        numRand: numRand,
        uidRand: uidRand
    };

    firebase.database().ref().child('randGift').child(uidRand).set(data, function(error) {
        if (error) {
            alert("Data could not be saved." + error);
            location.href = "intro.php";
        } else {
            endGame('win');
        }
    });


}

// when the user finishes the game insert in the localStorage that already play
function endGame(status) {
    var playGame = {
        status: status,
        isShowed: true,
        date: getDate(),
    }

    localStorage.setItem('itemPlay', JSON.stringify(playGame));

    location.href = "../index.php";
}

function getDate() {
    now = new Date
    date = now.getDate() + "/" + (now.getMonth() + 1) + "/" + now.getFullYear();
    return date;
}