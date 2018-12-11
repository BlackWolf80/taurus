
jQuery(document).ready(function(){
    jQuery(".menu_top .navbar-toggle").on("click", function(){
        if(jQuery(this).hasClass("active"))
        {
            jQuery(this).removeClass("active");
        }
        else
        {
            jQuery(this).addClass("active");
        }

    })
})


//новости
$(document).ready(function(){
    $('.spoiler_links').click(function(){
        $(this).parent().children('div.spoiler_body').toggle('normal');
        return false;
    });
});

//cлайдер
$(document).ready(function(){
    $('.sliderpr').click(function(e){					/*------ 			Обрабатываем событие "Клик по элементу" 				------*/
        e.preventDefault();								/*------ 			Запрещаем запуск стандартного обработчика 				------*/
        var source = $(this).find('img').attr('src');	/*------ 			Берем изображение из аттрибута alt 					------*/
        var name = $(this).find('img').attr('title');
        var price = $(this).find('img').attr('price');
        var discount = $(this).find('img').attr('discount');
        var id = $(this).find('img').attr('id');

        // alert(id);
        $("#bigimage").attr('href',source);				/*------ 			Записываем изображение в большую картинку 				------*/
        $("#bigimageimg").attr('src',source);           /*------ 			Записываем изображение в ссылку на большую картинку 	------*/
        $(".add-to-cart").attr('data-id',id);
        $("#result").val(name);
        $("#price").val(price);
        $("#discount").val(discount);
        $("#cart2").val(id)
        return false;									/*------ 			Возвращаем false 										------*/
    });
});


$('.add-to-cart').on('click', function (e) {
    e.preventDefault();
    var id = $('#cart2').val();
        qty = $('#qty2').val();
    $.ajax({
        url: '/cart/add',
        data: {id: id, qty: qty},
        type: 'GET',
        success: function(res){
            if(!res) alert('Ошибка!');
            showCart(res);
            // alert(id, qty);
        },
        error: function(){
            alert('Error!');
        }
    });
});



// $('.catalog').dcAccordion({
//     speed: 300
// });


function showCart(cart){
    $('#cart .modal-body').html(cart);
    $('#cart').modal();
}

function getCart(){
    $.ajax({
        url: '/cart/show',
        type: 'GET',
        success: function(res){
            if(!res) alert('Ошибка!');
            showCart(res);
        },
        error: function(){
            alert('Error!');
        }
    });
    return false;
}


$('#cart .modal-body').on('click', '.del-item', function(){
    var id = $(this).data('id');
    $.ajax({
        url: '/cart/del-item',
        data: {id: id},
        type: 'GET',
        success: function(res){
            if(!res) alert('Ошибка!');
            showCart(res);
        },
        error: function(){
            alert('Error!');
        }
    });
});




function clearCart(){
    $.ajax({
        url: '/cart/clear',
        type: 'GET',
        success: function(res){
            if(!res) alert('Ошибка!');
            showCart(res);
        },
        error: function(){
            alert('Error!');
        }
    });
}


$('.add_cart_prod').on('click', function (e) {
    e.preventDefault();
    var id = $(this).data('id'),
        qty = $('#qty').val();
    $.ajax({
        url: '/cart/add',
        data: {id: id, qty: qty},
        type: 'GET',
        success: function(res){
            if(!res) alert('Ошибка!');
            showCart(res);
        },
        error: function(){
            alert('Error!');
        }
    });
});


function showWish(wish){
    $('#wish .modal-body').html(wish);
    $('#wish').modal();
}

$('.add_mylist_prod').on('click', function (e) {
    e.preventDefault();
    var id = $(this).data('id');

    $.ajax({
        url: '/wish/add',
        data: {id: id},
        type: 'GET',
        success: function(res){
            if(!res) alert('Ошибка!');
            showWish(res);
        },
        error: function(){
            alert('Error!');
        }
    });
});

$('.add_filter').on('click', function (e) {
    e.preventDefault();
    $.ajax({
        url: '/page/filters',
        type: 'GET',
        success: function(res){
            // if(!res) alert('Ошибка!');
            location.replace("/filter?type=1");
        },
        error: function(){
            alert('Error!');
        }
    });

});


