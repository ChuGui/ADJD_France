/*-----------OUVRE MODAL DE DON-----------*/
function donModal() {
    $('#donModal').modal('toggle');
}

$(document).on('click', '#faireUnDon', donModal);

/*-----------OUVRE MODAL D'ACHAT DE T-SHIRT-----------*/
function tshirtModal() {
    $('#t-shirtModal').modal('toggle');
}

$(document).on('click', '#buyTshirt', tshirtModal);

/*-----------AJOUT D'UN NOUVEAU T-SHIRT-----------*/
var tShirtNb = 1;
var totalAmount = 20;
function addTshirt() {
    tShirtNb ++;
    $('#add-t-shirt').before(
        '<div class="row new_t-shirt">' +
        '<div class="col-10">' +
        '<select name="size_' + tShirtNb + '" id="size_'+ tShirtNb +'" class="form-control mt-2 select-t-shirt">' +
        '<option value="small">S</option>' +
        '<option value="medium">M</option>' +
        '<option value="large">L</option>' +
        '</select>' +
        '</div>' +
        '<div class="col-2">' +
        '<button type="button" class="btn btn-danger btn-sm remove-button">' +
        '<i class="fas fa-times"></i>' +
        '</button>'+
        '</div>'+

        '</div>'
    );


    var total = $('#montant').html();
    var totalInt = parseInt(total);
    var newAmount = totalInt + 20;
    totalAmount = totalAmount + 20;
    $('#montant').html(newAmount);
    console.log(totalAmount);
}

$(document).on('click', '.add-button', addTshirt)

/*-------------ENLEVE T-SHIRT-------------*/
function removeTShirt(){
    $(this).closest('.new_t-shirt').remove();
    var total = $('#montant').html();
    var totalInt = parseInt(total);
    var newAmount = totalInt - 20;
    totalAmount = totalAmount - 20;
    $('#montant').html(newAmount);
}

$(document).on('click', '.remove-button', removeTShirt);


/*--------------------STRIPE---------------------------*/

// Create a Stripe client
var stripe = Stripe('pk_test_qBx5kyAvnMPfSdU1uXeTzxmJ');

// Create an instance of Elements
var elements = stripe.elements();

// Custom styling can be passed to options when creating an Element.
// (Note that this demo uses a wider set of styles than the guide below.)
var style = {
    base: {
        color: '#32325d',
        lineHeight: '18px',
        fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
        fontSmoothing: 'antialiased',
        fontSize: '16px',
        '::placeholder': {
            color: '#aab7c4'
        }
    },
    invalid: {
        color: '#fa755a',
        iconColor: '#fa755a'
    }
};


/*--------------------------------*/
/*--------STRIPE DONATION---------*/
/*--------------------------------*/
// Create an instance of the card Element
var card = elements.create('card', {style: style});

// Add an instance of the card Element into the `card-element` <div>
card.mount('#card-element');

// Handle real-time validation errors from the card Element.
card.addEventListener('change', function(event) {
    var displayError = document.getElementById('card-errors');
    if (event.error) {
        displayError.textContent = event.error.message;
    } else {
        displayError.textContent = '';
    }
});

// Handle form submission
var formDonnation = document.getElementById('payment-form');
formDonnation.addEventListener('submit', function(event) {
    event.preventDefault();
    stripe.createToken(card).then(function(response,status) {
        if (response.error) {
            // Inform the user if there was an error
            var errorElement = document.getElementById('card-errors');
            errorElement.textContent = response.error.message;
        } else {
            var errorElement = document.getElementById('card-errors');
            errorElement.textContent = response.message;

            /*stripeTokenHandler(result.token);*/
            console.log(response);
            var tokenId= response.token.id;
            $('<input type="hidden" name="tokenId" value="' + tokenId + '">').appendTo(formDonnation);
            formDonnation.submit()
        }
    });
});


/*--------------------------------*/
/*--------STRIPE T-SHIRT---------*/
/*--------------------------------*/

// Create an instance of Elements
var elementsTShirt = stripe.elements();

// Create an instance of the card Element
var cardTShirt = elementsTShirt.create('card', {style: style});

// Add an instance of the card Element into the `card-element` <div>
cardTShirt.mount('#card-element-t-shirt');

// Handle real-time validation errors from the card Element.
cardTShirt.addEventListener('change', function(event) {
    var displayError = document.getElementById('card-errors-t-shirt');
    if (event.error) {
        displayError.textContent = event.error.message;
    } else {
        displayError.textContent = '';
    }
});

// Handle form submission
var formTShirt = document.getElementById('t-shirt-form');
formTShirt.addEventListener('submit', function(event) {
    event.preventDefault();
    console.log('hello');
    stripe.createToken(cardTShirt).then(function(response,status) {
        if (response.error) {
            // Inform the user if there was an error
            console.log('error:' + response.error.message);
            var errorElement = document.getElementById('card-errors-t-shirt');
            errorElement.textContent = response.error.message;
        } else {
            var errorElement = document.getElementById('card-errors-t-shirt');
            errorElement.textContent = response.message;

            /*stripeTokenHandler(result.token);*/
            var tokenId= response.token.id;
            var tShirtsString = "";
            $("#t-shirt-form select").each(function(i) {
                var tShirt = $(this).val();
                tShirtsString = tShirtsString + tShirt + ",";
            })
            $('<input type="hidden" name="tShirts" value="' + tShirtsString + '">').appendTo(formTShirt);
            $('<input type="hidden" name="tokenId" value="' + tokenId + '">').appendTo(formTShirt);
            $('<input type="hidden" name="amount" value="' + totalAmount + '">').appendTo(formTShirt);
            formTShirt.submit();
        }
    });
});


