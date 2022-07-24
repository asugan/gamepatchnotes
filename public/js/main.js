const btn = document.querySelector("button.mobile-menu-button");
const menu = document.querySelector(".mobile-menu");

btn.addEventListener("click", () => {
    menu.classList.toggle("hidden");
});

$(function () {
    $("body").html(
        $("body")
            .html()
            .replace(/<br>\\*/g, "</p><p>")
    );
});

jQuery(document).ready(function () {
    jQuery("p").each(function () {
        var $this = jQuery(this);
        if ($this.html().replace(/\s|&nbsp;/g, "").length == 0) {
            $this.remove();
        }
    });
});