function getWish(){
    $.ajax({
        url: '/wish/show',
        type: 'GET',
        success: function(res){
            if(!res) alert('Ошибка!');
            showWish(res);
        },
        error: function(){
            alert('Error!');
        }
    });
    return false;
}


function clearWish(){
    $.ajax({
        url: '/wish/clear',
        type: 'GET',
        success: function(res){
            if(!res) alert('Ошибка!');
            showWish(res);
        },
        error: function(){
            alert('Error!');
        }
    });
}


$('#wish .modal-body').on('click', '.del-item', function(){
    var id = $(this).data('id');
    $.ajax({
        url: '/wish/del-item',
        data: {id: id},
        type: 'GET',
        success: function(res){
            if(!res) alert('Ошибка!');
            showWish(res);
        },
        error: function(){
            alert('Error!');
        }
    });
});


$('#wish .modal-body').on('click', '.add-cart', function(){
    var id = $(this).data('id');
    var name = $(this).data('name');
    $.ajax({
        url: '/cart/addnm',
        data: {id: id, qty: 1},
        type: 'GET',
        success: function(res){
            if(!res) alert(name + ' - добавлен в корзину.');
        },
        error: function(){
            alert('Error!');
        }
    });
});

$('.add_call').on('click', function () {
    var name = document.getElementById('callform-name').value;
    var phone = document.getElementById('callform-phons').value;
    $.ajax({
        url: '/page/mail',
        data: {name: name, phone: phone},
        type: 'GET',
        success: function(res){
        },
        error: function(){
        }
    });
});


function showCall(cart){
    $('#callback .modal-body').html(cart);
    $('#callback').modal();
}

function getCall(){
    $.ajax({
        url: 'page/callback',
        type: 'GET',
        success: function(res){
            if(!res) alert('Ошибка!');
            showCall(res);
        },
        error: function(){
            alert('Error!');
        }
    });
    return false;
}


$('.send-btn').on('click', function (e) {
    e.preventDefault();

    var em = document.getElementById('email-send').value;
    document.getElementById("email-send").value='';
    $.ajax({
        url: '/page/addmail',
        data: {em: em},
        type: 'GET',
        success: function(res){
            alert('Ваш адрес сохранен в списках для рассылки новостей!');

        },
        error: function(){
            alert('Ошибка ввода данных!');
        }
    });

});



$('.ordrec').on('click', function (e) {
    e.preventDefault();
    var itog = $(this).data('itog');
    var points = document.getElementById('orders-points').value;  //введеная
    var points_int = document.getElementById('points_int').value; //остаток

//     if(points_int < points){
//         alert('Вы ввели количество бонуснных баллов больше остатка на вашем счету!');
//             document.getElementById("orders-points").value =0;
//             document.getElementById("itog_output").value = itog;
//     }
// else
    document.getElementById("itog_output").value = itog - points;
});

$('.ordrec_g').on('click', function (e) {
    e.preventDefault();
    var itog = $(this).data('itog');

    itog = itog - ((itog * 10)/100);


    alert(itog);
});


//пересчет суммы в корзине по промокоду
function showExchange(){
    var input_id = document.getElementById('orders-card_id').value; //номер карты
    var itog_input=itog_in;
    var flag = 0;

    console.log(itog_in);
    if(input_id==''){//пустое поле сумма без скидок
        off();
    }
    else{
        data.forEach(function(entry) {
            if(entry == input_id){ flag=1;}  //карта верна - скидка
            else {if(flag!=1){flag=0;}}      //карта неверна
        });

        if(flag==1){
            var itog_output=itog_input-(itog_input*10/100);
            on();
        }
        else{
            off();
            alert('Номер карты введен неверно');
        }

    }
    function on(){
        document.getElementById("itog_output2").value=itog_output;
        document.getElementById('itog_output2').style.color = '#00800a';
        document.getElementById('itog_output_old').style.visibility = 'unset';
    }

    function off(){
        document.getElementById("itog_output2").value=itog_input;
        document.getElementById('itog_output2').style.color = '#000';
        document.getElementById('itog_output_old').style.visibility = 'hidden';
    }
}

