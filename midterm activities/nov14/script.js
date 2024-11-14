$(document).ready(function(){
    let jsonData = [];
    let originalData = [];

    // load data
    $("#load").click(function(){
        $("#data-display").css("display", "block");

        if ($("#load").text() === "Load") {
            $("#load").text("Reload");
            $("#close").show();

            $.ajax({
                url: "result.json",
                type: "GET",
                dataType: "json",
                success: function(data) {
                    jsonData = data;
                    originalData = [...data]; 
                    updateTable();
                },
                error: function(xhr, status, error) {
                    console.error("Error: " + error);
                    alert("Basta may error.");
                }
            });
        } else {
            alert("Data Reloaded");
            updateTable();
        }
    });
    
    // close display
    $("#close").click(function(){
        $("#data-display").css("display", "none");
        $("#close").hide();
        $("#load").text("Load");
    });

    $("#row").on("input", function(){
        updateTable();
    });


    //reload
    function updateTable() {
        let rowsToDisplay = $("#row").val();
        let tableContent = "";

        let dataToDisplay = $("#search-bar").val() ? jsonData : originalData;

        $.each(dataToDisplay.slice(0, rowsToDisplay), function(index, result){
            tableContent += `
                <tr>
                    <td>${result.name}</td>
                    <td>${result.age}</td>
                    <td>${result.sex}</td>
                    <td>${result.address}</td>
                </tr>
            `;
        });

        $("table tbody").html(tableContent);

        // display counter
        let displayedCount = dataToDisplay.slice(0, rowsToDisplay).length;
        let totalCount = dataToDisplay.length;
        $("#counter").text(`Showing ${displayedCount}/${totalCount} data`);
    }

    //search
    $("#search-bar").on("input", function() {
        let searchQuery = $(this).val().toLowerCase();

        jsonData = originalData.filter(function(result) {
            return result.name.toLowerCase().includes(searchQuery) ||
                   result.age.toString().includes(searchQuery) ||
                   result.sex.toLowerCase().includes(searchQuery) ||
                   result.address.toLowerCase().includes(searchQuery);
        });

        updateTable();
    });
});