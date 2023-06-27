$(document).ready(function () {
    $("#overview").DataTable();
    $("#table2").DataTable();
    $("#table3").DataTable();
    $("#table4").DataTable();
    $("#table5").DataTable();

    // limiting past date

    let dtToday = new Date();

    let month = dtToday.getMonth() + 1;
    let day = dtToday.getDate();
    let year = dtToday.getFullYear();
    if (month < 10) month = "0" + month.toString();
    if (day < 10) day = "0" + day.toString();

    let maxDate = year + "-" + month + "-" + day;

    // or instead:
    // var maxDate = dtToday.toISOString().substr(0, 10);

    // alert(maxDate);
    $("#from").attr("min", maxDate);
    $("#end").attr("min", maxDate);
});

let duration = document.getElementById("duration");

setTimeout(() => {
    duration.style.cssText = `display: none;`;
}, 3000);

// Adding editor
ClassicEditor.create(document.querySelector("#editor"), {
    toolbar: [
        "heading",
        "bold",
        "italic",
        "bulletedList",
        "numberedList",
        "link",
    ],
}).catch((error) => {
    console.error(error);
});

// slider salary
$(function () {
    $("#slider-range").slider({
        range: true,
        min: 0,
        max: 10000,
        values: [500, 5000],
        slide: function (event, ui) {
            $("#salary").val("$" + ui.values[0] + " - $" + ui.values[1]);
        },
    });
    $("#salary").val(
        "$" +
            $("#slider-range").slider("values", 0) +
            " - $" +
            $("#slider-range").slider("values", 1)
    );
});

// console.log(show);

// let result = document.documentElement.clientWidth;

// console.log(result);

// show.innerHTML = `The width is ${result}`;
