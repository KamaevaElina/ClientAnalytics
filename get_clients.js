function getClients(event) {
    event.preventDefault();
    let data = event.target.elements;
    let inProgress = false;
    if (!inProgress) {
        $.ajax({
            url: 'get_clients.php',
            method: 'POST',
            data: {
                "city": data["CitySelect"].value,
                "niche": data["NicheSelect"].value,
                "tag":  data["TagSelect"].value
            },
            beforeSend: function () {
                inProgress = true;
            }
        }).done(function (data) {
            data = JSON.parse(data);
            if (data.length > 0) {
                $("#Clients").empty();
                $.each(data, function (index, data) {
                    let cardID = 'ClientCard' + index;
                    let html = "<div class='card bg-light mb-3' id='" + cardID + "'>" + "<div class='card-header'>";
                    html+= data["firstname"] + " " + data["lastname"];
                    html += "<br>" + "тел: " + data["phone"] + "</div>";
                    html += "<div class='card-body'>";
                    html += "<p>Email: " + data["email"] + "</p>";
                    html += "<p>Ниша: " + data["niche"] + "</p>";
                    html += "<p>Доп. номер: " + data["additional_phone"] + "</p>";
                    html += "<p>Роль: " + data["role"] + "</p>";
                    html += "<p>Оброт компании: " + data["average_turnover"] + "</p>";
                    html += "<p>Штат: " + data["staff"] + "</p>";
                    html += "<p>Страна: " + data["country"] + "</p>";
                    html += "<p>Город: " + data["city"] + "</p>";
                    html += "<form id='TagForm' class='container-fluid'>";
                    html += "<input type='text' class='form-control' placeholder='Текст тега'>";
                    html += "<button id='AddTag" + data["id"] + "'" + ">Добавить тег</button>";
                    html += "</form>";
                    html += "</div>" + "</div>";
                    $("#Clients").append(html);
                });
                inProgress = false;
            }
        });
    }
}