$(document).ready(function () {
    let table = null;

    $("#load").click(function () {
        $("#data-display").css("display", "block");

        $.ajax({
            url: "result.json",
            type: "GET",
            dataType: "json",
            success: function (data) {
                if (table) {
                    table.destroy();
                    $("#data tbody").empty();
                }

                let tableContent = "";
                $.each(data, function (index, result) {
                    tableContent += `
                        <tr>
                            <td>${result.name}</td>
                            <td>${result.age}</td>
                            <td>${result.sex}</td>
                            <td>${result.address}</td>
                        </tr>
                    `;
                });
                $("#data tbody").append(tableContent);

                table = $("#data").DataTable();
            },
            error: function (xhr, status, error) {
                alert(`Error loading data: ${xhr.status} ${error}`);
            }
        });
    });

    $("#close").click(function () {
        $("#data-display").css("display", "none");
    });
});