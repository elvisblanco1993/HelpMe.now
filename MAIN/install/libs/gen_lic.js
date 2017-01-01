// Generate License from Date info
function genlic(){
    var date = new Date();
    var components = [
    date.getFullYear(),
    date.getMonth(),
    date.getDate(),
    date.getHours(),
    date.getMinutes(),
    date.getSeconds(),
    ];

    var license = components.join("");

    document.querySelector("#license").value = license;
}
