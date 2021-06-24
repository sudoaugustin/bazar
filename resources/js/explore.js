const $ = require("jquery");
const axios = require("axios");
$(document).ready(() => {
    $(".item").click((e) => {
        console.log("SHIT");
        axios
            .get("product/" + e.delegateTarget.id)
            .then((res) => {
                $(".popover")
                    .css("display", "flex")
                    .hide()
                    .fadeIn()
                    .html(res.data);
            })
            .catch((err) => console.log(err.response));
    });
});
