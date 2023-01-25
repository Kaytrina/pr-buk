function add_prod(id_prod, items){
    let form=new FormData();
    form.append('id_prod', id_prod);
    form.append('count', items);
    let request_options={method: 'POST', body: form};
    fetch('https://pr-kirichenko.xn--80ahdri7a.site/chart/create', request_options)
        .then(response=>response.text())
        .then(result=>{
            console.log(result)
            let title=document.getElementById('staticBackdropLabel');
            let body=document.getElementById('modalBody');
            if (result=='false'){
                title.innerText='Ошибка';
                body.innerHTML="<p>Ошибка добавления товара, вероятно, товар уже раскупили</p>"
            } else {
                title.innerText='Информационное сообщение';
                body.innerHTML="<p>Товар успешно добавлен в корзину</p>"
            }
            let myModal = new
            bootstrap.Modal(document.getElementById("staticBackdrop"), {});
            myModal.show();
        })
}

function add_chart(id_chart,id_prod,count){
    let form=new FormData();
    form.append('id_chart', id_chart);
    form.append('id_prod', id_prod);
    form.append('count', count);
    let request_options={method: 'POST', body: form};
    fetch('https://pr-kirichenko.xn--80ahdri7a.site/chart/create', request_options)
        .then(response=>response.text())
        .then(result=>{
            console.log(result)
            let title=document.getElementById('staticBackdropLabel');
            let body=document.getElementById('modalBody');
            if (result=='false'){
                title.innerText='Ошибка';
                body.innerHTML="<p>Что-то пошло не так</p>"
            } else {
                title.innerText='Информационное сообщение';
                body.innerHTML="<p>Заказ успешно оформлен</p>"
            }
            let myModal = new
            bootstrap.Modal(document.getElementById("staticBackdrop"), {});
            myModal.show();
        })
}