$(document).ready(() => {
    $(document).on("change", '.id_producto', (e) => {
        let id_producto = $(e.target).val();
        let fila_seleccionada = $(e.target).attr("rel");
        $.post(base_url + "compra/mostrar", { 'id_producto': id_producto }, (data) => {

            $(".stock[rel=" + fila_seleccionada + "]").val(data.stock);
            $(".cantidad[rel=" + fila_seleccionada + "]").attr("max", data.stock);
            $(".precio[rel=" + fila_seleccionada + "]").val(data.precio);
            $(".imagen[rel=" + fila_seleccionada + "]").attr("src", base_url + "imagenes/productos/" + data.imagen);


        }, "json");
    });
});